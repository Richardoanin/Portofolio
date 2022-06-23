<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $items = product::all();
        return view('admin.AdminProduct', compact('items'));
    }

    public function create()
    {
        return view('admin.AddProduct');
    }
    public function edit($id)
    {
        $item = Product::find($id);

        return view('/admin/EditProduct',[
            'item'=>$item
        ]);
    }

    public function store(Request $request)
    {
        Product::create([
            'paket' => $request->paket,
            'harga' => $request->harga,
            'service' => $request->service
        ]);

        return redirect('/product')->with('success','Produk Berhasil di Tambahkan!');
    }
    public function update(Request $request,int $id)
    {

        $item = product::find($id);

        $item->paket = $request['paket'];
        $item->harga = $request['harga'];
        $item->service = $request['service'];
        $item->save();

        return redirect('/product')->with('success','Produk Berhasil di Update!');
    }
    public function destroy(Request $request,int $id)
    {
        $item = product::findOrFail($id);
        $item->delete();

        return redirect('/product')->with('success','Produk Berhasil di Delete!');
    }
}
