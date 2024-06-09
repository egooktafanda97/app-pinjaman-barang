<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use App\Models\TraditionalMusicalInstrument;
use Illuminate\Http\Request;
use TaliumAttributes\Collection\Controller\Controllers;
use TaliumAttributes\Collection\Rutes\Get;
use TaliumAttributes\Collection\Rutes\Group;

#[Controllers()]
#[Group(prefix: 'dashboard')]
class DashboaardController extends Controller
{
    #[Get('/')]
    public function index()
    {
        return view('dashboard', [
            'title' => 'Dashboard',
            "jumlah_peminjam" => Borrower::count(),
            "jumlah_alat" => TraditionalMusicalInstrument::count(),
            "Jumlah_semua_alat_bagus" => TraditionalMusicalInstrument::count("lendable"),
            "Jumlah_semua_alat_rusak" => TraditionalMusicalInstrument::count("broken"),
        ]);
    }
}
