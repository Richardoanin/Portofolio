<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
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
    public function create($id)
    {
        $item = Menu::where('id', $id)->first();
        return view('order.input', ["menu" => new Order,"item"=>$item]);
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
            'nama' => 'required',
            'menu' => 'required',
            'jumlah' => 'required',
            'catatan' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            } elseif ($errors->has('menu')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('menu'),
                ]);
            } elseif ($errors->has('jumlah')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jumlah'),
                ]);
            } elseif ($errors->has('catatan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('catatan'),
                ]);
            }
        }
        $order = new Order;
        $order->id_user = $request->id_user;
        $order->id_menu = $request->id_menu;
        $order->jumlah = $request->jumlah;
        $order->status = 'waiting';
        $order->catatan = $request->catatan;
        $total = ($request->jumlah * $request->harga);
        $order->subtotal = $total;

        $order->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan ' . $request->nama_Pemesan . ' Tersimpan',
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
