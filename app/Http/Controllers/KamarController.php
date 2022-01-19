<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use Illuminate\Support\Facades\DB;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtKamar = DB::select('select * from kamar where id_user = ?', [session('loginId')]);
        // $dtKamar = Kamar::all();
        return view('kamar.data-kamar', compact('dtKamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kamar.input-kamar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $nm = $request->image;
        $namaFile = time().rand(100,999).".".$nm->getClientOriginalExtension(); //memberi nama file dengan nomor acak

        $dtUpload = new Kamar;
        $dtUpload->id_user      = session('loginId');
        $dtUpload->jenis_kamar  = $request->jenis_kamar;
        $dtUpload->image        = $namaFile;
        $dtUpload->tipe_kamar   = $request->tipe_kamar;
        $dtUpload->harga        = $request->harga;
        $dtUpload->deskripsi    = $request->deskripsi;

        $nm->move('img/', $namaFile);
        $dtUpload->save();
        
        return redirect('data-kamar');
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
        $dt = Kamar::findorfail($id);
        return view('kamar.edit-kamar',compact('dt'));
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
        $ubah = Kamar::findorfail($id);
        $awal = $ubah->image;

        $dt = [
            'jenis_kamar'   => $request['jenis_kamar'],
            'image'         => $awal,
            'tipe_kamar'    => $request['tipe_kamar'],
            'harga'         => $request['harga'],
            'deskripsi'     => $request['deskripsi'],
        ];
        
        if ($request->hasFile('image')) {
            $ubah->delete_image();
            $image = $request->file('image');
            $request->image->move('img/', $awal);
        }

        $ubah->update($dt);
        return redirect('data-kamar');
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
        $hapus = Kamar::findorfail($id);

        $file = ('img/').$hapus->image;
        //cek jika ada gambar
        if (file_exists($file)){
            //maka hapus file dari folder img
            @unlink($file);
        }
        //hapus data drai db
        $hapus->delete();
        return back();
    }
}
