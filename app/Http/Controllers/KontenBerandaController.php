<?php

namespace App\Http\Controllers;
use App\Models\KontenBeranda;

use Illuminate\Http\Request;

class KontenBerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtKonten = KontenBeranda::all();
        return view('admin.data-konten-beranda', compact('dtKonten'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.input-konten-beranda');
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

        $dtUpload = new KontenBeranda;
        // $dtUpload->id_user      = session('loginId');
        $dtUpload->judul_konten         = $request->judul_konten;
        $dtUpload->deskripsi_konten     = $request->deskripsi_konten;
        $dtUpload->image                = $namaFile;

        $nm->move('img/', $namaFile);
        $dtUpload->save();
        
        return redirect('data-konten-beranda');
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
        $dt = KontenBeranda::findorfail($id);
        return view('admin.edit-konten-beranda',compact('dt'));
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
        $ubah = KontenBeranda::findorfail($id);
        $awal = $ubah->image;

        $dt = [
            'judul_konten'          => $request['judul_konten'],
            'deskripsi_konten'      => $request['deskripsi_konten'],
            'image'                 => $awal,
        ];
        
        if ($request->hasFile('image')) {
            // $ubah->delete_image();
            $image = $request->file('image');
            $request->image->move('img/', $awal);
        }

        $ubah->update($dt);
        return redirect('data-konten-beranda');
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
        $hapus = KontenBeranda::findorfail($id);

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
