<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
// use App\Models\Kamar;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtTransaksi = DB::table('transaksi')
            ->where('id_resort', [session('loginId')])
            ->where('status', 'Request')
            ->orWhere('status', 'Accepted')
            ->get();
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
        $dtUpload->nama             = $request->nama;
        $dtUpload->telepon          = $request->telepon;
        $dtUpload->email            = $request->email;
        $dtUpload->kamar_id         = $request->kamar_id;
        $dtUpload->tgl_masuk        = $request->tgl_masuk;
        $dtUpload->tgl_keluar       = $request->tgl_keluar;
        $dtUpload->jml_tamu         = $request->jml_tamu;
        $dtUpload->harga            = $request->harga;
        $dtUpload->catatan          = $request->catatan;
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

    public function laporan(){
        $dtTransaksi = DB::table('transaksi')
            ->where('id_resort', [session('loginId')])
            ->where('status', 'Rejected')
            ->orWhere('status', 'Completed')
            ->get();

        return view('transaksi.laporan-transaksi', compact('dtTransaksi'));
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
        $ubah = Transaksi::findOrFail($id);

        $dt = [
            'status' => $request['status']
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

    public function cetak()
    {
        $cetakTransaksi = DB::table('transaksi')
            ->where('id_resort', [session('loginId')])
            ->where('status', 'Rejected')
            ->orWhere('status', 'Completed')
            ->get();
        return view('transaksi.cetak-laporan-transaksi', compact('cetakTransaksi'));
    }
}
