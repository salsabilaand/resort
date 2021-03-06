<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Transaksi;
use App\Models\KontenBeranda;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function registration(){
        return view("auth.registration");
    }
    public function registrationUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = '2';
        $res = $user->save();
        if ($res) {
            return back()->with('success', 'You have registered Succesfuly');
        }else{
            return back()->with('fail', 'Something wrong');
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId',$user->id);
                $request->session()->put('loginName',$user->name);
                $role = $user->role;
                if($role){
                    if($role=='3'){
                        return view('dashboard.dashboard-admin');
                    }else if($role=='1'){
                        return view('dashboard.dashboard-pemilik');
                    }else{
                        $dtKonten = KontenBeranda::all();
                        return view('dashboard.dashboard-pengunjung', compact('dtKonten'));
                    }
                }else{
                    return back()->with('fail','rolenya apa ges.');
                }
            }else{
                return back()->with('fail','Password not matches.');
            }
        }else{
            return back()->with('fail','The email is not registered.');
        }
    }

    public function profile(){
        $user = DB::select('select * from users where id = ?', [session('loginId')]);
        return view('dashboard.profile-resort', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $ubah = User::findorfail($id);

        $user = [
            'nama_resort'   => $request['nama_resort'],
            'name'          => $request['name'],
            'email'         => $request['email'],
            'alamat'        => $request['alamat'],
            'deskripsi'     => $request['deskripsi'],
            'link_yt'       => $request['link_yt']
        ];

        $photo = $request->file('photo');
        
        if ($photo) {
            $namaFile = $photo->getClientOriginalName(); 
            $user['photo'] = $namaFile;
            $proses = $photo->move('img/', $namaFile);
        }

        $ubah->update($user);
        return redirect('profile-resort');
    }

    public function update_password(Request $request, $id)
    {
        $ubah = User::findorfail($id);

        $user = [
            'password' => Hash::make($request['password']),
        ];

        $ubah->update($user);
        return redirect('profile-resort')->with('success', 'Password Berhasil Diubah!');
    }
}