<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtTransaksi = Transaksi::all();
        return view('transaksi.data-transaksi', compact('dtTransaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.input-transaksi');
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
        $dtUpload = new Transaksi;
        $dtUpload->nama         = $request->nama;
        $dtUpload->telepon      = $request->telepon;
        $dtUpload->email        = $request->email;
        $dtUpload->tgl_masuk    = $request->tgl_masuk;
        $dtUpload->tgl_keluar   = $request->tgl_keluar;
        $dtUpload->jml_tamu     = $request->jml_tamu;
        $dtUpload->harga        = $request->harga;
        $dtUpload->catatan      = $request->catatan;
        $dtUpload->save();

        return redirect('data-transaksi');
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
        $dt = Transaksi::findorfail($id);
        return view('transaksi.edit-transaksi',compact('dt'));
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
        $ubah = Transaksi::findorfail($id);

        $dt = [
            'nama'          => $request['nama'],
            'telepon'       => $request['telepon'],
            'email'         => $request['email'],
            'tgl_masuk'     => $request['tgl_masuk'],
            'tgl_keluar'    => $request['tgl_keluar'],
            'jml_tamu'      => $request['jml_tamu'],
            'harga'         => $request['harga'],
            'catatan'       => $request['catatan'],
        ];

        $ubah->update($dt);
        return redirect('data-transaksi');
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
        $hapus = Transaksi::findorfail($id);
        //hapus data drai db
        $hapus->delete();
        return back();
    }
}