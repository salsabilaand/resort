<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;

class DataPemilikResortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtResort = DB::select('select * from users where role = ?', ['1']);
        return view('admin.data-pemilik-resort', compact('dtResort'));
    }

    public function registrationUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8'
        ]);
        $user = new User();
        $user->name         = $request->name;
        $user->nama_resort  = $request->nama_resort;
        $user->email        = $request->email;
        $user->password     = Hash::make($request->password);
        $user->role = '1';
        $res = $user->save();
        if ($res) {
            return redirect('data-pemilik-resort')->with('success', 'You have registered Succesfuly');
        }else{
            return back()->with('fail', 'Something wrong');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.input-pemilik-resort');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dt = User::findorfail($id);
        return view('admin.edit-pemilik-resort',compact('dt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ubah = User::findorfail($id);

        $dt = [
            'name'                      => $request['name'],
            'nama_resort'               => $request['nama_resort'],
            'email'                     => $request['email'],
            'password'                  => Hash::make($request['password']),
        ];

        $ubah->update($dt);
        return redirect('data-pemilik-resort');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $hapus = User::findorfail($id);
        //hapus data drai db
        $hapus->delete();
        return back();
    }

    public function cetak()
    {
        $cetakResort = DB::select('select * from users where id = ?', ['1']);
        return view('admin.cetak-pemilik-resort', compact('cetakResort'));
    }
}
