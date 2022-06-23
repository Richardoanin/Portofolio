<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $items = product::all();
        return view('landing', compact('items'));
    }
}
