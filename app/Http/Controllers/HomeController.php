<?php

namespace App\Http\Controllers;

use App\Models\InstrumentBorrowal;
use App\Models\TraditionalMusicalInstrument;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $alatmusik = collect(TraditionalMusicalInstrument::all())->map(function ($q) {
            $cekKetersediaan = InstrumentBorrowal::whereInstrumentId($q->id)
                ->whereStatus("borrowed")
                ->sum('qty');

            // jumlah yang boleh dipinjam
            $cek = TraditionalMusicalInstrument::whereId($q->id)->first()->lendable;
            $totalTersedia = $cek - $cekKetersediaan;
            $q->totalTersedia = $totalTersedia;
            return $q;
        });



        return view('home', [
            "alatmusik" => $alatmusik,
        ]);
    }
}
