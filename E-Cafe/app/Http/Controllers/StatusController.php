<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if($request->ajax()){
            if(!Auth::user()){
                return redirect()->route('login');
            }
            if(Auth::user()->role == 'pelanggan'){
                $collection = Order::where('id_user',Auth::user()->id)->paginate(5);
            }else{
                $collection = Order::paginate(5);
            }
            return view('status.list', compact('collection'));
        }
        return view('status.main');
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
        //
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
    public function edit(Order $order,$id)
    {
        $collection = Order::where('id',$id)->first();
        return view('status.input',compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $order=  Order::where('id',$id)->first();
        $order->status = $request->st;
        $order->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan Di Update',
        ]);
    }

    public function destroy($id)
    {
        $status = Order::where('id', $id)->first();
        $status->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan Dihapus',
        ]);
    }
}
