<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\Pembelian;

class PaymentController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::join('users', 'pembelians.id_user', '=', 'users.id')->join('products', 'pembelians.pilihan', '=', 'products.paket')->get(['pembelians.*', 'users.nama', 'products.paket', 'products.harga']);
        return view('admin.AdminPayment', compact('pembelian'));
    }

    public function update(Request $request, $id)
    {
        Pembelian::find($id)->update([
            'status' => $request->status
        ]);
        return redirect("/payment")->with('success','Berhasil Update Status!');
    }
}
