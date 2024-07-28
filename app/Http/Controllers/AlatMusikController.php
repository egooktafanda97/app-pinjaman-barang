<?php

namespace App\Http\Controllers;

ini_set('memory_limit', '10240M');

use App\Helpers\Helper;
use App\Models\InstrumentBorrowal;
use App\Models\InstrumentCategory;
use App\Models\TraditionalMusicalInstrument;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use TaliumAttributes\Collection\Controller\Controllers;
use TaliumAttributes\Collection\Rutes\Delete;
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
            "label" => "Alat Musik",
            "type" => 1,
            "segement" => null,
            "alatMusik" => TraditionalMusicalInstrument::whereTypesId(1)->get(),
        ]);
    }

    #[Get('/pakaian')]
    public function pakaian()
    {
        return view('alat-musik.show-pakayan', [
            "label" => "Pakaian Adat",
            "segement" => "pakaian",
            "alatMusik" => TraditionalMusicalInstrument::whereTypesId(2)->get(),
        ]);
    }


    #[Get('/create/{pakaian?}')]
    public function create($pakaian = null)
    {
        return view('alat-musik.create', [
            "type" => $pakaian ? 2 : 1,
            "segement" => $pakaian,
            "label" => $pakaian ? "Pakaian Adat" : "Alat Musik",
            "kategory" => InstrumentCategory::where(function ($q) use ($pakaian) {
                if ($pakaian) {
                    return $q->whereTypesId(2);
                } else {
                    return  $q->whereTypesId(1);
                }
            })->get(),
        ]);
    }

    #[Post('/store')]
    public function store(Request $request)
    {
        try {
            $xdata = $request->all();
            $img = Helper::Images($request, 'image', 'uploaded');
            $vidio = Helper::Images($request, 'video', 'uploaded');
            $audio = Helper::Images($request, 'audio', 'uploaded');


            unset($xdata['video']);
            unset($xdata['image']);
            unset($xdata['audio']);
            $data = collect($xdata)->merge([
                ...($img->status ? ["image" => $img->name] : []),
                ...($vidio->status ? ["video" => $vidio->name] : []),
                ...($audio->status ? ["audio" => $audio->name] : [])
            ]);
            $save = TraditionalMusicalInstrument::create($data->toArray());
            Alert::success("Berhasil", "Data Berhasil Disimpan");
            if ($request->type_id == 1) {
                return redirect()->route('alat-musik');
            } else {
                return redirect("alat-musik/pakaian");
            }
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
            'type' => 1,
            "alatMusik" => TraditionalMusicalInstrument::whereId($id)->first(),
            "kategory" => InstrumentCategory::whereTypesId(1)->get(),
        ]);
    }

    #[Get('/{id}/edit/pakaian')]
    public function editpakaian($id)
    {
        return view('alat-musik.edit', [
            'id' => $id,
            "type" => 2,
            "segement" => "pakaian",
            "label" => "Pakaian Adat",
            "alatMusik" => TraditionalMusicalInstrument::whereId($id)->first(),
            "kategory" => InstrumentCategory::whereTypesId(2)->get(),
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

    #[Get('/kategory/{type}/create/{id?}')]
    public function createCategory($typeId)
    {
        return  view('alat-musik.create-kategory', [
            "types_id" => $typeId,
            "kategory" => InstrumentCategory::where("types_id", $typeId)->get(),
        ]);
    }

    #[Post('/store-kategory')]
    public function storeCategory(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            if ($request->id) {
                $save = InstrumentCategory::whereId($request->id)->update($data);
                Alert::success("Berhasil", "Data Berhasil Diubah");
                return redirect("/alat-musik/kategory/" . $request->types_id . "/create");
            } else {
                $save = InstrumentCategory::create($data);
                Alert::success("Berhasil", "Data Berhasil Disimpan");
                return redirect("/alat-musik/kategory/" . $request->types_id . "/create");
            }
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Data Gagal Disimpan');
            return redirect("/alat-musik/kategory/" . $request->types_id . "/create");
        }
    }

    // destory
    #[Delete('/destroy-kategory/{id}')]
    public function destroyCategory($id)
    {
        try {
            $data  = InstrumentCategory::find($id);
            InstrumentCategory::whereId($id)->delete();
            Alert::success("Berhasil", "Data Berhasil Dihapus");
            return redirect("/alat-musik/kategory/" . $data->types_id . "/create");
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Data Gagal Dihapus');
            return redirect("/alat-musik/kategory/" . $data->types_id . "/create");
        }
    }
}
