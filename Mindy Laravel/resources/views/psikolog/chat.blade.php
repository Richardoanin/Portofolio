@extends('psikolog.app')
@section('content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-8 pb-2 mb-3">
    <h1>Chat</h1>
    <a href="/logout" class="btn btn-success px-3 py-2 primary-btn mb-5"
      style="border-radius: 30px; font-size: 20px; background-color: #079911;margin-right: 40px;">Logout</a>
  </div>
  <div class="container-fluid" style="width: 800px;">
    <table class="table table-borderless">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Kontak</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($contact as $item)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$item->nama}}</td>
          <td><a href="https://wa.me/{{$item->nomor}}" style="text-decoration: none; color: black;">{{$item->nomor}}</a></td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
@endsection