<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function handle($request, Closure $next)
    {
        if ( ! $this->auth->user() ) {
            return(redirect('/login'));
        }

    return $next($request);
    }
}
