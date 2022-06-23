<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profileUser');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('user.profileUser', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('user.editUser', compact('data'));
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
        return redirect('profile/' . $request->id)->with('success','Data Kamu Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function schedule()
    {
        $schedule = Pembelian::where('id_user', Auth::user()->id)->where('status','Lunas')->join('users', 'pembelians.dokter', '=', 'users.id')->get(['pembelians.*', 'users.nama', 'users.nomor']);
        return view('user.scheduleUser', compact('schedule'));
    }

    public function payment()
    {
        $pembelian = Pembelian::where('id_user', Auth::user()->id)->join('users', 'pembelians.dokter', '=', 'users.id')->join('products', 'pembelians.pilihan', '=', 'products.paket')->get(['pembelians.*', 'users.nama', 'products.paket', 'products.harga']);
        return view('user.paymentUser', compact('pembelian'));
    }

    public function video()
    {
        return view('user.videoUser');
    }

    public function akun()
    {
        if (Auth::user()->user == 'user') {
            return redirect()->intended('profile/' . auth::id());
        }
        if (auth::user()->user == 'psikolog') {
            return redirect()->intended('psikolog/' . auth::id());
        }
        if (auth::user()->user == 'admin') {
            return redirect()->intended('/admin');
        }
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/masuk')->with('success', 'Kamu Berhasil Logout!');
    }
}
