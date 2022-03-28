<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Menu::paginate(5);
            return view('menu.list', compact('collection'));
        }
        return view('menu.main');
    }

    public function create()
    {
        return view('menu.input', ["menu"=>new Menu]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            } elseif ($errors->has('harga')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('harga'),
                ]);
            } elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            } elseif ($errors->has('gambar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('gambar'),
                ]);
            }
        }

        $menu = new Menu;
        $menu->nama = $request->nama;
        $menu->harga = $request->harga;
        $menu->deskripsi = $request->deskripsi;
        $menu->gambar = request()->file('gambar')->store("menu");
        $menu->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Menu ' . $request->nama . ' Tersimpan',
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit(Menu $menu)
    {
        return view('menu.input',compact('menu'));
    }

    public function update(Request $request,Menu $menu)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            } elseif ($errors->has('harga')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('harga'),
                ]);
            } elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            }
        }
        $menu->nama = $request->nama;
        $menu->harga = $request->harga;
        $menu->deskripsi = $request->deskripsi;
        if(request()->file('gambar')){
            Storage::delete($menu->gambar);
            $menu->gambar =$menu->gambar;
            $file = request()->file('gambar')->store("menu");
            $menu->gambar =$file;
        }
        $menu->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Menu ' . $request->nama . ' Tersimpan',
        ]);
    }

    public function destroy(Menu $menu)
    {
        Storage::delete($menu->gambar);
        $menu->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Menu ' . $menu->nama . ' Dihapus',
        ]);
    }
}
