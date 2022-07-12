<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function login(Request $request){
        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $data = User::where('username', $request -> username)->first();
            Session::put('role', $data);
            if ($data->role == 'User'){
                return redirect()->intended('/dashboard');
            }
            if ($data->role == 'Administrator'){
                return redirect()->intended('/dashboard');
            }
        return('failure');
        }
    }

    public function index(){

        return view('login');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/');
    }
}
