<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use App\satuan;

class CrudBrgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuans = satuan::all();
        $barangs = barang::with('satuan')->get();       
        return view('viewdata', compact('barangs', 'satuans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = new barang();
        $barang->kode = $request->kode_brg;
        $barang->nama = $request->nama_brg;
        $barang->satuan_id = $request->satuan;
        $barang->harga = $request->harga_brg;
        $barang->save();
        return redirect('/barang');
    }

    public function storesatuan(Request $request){
        $satuan = new Satuan();
        $satuan->satuan = $request->satuan;
        $satuan->save();
        return redirect('/barang');
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
        $satuans = satuan::all();
        $barang = barang::with('satuan')->find($id);
        return view('editdata', compact('barang', 'satuans'));
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
        $barang = barang::find($id);
        $barang->nama = $request->nama_brg;
        $barang->satuan_id = $request->satuan;
        $barang->harga = $request->harga_brg;
        $barang->save();
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = barang::find($id);
        $barang->delete();
        return redirect('/barang');
    }
}
