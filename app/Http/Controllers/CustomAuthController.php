<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Transaksi;
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
                        return view('dashboard.dashboard-pengunjung');
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
        // $namaFile = time().rand(100,999).".".$nm->getClientOriginalExtension();
        $ubah = User::findorfail($id);
        // $id_user = DB::select('select * from users where id = ?', [session('loginId')]);
        // $ubah = User::findorfail($id_user);
        $awal = $ubah->photo;

        $user = [
            'nama_resort'   => $request['nama_resort'],
            'name'    => $request['name'],
            'email'         => $request['email'],
            'photo'         => $awal,
            'alamat'    => $request['alamat'],
            'deskripsi'     => $request['deskripsi'],
        ];
        
        if ($request->hasFile('photo')) {
            // $ubah->delete_photo();
            $photo = $request->file('photo');
            $request->photo->move('img/', $awal);
        }

        $ubah->update($user);
        return redirect('profile-resort');
    }
}