<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pembelian;
use App\Models\User;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function show(Request $request) {
        $data = Pembelian::get();
        return view('user.chose', compact('data'));
    }

    public function upload(Request $request, $id)
    {
        if ($request->transfer) {
            $imgName = time() . $request->transfer->getClientOriginalName();
            $request->transfer->move(public_path('gambar'), $imgName);

            Pembelian::find($id)->update([
                'transfer' => $imgName
            ]);
        }
        return redirect("payment/".auth()->user()->id)->with('success', 'Pesanan Kamu Telah Berhasil!');
    }

    public function bayar(Request $request)
    {
        $dokter = User::find($request->dokter);
        $layanan = Layanan::where('paket', $request->pilihan)->first();
        $pembelian = Pembelian::create([
            'id_user' => auth()->user()->id,
            'pilihan' => $request->pilihan,
            'dokter' => $request->dokter
        ]);

        return view('bayar', compact('pembelian', 'dokter', 'layanan'));
    }
        
}
