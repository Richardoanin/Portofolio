<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Information::paginate(5);
            return view('info.list', compact('collection'));
        }
        return view('info.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('info.input', ["information"=> new Information]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'location' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('judul')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('judul'),
                ]);
            }  elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            } elseif ($errors->has('gambar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('gambar'),
                ]);
            } elseif ($errors->has('location')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('location'),
                ]);
            }
        }

        $info = new Information;
        $info->judul = $request->judul;
        $info->deskripsi = $request->deskripsi;
        $info->location = $request->location;
        $info->gambar = request()->file('gambar')->store("judul");
        $info->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Informasi ' . $request->judul . ' Tersimpan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information,$id)
    {   
        $information = Information::where('id',$id)->first();
        return view('info.input', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'location' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('judul')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('judul'),
                ]);
            }  elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            }  elseif ($errors->has('location')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('location'),
                ]);
            }
        }
        $information = Information::where('id', $id)->first();
        $information->judul = $request->judul;
        $information->deskripsi = $request->deskripsi;
        $information->location = $request->location;
        if(request()->file('gambar')){
            Storage::delete($information->gambar);
            $information->gambar =$information->gambar;
            $file = request()->file('gambar')->store("menu");
            $information->gambar =$file;
        }
        $information->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Informasi ' . $request->judul . ' Diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information,$id)
    {
        $information = Information::where('id',$id)->first();
        Storage::delete($information->gambar);
        $information->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Informasi ' . $information->judul . ' Dihapus',
        ]);
    }
}
