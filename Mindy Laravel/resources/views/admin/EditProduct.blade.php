@extends('layouts.admin')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-6">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-8 pb-2 mb-3">
        <h1>Product</h1>
        <a href="/logout"class="btn btn-success px-3 py-2 primary-btn mb-5" style="border-radius: 30px; font-size: 20px; background-color: #079911;margin-right: 40px;">Logout</a>
    </div>
    <div class="container-fluid" style="width: 850px;margin-left: 80px;">
        <form action="/product/update/{{ $item->id }}" method="POST">
            @csrf  
            <div class="row mb-3">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="paket" placeholder="Paket" value="{{ $item->paket }}"> 
                </div>
            </div>
            <div class="row mb-3">
                <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                <div class="col-sm-7">
                <input type="number" class="form-control" name="harga" placeholder="Harga" value="{{ $item->harga }}">
                </div>
            </div>
            <div class="row mb-5">
                <label for="service" class="col-sm-3 col-form-label">Service</label>
                <div class="col-sm-7">
                    <textarea class="form-control" name="service" rows="3" placeholder="Service" value="{{ $item->service }}"></textarea>
                </div>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="Dashboard_Admin_Product.html"class="btn btn-success px-4 py-2 primary-btn mb-5" style="border-radius: 30px; font-size: 20px; background-color: #000;margin-top: 20px;margin-left: 235%;left: 100%;">Cancel</a>
                <button class="btn btn-success px-4 py-2 primary-btn mb-5" type="submit" style="border-radius: 30px; font-size: 20px; background-color: #079911;margin-top: 20px;margin-left: 10%;left: 100%;">Save</button>
            </div>
            
        </form>
    </div>
</main>

@endsection