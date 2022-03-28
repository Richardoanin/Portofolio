<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = DB::table('Vaccines')->count();
        $vaccine = Vaccine::orderBy('id')->get();
        return view('vaccine', compact('vaccine', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inputVac');
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

        Vaccine::create([
            'name' => $request->vaccine,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imgName
        ]);

        return redirect('/vaccine');
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
        $vaccine = Vaccine::find($id);
        return view('updateVac', compact('vaccine'));
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
        $imgName = Vaccine::find($id);
        if ($request->image) {
            $imgName = $request->image->getClientOriginalName() . '-' . time()
                . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imgName);
        }

        Vaccine::find($id)->update([
            'name' => $request->vaccine,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imgName
        ]);

        return redirect('/vaccine');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vaccine::find($id)->delete();
        return redirect('/vaccine');
    }
}
