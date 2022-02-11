<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Transaksi;
use App\Models\KontenBeranda;
use Carbon\Carbon;
use Hash;
use Session;

class PengunjungController extends Controller
{
    
    public function index(){
        $dtKonten = KontenBeranda::all();
        return view('dashboard.dashboard-pengunjung', compact('dtKonten'));
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
        $dtReservasi = DB::select('select * from transaksi where id_user = ?', [session('loginId')]);
        return view('pengunjung.riwayat-reservasi-pengunjung', compact('dtReservasi'));
    }

    public function tampilPenginapan(){
        $dtPenginapan = DB::select('select * from users where role = ?', ['1']);
        return view('pengunjung.tampil-penginapan', compact('dtPenginapan'));
    }

    public function tampilKamarPenginapan($id){
        // $dtKamar = DB::table('kamar')
        //         ->join('users', 'users.id', '=', 'kamar.id_user')
        //         ->where('kamar.id_user', '=', $id)
        //         ->get();
        $dtKamar = DB::select('select * from kamar where id_user = ?', [$id]);
        return view('pengunjung.tampil-kamar-resort',compact('dtKamar'));
    }

    public function reservasi($id){
        $dtKamar = DB::select('select * from kamar where id = ?', [$id]);
        return view('pengunjung.reservasi',compact('dtKamar'));
    }

    public function inputReservasi(Request $request, $id){
        // $price = DB::select('select * from kamar where id = ?', [$id]);
        $price = Kamar::find($id);
        $durasi = Carbon::parse($request->tgl_masuk)->diffInDays($request->tgl_keluar);

        $reservasi = new Transaksi();
        $reservasi->harga =  $price->harga * $durasi;
        $reservasi->nama = $request->nama;
        $reservasi->telepon = $request->telepon;
        $reservasi->email = $request->email;
        $reservasi->tgl_masuk = $request->tgl_masuk;
        $reservasi->tgl_keluar = $request->tgl_keluar;
        $reservasi->catatan = $request->catatan;
        $reservasi->id_user = session('loginId');
        $reservasi->status = 'Request';
        $reservasi->id_kamar = $id;
        $reservasi->id_resort = $price->id_user;
        $res = $reservasi->save();
        if ($res) {
            return back()->with('success', 'Succesfuly! Please go to reservation history menu to see details');
        }else{
            return back()->with('fail', 'Something wrong');
        }
    }
}
