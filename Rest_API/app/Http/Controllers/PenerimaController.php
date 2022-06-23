<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use Illuminate\Http\Request;

class PenerimaController extends Controller
{
    public function create(Request $request)
    {
        $penerimas = new Penerima();

        $penerimas->nama_penerima = $request->input('nama_penerima');
        $penerimas->alamat = $request->input('alamat');
        $penerimas->kode_pos = $request->input('kode_pos');
        $penerimas->telp_penerima = $request->input('telp_penerima');

        $penerimas->save();
        return response()->json($penerimas);
    }

    public function show(Request $request)
    {
        $penerimas = Penerima::all();
        return response()->json($penerimas);
    }

    public function showId(Request $request, $id)
    {
        $penerimas = Penerima::find($id);
        return response()->json($penerimas);
    }

    public function update(Request $request, $id)
    {
        $penerimas = Penerima::find($id);
        $penerimas->nama_penerima = $request->input('nama_penerima');
        $penerimas->alamat = $request->input('alamat');
        $penerimas->kode_pos = $request->input('kode_pos');
        $penerimas->telp_penerima = $request->input('telp_penerima');

        $penerimas->save();
        return response()->json($penerimas);
    }

    public function delete(Request $request, $id)
    {
        $penerimas = Penerima::find($id);
        $penerimas->delete();
        return response()->json($penerimas);
    }
}
