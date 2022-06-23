<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function create(Request $request) {
        $barangs = new Barang();

        $barangs->nama_barang = $request->input('nama_barang');
        $barangs->jenis_barang = $request->input('jenis_barang');
        $barangs->berat = $request->input('berat');

        $barangs->save();
        return response()->json($barangs);
    }

    public function show(Request $request) {
        $barangs = Barang::all();
        return response()->json($barangs);
    }

    public function showId(Request $request, $id)
    {
        $barangs = Barang::find($id);
        return response()->json($barangs);
    }

    public function update(Request $request, $id) {
        $barangs = Barang::find($id);
        $barangs->nama_barang = $request->input('nama_barang');
        $barangs->jenis_barang = $request->input('jenis_barang');
        $barangs->berat = $request->input('berat');

        $barangs->save();
        return response()->json($barangs);
    }

    public function delete(Request $request, $id) {
        $barangs = Barang::find($id);
        $barangs->delete();
        return response()->json($barangs);
    }
}