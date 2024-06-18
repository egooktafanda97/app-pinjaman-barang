<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Borrower;
use App\Models\InstrumentBorrowal;
use App\Models\InstrumentCategory;
use App\Models\TraditionalMusicalInstrument;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use TaliumAttributes\Collection\Controller\Controllers;
use TaliumAttributes\Collection\Rutes\Get;
use TaliumAttributes\Collection\Rutes\Group;
use TaliumAttributes\Collection\Rutes\Post;

#[Controllers()]
#[Group(prefix: 'used')]
class PeminjamanController extends Controller
{
    #[Get(["", 'list'])]
    public function list()
    {
        return view('alat-musik.list', [
            "alatMusik" => TraditionalMusicalInstrument::whereTypesId(1)->get(),
        ]);
    }

    #[Get(["/pakayan", 'list/pakayan'])]
    public function listPakayan()
    {
        return view('alat-musik.list', [
            "alatMusik" => TraditionalMusicalInstrument::whereTypesId(2)->get(),
        ]);
    }

    #[Get('list-pengajuan')]
    public function listPengajuan(Request $request)
    {
        return view('peminjam.list-pengajuan', [
            "listPengajuan" => InstrumentBorrowal::whereBorrowerId(Borrower::whereUserId(auth()->user()->id)->first()->id)
                ->with('borrower', 'instrument')
                ->get(),
        ]);
    }

    #[Get('{id}/form-pengajuan')]
    public function formPengajuan($id)
    {
        // jumlah yang sedang dipinjam
        $cekKetersediaan = InstrumentBorrowal::whereInstrumentId($id)
            ->whereStatus("borrowed")
            ->sum('qty');

        // jumlah yang boleh dipinjam
        $cek = TraditionalMusicalInstrument::whereId($id)->first()->lendable;
        $totalTersedia = $cek - $cekKetersediaan;
        return view('alat-musik.form-pengajuan-peminjaman', [
            "alatMusik" => TraditionalMusicalInstrument::whereId($id)->with("category")->first(),
            "brorrower" => Borrower::whereUserId(auth()->user()->id)->first(),
            "id"        => $id,
            "totalTersedia" => $totalTersedia,
        ]);
    }



    #[Get('{id}/edit-form-pengajuan')]
    public function editFormPengajuan($id)
    {
        $formPengajuan = InstrumentBorrowal::whereId($id)->with('instrument', 'borrower')->first();
        return view('alat-musik.edit-form-pengajuan-peminjaman', [
            "alatMusik" => TraditionalMusicalInstrument::whereId($formPengajuan->instrument->id)->with("category")->first(),
            "brorrower" => Borrower::whereUserId(auth()->user()->id)->first(),
            "formPengajuan" => $formPengajuan,
            "id"        => $id,
        ]);
    }

    #[Post('{id}/form-pengajuan')]
    public function formPengajuanPost(Request $request, $id)
    {
        try {
            $requests = collect($request->all())->merge([
                "borrower_id" => Borrower::whereUserId(auth()->user()->id)->first()->id,
                "instrument_id" => $id,
                "status" => "pending",
            ])->toArray();
            unset($requests['_token']);
            $cek = TraditionalMusicalInstrument::whereId($id)
                ->first()->lendable;
            $cekKetersediaan = InstrumentBorrowal::whereInstrumentId($id)
                ->whereStatus("borrowed")
                ->sum('qty');
            if ($cek < $requests['qty'] || $cekKetersediaan + $requests['qty'] > $cek) {
                Alert::error('Gagal', 'Tidak bisa meminjam lebih dari yang tersedia');
                return redirect("used/{$id}/form-pengajuan");
            }
            $instrumentBorrowal = InstrumentBorrowal::create($requests);
            if ($instrumentBorrowal) {
                Alert::success('Berhasil', 'Pengajuan Berhasil');
                return redirect("used/{$id}/form-pengajuan");
            }
            throw new \Exception("Pengajuan Gagal");
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Pengajuan Gagal');
            return redirect("used/{$id}/form-pengajuan");
        }
    }

    #[Post('{id}/form-pengajuan/{idEdit}')]
    public function updateFormPengajuanPost(Request $request, $id, $idEdit)
    {
        try {

            $requests = collect($request->all())->merge([
                "borrower_id" => Borrower::whereUserId(auth()->user()->id)->first()->id,
                "instrument_id" => $id,
                "status" => "pending",
            ])->toArray();
            unset($requests['_token']);
            $instrumentBorrowal = InstrumentBorrowal::whereId($idEdit)->update($requests);

            if ($instrumentBorrowal) {
                Alert::success('Berhasil', 'Pengajuan Berhasil');
                return redirect("used/{$idEdit}/edit-form-pengajuan");
            }
            throw new \Exception("Pengajuan Gagal");
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Pengajuan Gagal');
            return redirect("used/{$idEdit}/edit-form-pengajuan");
        }
    }
    #[Get('{id}/cencel-form-pengajuan')]
    public function cencelFormPengajuanPost($id)
    {
        try {
            $instrumentBorrowal = InstrumentBorrowal::whereId($id)->delete();
            if ($instrumentBorrowal) {
                Alert::success('Berhasil', 'Pengajuan Berhasil');
                return redirect("used/list-pengajuan");
            }
            throw new \Exception("Pengajuan Gagal");
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Pengajuan Gagal');
            return redirect("used/{$id}/edit-form-pengajuan");
        }
    }



    //pengambilan barang
    #[Get('list-permohonan')]
    public function listPermohonan()
    {
        return view('peminjam.list-pengajuan', [
            "listPengajuan" => InstrumentBorrowal::where('status', 'pending')
                ->with('borrower', 'instrument')
                ->orderBy('created_at', 'desc')
                ->get(),
            "title" => "List Permohonan"
        ]);
    }

    //pengambilan barang
    #[Get('list-permohonan-detail/{id}')]
    public function listPermohonanDetail($id)
    {
        $peminjaman  = InstrumentBorrowal::whereId($id)
            ->with('instrument', 'borrower', 'pengembalianBarang')->first();

        // jumlah yang sedang dipinjam
        $cekKetersediaan = InstrumentBorrowal::whereInstrumentId($peminjaman->instrument->id)
            ->whereStatus("borrowed")
            ->sum('qty');
        $cek = TraditionalMusicalInstrument::whereId($peminjaman->instrument->id)->first()->lendable;

        $totalTersedia = $cek - $cekKetersediaan;
        return view('peminjam.detail-peminjaman', [
            "alatMusik" => TraditionalMusicalInstrument::whereId($peminjaman->instrument->id)->with("category")->first(),
            "brorrower" => Borrower::whereUserId(auth()->user()->id)->first(),
            "id"        => $id,
            "totalTersedia" => $totalTersedia,
            "formPengajuan" => $peminjaman,
        ]);
    }

    // tanggpaan update status update-status
    #[Post('update-status/{id}')]
    public function updateStatus(Request $request, $id)
    {
        try {
            $requests = collect($request->all())->merge([
                "status" => $request->status,
            ])->toArray();
            $direction = $requests['direction'] ?? null;
            unset($requests['direction']);
            unset($requests['_token']);
            $data = [
                "status" => $request->status
            ];
            if (!empty($requests['catatan'])) {
                $data['notes'] = $requests['catatan'];
            }
            $instrumentBorrowal = InstrumentBorrowal::whereId($id)->update($data);
            if ($instrumentBorrowal) {
                Alert::success('Berhasil');
                return redirect($direction ?? "used/list-permohonan");
            }
            throw new \Exception("Gagal");
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Gagal');
            return redirect($direction ?? "/used/list-permohonan-detail/{$id}");
        }
    }

    //pengambilan barang
    #[Get('list-pengambilan')]
    public function pengambilanPermohonan()
    {
        return view('peminjam.list-pengajuan', [
            "listPengajuan" => InstrumentBorrowal::where('status', 'approved')
                ->with('borrower', 'instrument')
                ->orderBy('created_at', 'desc')
                ->get(),
            "title" => "List Pengambilan Kedinas"
        ]);
    }

    //pengambilan barang
    #[Get('list-peminjaman')]
    public function listPeminjaman()
    {
        return view('peminjam.list-pengajuan', [
            "listPengajuan" => InstrumentBorrowal::where('status', 'borrowed')
                ->with('borrower', 'instrument')
                ->orderBy('created_at', 'desc')
                ->get(),
            "title" => "List Alatmusik Yang Sedang Dipinjam"
        ]);
    }

    //list pengambilan barang
    #[Get('form-pengambilan-barang/{id}')]
    public function formPengambilanAlatMusik($id)
    {
        $peminjaman  = InstrumentBorrowal::whereId($id)
            ->where('status', 'borrowed')
            ->with('instrument', 'borrower')->first();
        return view('alat-musik.form-pengambilan-barang', [
            "formPengajuan" => $peminjaman,
            "id" => $id
        ]);
    }

    #[Get('form-pengembalian-barang/{id}')]
    public function formPengembalianAlatMusik($id)
    {
        $peminjaman  = InstrumentBorrowal::whereId($id)
            ->where('status', 'borrowed')
            ->with('instrument', 'borrower')->first();
        return view('alat-musik.form-pengembalian-barang', [
            "formPengajuan" => $peminjaman,
            "id" => $id
        ]);
    }

    #[Post('{id}/form-pengembalian')]
    public function formPengembalianAlatMusikPost(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $peminjaman  = InstrumentBorrowal::whereId($id)
                ->where('status', 'borrowed')
                ->with('instrument', 'borrower')->first();
            $alatMusik = TraditionalMusicalInstrument::whereId($peminjaman->instrument->id)->first();
            $jumlahYangDipinjam = $peminjaman->qty;
            $jumlahyangDikembalikan = $request->jumlah;
            if ($jumlahyangDikembalikan < $jumlahYangDipinjam) {
                $yangHilang =  $jumlahYangDipinjam - $jumlahyangDikembalikan;
                $ketersediaanBarang = $alatMusik->availability -  $yangHilang;
                $ketersediaanBarangBagus = $alatMusik->lendable - $yangHilang;
                TraditionalMusicalInstrument::whereId($peminjaman->instrument->id)->update([
                    "availability" => $ketersediaanBarang,
                    "lendable" => $ketersediaanBarangBagus,
                ]);
            }
            $barangbagus = $alatMusik->lendable - $request->jumlah_rusak;
            $barangrusak = $alatMusik->broken + $request->jumlah_rusak;
            TraditionalMusicalInstrument::whereId($peminjaman->instrument->id)->update([
                "lendable" => $barangbagus,
                "broken" => $barangrusak,
            ]);
            $requests = collect($request->all())->merge([
                "instrument_borrowal_id" => $id,
                "instrument_id" => $peminjaman->instrument->id,
                "borrower_id" => $peminjaman->borrower->id,
                "tanggal_pengembalian" => date('Y-m-d'),
            ])->toArray();

            $pengembalian = \App\Models\PengembalianBarang::create([
                'instrument_borrowal_id' => $id,
                'instrument_id' => $peminjaman->instrument->id,
                'borrower_id' => $peminjaman->borrower->id,
                'tanggal_pengembalian' => date('Y-m-d'),
                'keterangan' => $requests['keterangan'] ?? null,
                'jumlah' => $requests['jumlah'],
                'jumlah_bagus' => $requests['jumlah_bagus'],
                'jumlah_rusak' => $requests['jumlah_rusak'],
            ]);
            if (!$pengembalian)
                throw new \Exception("Pengembalian Gagal");
            InstrumentBorrowal::whereId($id)->update([
                "status" => "returned",
            ]);
            DB::commit();
            Alert::success('Berhasil', 'Pengembalian Berhasil');
            return redirect("used/list-peminjaman");
        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollBack();
        }
    }
}
