<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\InstrumentBorrowal;
use App\Models\InstrumentCategory;
use App\Models\TraditionalMusicalInstrument;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use TaliumAttributes\Collection\Controller\Controllers;
use TaliumAttributes\Collection\Rutes\Get;
use TaliumAttributes\Collection\Rutes\Group;
use TaliumAttributes\Collection\Rutes\Post;

#[Controllers()]
#[Group(prefix: 'alat-musik')]
class AlatMusikController extends Controller
{
    #[Get('/')]
    public function index()
    {
        return view('alat-musik.show', [
            "alatMusik" => TraditionalMusicalInstrument::all(),
        ]);
    }


    #[Get('/create')]
    public function create()
    {
        return view('alat-musik.create', [
            "kategory" => InstrumentCategory::get(),
        ]);
    }

    #[Post('/store')]
    public function store(Request $request)
    {
        try {
            $img = Helper::Images($request, 'image', 'uploaded');
            $vidio = Helper::Images($request, 'video', 'uploaded');
            $audio = Helper::Images($request, 'audio', 'uploaded');
            $data = collect($request->all())->merge([
                ...($img->status ? ["image" => $img->name] : []),
                ...($vidio->status ? ["video" => $vidio->name] : []),
                ...($audio->status ? ["audio" => $audio->name] : [])
            ]);
            $save = TraditionalMusicalInstrument::create($data->toArray());
            Alert::success("Berhasil", "Data Berhasil Disimpan");
            return redirect()->route('alat-musik');
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Data Gagal Disimpan');
            return redirect()->route('alat-musik.create');
        }
    }

    #[Get('/{id}')]
    public function detail($id)
    {
        // jumlah yang sedang dipinjam


        $alatMusik = TraditionalMusicalInstrument::whereId($id)->with("category")->first();
        $cekKetersediaan = InstrumentBorrowal::whereInstrumentId($alatMusik->id)
            ->whereStatus("borrowed")
            ->sum('qty');
        $cek = TraditionalMusicalInstrument::whereId($alatMusik->id)->first()->lendable;
        $totalTersedia = $cek - $cekKetersediaan;
        return view('alat-musik.detail', [
            "alatMusik" => $alatMusik,
            "dipinjamkan" => $cekKetersediaan,
            "jumlah_tersedia" => $totalTersedia
        ]);
    }

    #[Get('/{id}/edit')]
    public function edit($id)
    {
        return view('alat-musik.edit', [
            'id' => $id,
            "alatMusik" => TraditionalMusicalInstrument::whereId($id)->first(),
            "kategory" => InstrumentCategory::all()
        ]);
    }

    #[Post('/{id}/update')]
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            $img = Helper::Images($request, 'image', 'uploaded');
            $vidio = Helper::Images($request, 'video', 'uploaded');
            $audio = Helper::Images($request, 'audio', 'uploaded');
            $data = collect($data)->merge([
                ...($img->status ? ["image" => $img->name] : []),
                ...($vidio->status ? ["video" => $vidio->name] : []),
                ...($audio->status ? ["audio" => $audio->name] : [])
            ])->toArray();
            $save = TraditionalMusicalInstrument::whereId($id)->update($data);
            Alert::success("Berhasil", "Data Berhasil Diubah");
            return redirect("/alat-musik/$id");
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Data Gagal Diubah');
            return redirect("/alat-musik/$id/edit");
        }
    }

    #[Get('/{id}/delete')]
    public function destroy($id)
    {
        try {
            TraditionalMusicalInstrument::whereId($id)->delete();
            Alert::success("Berhasil", "Data Berhasil Dihapus");
            return redirect("/alat-musik");
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Data Gagal Dihapus');
            return redirect("/alat-musik");
        }
    }
}
