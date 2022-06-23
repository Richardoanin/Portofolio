<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsikologController extends Controller
{
    public function index()
    {
        $jadwal = Pembelian::where('dokter', Auth::user()->id)->where('status','Lunas')->join('users', 'pembelians.id_user', '=', 'users.id')->join('products', 'pembelians.pilihan', '=', 'products.paket')->get(['pembelians.*', 'users.nama', 'products.paket', 'products.service']);
        return view('psikolog.jadwal', compact('jadwal'));
    }

    public function input(Request $request, $id){
        Pembelian::find($request->id)->update([
            'jadwal' => $request->jadwal,
            'link' =>$request->link
        ]);
        return redirect('jadwal/' . $request->id)->with('success','Jadwal dan Link Berhasil di Input!');
    }

    public function chat()
    {
        $contact = Pembelian::where('dokter', Auth::user()->id)->where('status','Lunas')->join('users', 'pembelians.id_user', '=', 'users.id')->get(['pembelians.*', 'users.nama', 'users.nomor']);
        return view('psikolog.chat', compact('contact'));
    }

    public function profil()
    {
        return view('psikolog.profile');
    }

    public function show($id)
    {
        $data = User::find($id);
        return view('psikolog.profile', compact('data'));
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('psikolog.editProfile', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $imgName = User::find($request->id);
        if ($request->gambar) {
            $imgName = time() . $request->gambar->getClientOriginalName();
            $request->gambar->move(public_path('gambar'), $imgName);
        }

        User::find($request->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor' => $request->nomor,
            'lahir' => $request->lahir,
            'kelamin' => $request->kelamin,
            'gambar' => $imgName,
        ]);
        return redirect('profil/' . $request->id)->with('success','Data Kamu Berhasil di Update!');
    }
}