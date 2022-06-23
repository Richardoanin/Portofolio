<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function handle($request, Closure $next)
{
    if ( ! $this->auth->user() )
    {
        return(redirect('/masuk'));
    }

    return $next($request);
}
    public function index(Request $request) {
        $layanan = Layanan::get();
        $user = User::where('user','psikolog')->get();
        return view('pilihLayanan', compact('layanan', 'user'));
    }
}
