<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Borrower;
use App\Models\InstrumentBorrowal;
use App\Models\InstrumentCategory;
use App\Models\TraditionalMusicalInstrument;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use TaliumAttributes\Collection\Controller\Controllers;
use TaliumAttributes\Collection\Rutes\Get;
use TaliumAttributes\Collection\Rutes\Group;
use TaliumAttributes\Collection\Rutes\Post;

#[Controllers()]
#[Group(prefix: 'users-used')]
class PeminjamController extends Controller
{
    #[Get('/register')]
    public function register()
    {
        return view('auth.form-register-peminjam');
    }
    #[Post('/register')]
    public function registerStore(Request $request)
    {
        try {
            $data = $request->all();
            $data['role'] = 'peminjam';
            $user = User::create($data);
            Alert::success('Berhasil', 'Pendaftaran Berhasil');
            return redirect()->route('login');
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Pendaftaran Gagal');
            return redirect("users-used/register");
        }
    }

    // profile
    #[Get('/profile')]
    #[Group(middleware: ['auth'])]
    public function profile()
    {
        return view('peminjam.profile', [
            'borrower' => Borrower::where('user_id', auth()->user()->id)->first(),
        ]);
    }

    #[Post('/profile/store')]
    public function profileStore(Request $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = auth()->user()->id;
            $foto = Helper::Images($request, 'foto', 'uploaded');
            if ($foto->status) {
                $data['foto'] = $foto->name;
            }
            if (Borrower::whereUserId(auth()->user()->id)->first()) {
                $brorrower = Borrower::whereUserId(auth()->user()->id)->first();
                $brorrower->update($data);
            } else {
                $brorrower = Borrower::create($data);
            }
            Alert::success('Berhasil', 'Data Berhasil Diubah');
            return redirect()->route('users-used.profile');
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Data Gagal Diubah');
            return redirect()->route('users-used.profile');
        }
    }

    // pengajuan
    #[Post('/pengajuan')]
    public function pengajuanStore(Request $request)
    {
        // try {
        $data = $request->all();
        $data['borrower_id'] = Borrower::whereUserId(auth()->user()->id)->first()->id;
        $data['status'] = 'pending';
        $instrument = TraditionalMusicalInstrument::find($data['instrument_id']);
        //  cek berapa jumlah yang bisa dipinjam di ambil dari data instrument_borrowals yang statusnya borrowed dan instrument_id nya sama dengan instrument_id yang diinput
        $qty = InstrumentBorrowal::whereInstrumentId($data['instrument_id'])->whereStatus('borrowed')->sum('qty');
        // cek apakah jumlah yang dipinjam lebih dari jumlah yang bisa dipinjam
        if ($qty + $data['qty'] > $instrument->lendable) {
            Alert::error('Gagal', 'Jumlah yang dipinjam melebihi jumlah yang bisa dipinjam');
            return redirect("users-used/pengajuan");
        }
        InstrumentBorrowal::create($data);
        Alert::success('Berhasil', 'Pengajuan Berhasil');
        //     return redirect("users-used/pengajuan");
        // } catch (\Throwable $th) {
        //     Alert::error('Gagal', 'Pengajuan Gagal');
        //     return redirect("users-used/pengajuan");
        // }
    }

    #[Get('/list')]
    public function listUser()
    {
        $data = Borrower::with('user')->get();
        return view('users.list-user', [
            'users' => $data,
        ]);
    }
}
