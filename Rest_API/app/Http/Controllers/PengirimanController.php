<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\Barang;
use App\Models\Penerima;
use App\Models\Pengirim;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function create(Request $request)
    {
        $pengirimen = new Pengiriman();

        $pengirimen->id_barang = $request->input('id_barang');
        $pengirimen->id_penerima = $request->input('id_penerima');
        $pengirimen->id_pengirim = $request->input('id_pengirim');
        $pengirimen->nama_layanan = $request->input('nama_layanan');
        $pengirimen->harga_pengiriman = $request->input('harga_pengiriman');

        $pengirimen->save();
        return response()->json($pengirimen);
    }

    public function show(Request $request)
    {
        $pengirimen = Pengiriman::all();
        return response()->json($pengirimen);
    }

    public function showId(Request $request, $id)
    {
        $pengirimen = Penerima::find($id);
        return response()->json($pengirimen);
    }

    public function update(Request $request, $id)
    {
        $pengirimen = Pengiriman::find($id);
        $pengirimen->nama_pengirim = $request->input('nama_layanan');
        $pengirimen->kota_pengirim = $request->input('harga_pengiriman');

        $pengirimen->save();
        return response()->json($pengirimen);
    }

    public function delete(Request $request, $id)
    {
        $pengirimen = Pengiriman::find($id);
        $pengirimen->delete();
        return response()->json($pengirimen);
    }

    public function showData($id){
        $pengirimen = Pengiriman::join('barangs','barangs.id','=','pengirimen.id_barang')->join('penerimas','penerimas.id','=','pengirimen.id_penerima')
        ->join('pengirims','pengirims.id','=','pengirimen.id_pengirim')->where('pengirimen.id',$id)->get(['barangs.nama_barang','barangs.berat','penerimas.*','pengirims.*','pengirimen.*']);
        // $pengirimen = Pengiriman::find($id);
        return response()->json($pengirimen);
    }
}
