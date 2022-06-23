<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller{
    public function login(Request $request){
        
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $data = User::where('email', $request -> email)->first();
            Session::put('user', $data);
            if ($data->user == 'user'){
                return redirect()->intended('profile/'. $data->id)->with('success', 'Selamat Datang '. Auth()->user()->nama);
            }
            if ($data->user == 'psikolog'){
                return redirect()->intended('jadwal/'. $data->id)->with('success', 'Selamat Datang '. Auth()->user()->nama);
            }
            if ($data->user == 'admin'){
                return redirect()->intended('/admin')->with('success', 'Selamat Datang '. Auth()->user()->nama);
            }
        }

        return back()->with('error', 'Email atau Password Kamu Salah!');
    }
}