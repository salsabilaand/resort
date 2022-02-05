<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Hash;
use Session;

class PengunjungController extends Controller
{
    public function index(){
        return view('dashboard-pengunjung');
    }

    public function editAkun(){
        $dtAkun = DB::select('select * from users where id = ?', [session('loginId')]);
        return view('pengunjung.edit-akun-pengunjung', compact('dtAkun'));
    }

    
    public function updateAkun(Request $request, $id)
    {
        $ubah = User::findorfail($id);

        $dtAkun = [
            'name'              => $request['name'],
            'email'             => $request['email'],
            'password'          => Hash::make($request['password']),
        ];

        $ubah->update($dtAkun);
        return redirect('edit-akun-pengunjung')->with('success', 'Changes saved successfully');;
    }

    public function riwayatReservasi(){
        $dtReservasi = DB::select('select * from transaksi where id = ?', [session('loginId')]);
        return view('pengunjung.riwayat-reservasi-pengunjung', compact('dtReservasi'));
    }
}
