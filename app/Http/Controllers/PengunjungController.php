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
}
