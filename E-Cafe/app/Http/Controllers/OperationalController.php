<?php

namespace App\Http\Controllers;

use App\Models\Operational;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OperationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Operational::paginate(5);
            return view('operational.list', compact('collection'));
        }
        return view('operational.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Operational $operational)
    {
        return view('operational.input',["operational"=>new $operational]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Operational $operational)
    {
        $validator = Validator::make($request->all(), [
            'open' => 'required',
            'close' => 'required',
            'day' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('open')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('open'),
                ]);
            }  elseif ($errors->has('close')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('close'),
                ]);
            }  elseif ($errors->has('day')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('day'),
                ]);
            }
        }

        $operational = new Operational;
        $operational->open = $request->open;
        $operational->close = $request->close;
        $operational->day = $request->day;
        $operational->keterangan = $request->keterangan;
        $operational->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Informasi Tersimpan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operational  $operational
     * @return \Illuminate\Http\Response
     */
    public function show(Operational $operational)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operational  $operational
     * @return \Illuminate\Http\Response
     */
    public function edit(Operational $operational)
    {
        return view('operational.input',compact('operational'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operational  $operational
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operational $operational)
    {
        $validator = Validator::make($request->all(), [
            'open' => 'required',
            'close' => 'required',
            'day' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('open')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('open'),
                ]);
            }  elseif ($errors->has('close')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('close'),
                ]);
            }  elseif ($errors->has('day')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('day'),
                ]);
            }
        }

        $operational->open = $request->open;
        $operational->close = $request->close;
        $operational->day = $request->day;
        $operational->keterangan = $request->keterangan;
        $operational->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Jam kerja Tersimpan',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operational  $operational
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operational $operational)
    {
        $operational->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Jam operational Dihapus',
        ]);
    }
}
