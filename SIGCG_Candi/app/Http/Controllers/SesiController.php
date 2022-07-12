<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Sesi::create([
            'sesi' => $request->sesi,
            'mulai' => date_format(date_create($request->mulai),"D, d-m-Y H:i"),
            'selesai' => date_format(date_create($request->selesai),"D, d-m-Y H:i")
        ]);
        return redirect('/survey');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Sesi::get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        Sesi::find($id)->update([
            'sesi' => $request->sesi,
            'mulai' => date_format(date_create($request->mulai),"D, d-m-Y H:i"),
            'selesai' => date_format(date_create($request->selesai),"D, d-m-Y H:i") 
        ]);
        return redirect('survey');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sesi::find($id)->delete();
        return redirect('/survey')->with('Success', 'Data berhasil dihapus!');
    }
}
