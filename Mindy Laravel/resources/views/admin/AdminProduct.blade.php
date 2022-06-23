@extends('layouts.admin')

@section('content')
<main class="col-md-5 ms-sm-auto col-lg-10 px-md-6">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-8 pb-2 mb-3">
        <h1>Product</h1>
        <a href="/logout" class="btn btn-success px-3 py-2 primary-btn mb-5"
        style="border-radius: 30px; font-size: 20px; background-color: #079911;margin-right: 40px;">Logout</a>
    </div>
    <div class="container-fluid" style="width: 700px;">
        <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col" width="30px">Action</th>
                <th scope="col" width="30px" ></th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 0;
            @endphp
            @foreach ($items as $item)
            @php
                $count += 1;
            @endphp
                <tr>
                    <th>{{ $count }}</th>
                    <td>{{ $item->paket }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>
                        <a href="/product/edit/{{ $item->id }}" class="btn btn-warning px-4"
                        style="border-radius: 30px; font-size: 12px; color: #ffffff">Edit</a>
                    </td>
                    <td>
                        <form action="/product/destroy/{{ $item->id }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-danger px-4" style="border-radius: 30px; font-size: 12px;">
                                Delete
                            </button>
                        </form>
                       
                    </td>
                </tr>
           @endforeach
        </tbody>
    </table>
        <a href="/product/AddProduct" style="color: #000000;">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle"
            viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path
            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>
        </a>
    </div>
</main>

@endsection