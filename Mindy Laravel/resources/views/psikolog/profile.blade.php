@extends('psikolog.app')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-8 pb-2 mb-3">
  <h1>Profile</h1>
  <a href="/logout" class="btn btn-success px-3 py-2 primary-btn mb-5"
      style="border-radius: 30px; font-size: 20px; background-color: #079911;margin-right: 40px;">Logout</a>
</div>
<div class="isi" style="display: flex;">
  <img src="/gambar/{{$data->gambar}}"
      style=" width: 300px;height: 300px;left: 406px;top: 260px; margin-left: 150px; border-radius: 50%;">
    <div class="container">
        <table class="table table-borderless" style="background-color: #fff;">
            <tr>
                <td>Nama</td>
                <td>{{$data->nama}}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>{{$data->lahir}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>{{$data->kelamin}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$data->email}}</td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td>{{$data->nomor}}</td>
            </tr>
        </table>
    </div>
</div>
<a href="/edit/psikolog/{{$data->id}}" class="btn btn-success px-3 py-2 primary-btn mb-5"
    style="border-radius: 30px; font-size: 20px; background-color: #079911;margin-left: 850px; margin-top: 20px; width: 100px;">Edit</a>
@endsection