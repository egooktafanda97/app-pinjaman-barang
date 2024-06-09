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
#[Group(prefix: 'report')]
class LaporanController extends Controller
{
    // list
    #[Get(uri: '/peminjaman')]
    public function index(Request $request)
    {
        $flukData =  InstrumentBorrowal::with('borrower', 'instrument')
            ->where(function ($query) use ($request) {
                if ($request->get('bulan')) {
                    $query->where('created_at', 'like', '%' . $request->get('bulan') . '%');
                }
                if ($request->get('status')) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->get();
        return view('laporan.semua-peminjaman', [
            "listPengajuan" => $flukData,
        ]);
    }
    // print-laporan.blade
    #[Get(uri: '/print-laporan')]
    public function printLaporan(Request $request)
    {
        $flukData =  InstrumentBorrowal::with('borrower', 'instrument')
            ->where(function ($query) use ($request) {
                if ($request->get('bulan')) {
                    $query->where('created_at', 'like', '%' . $request->get('bulan') . '%');
                }
                if ($request->get('status')) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->get();
        return view('laporan.print-laporan', [
            "listPengajuan" => $flukData,
        ]);
    }
}
