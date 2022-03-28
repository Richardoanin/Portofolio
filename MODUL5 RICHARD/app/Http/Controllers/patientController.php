<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class patientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = DB::table('patients')->count();
        $patient = Patient::orderBy('id')->get();
        return view('patient', compact('patient', 'count'));
    }

    public function register()
    {
        $count = DB::table('vaccines')->count();
        $vaccine = Vaccine::orderBy('id')->get();
        return view('registVac', compact('vaccine', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $vaccine = Vaccine::find($id);
        return view('registerPat', compact('vaccine'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imgName = $request->image;
        if ($request->image) {
            $imgName = $request->image->getClientOriginalName() . '-' . time()
                . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imgName);
        }

        Patient::create([
            'vaccine_id' => $request->vaccine,
            'name' => $request->name,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'image_ktp' => $imgName,
            'no_hp' => $request->nomor,
        ]);

        return redirect('/patient');
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
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('updatePat', compact('patient'));
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
        $imgName = Patient::find($id);
        if ($request->image) {
            $imgName = $request->image->getClientOriginalName() . '-' . time()
                . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imgName);
        }

        Patient::find($id)->update([
            'vaccine_id' => $request->vaccine,
            'name' => $request->name,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'image_ktp' => $imgName,
            'no_hp' => $request->nomor,
        ]);

        return redirect('/patient');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::find($id)->delete();
        return redirect('/patient');
    }
}
