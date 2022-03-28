<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function dologin(Request $request){
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $check = User::where("email", "=", $request->email)->first();
        if ($check) {
            if (Auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::guard('web')->user()) {
                    $html = view('info.main')->render();
                    return response()->json([
                        'alert' => 'success',
                        'message' => 'Welcome back ' . Auth()->user()->name,
                        [$html],
                    ]);
                }
            } 
            else {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Password Salah!.',
                ]);
            }
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Email Tidak Ditemukan!',
            ]);
        }
    }


    public function doregister(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:users|max:255',
            'no_hp' => 'required',
            'password' => 'required|min:8|max:12',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } elseif ($errors->has('no_hp')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('no_hp'),
                ]);
            } elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $user = new User;
        $user->name = Str::title($request->nama);
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->password = Hash::make($request->password);
        $user->role = 'pelanggan';
        $user->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'pelanggan ' . $request->nama . ' Registered',
        ]);
    }

    public function logout(){
        $user = Auth()->user();
        Auth::logout($user);
        return redirect()->route('login');
    }

}
