@extends('layout')
@section('content')

<div class="container">
    <h3 style="text-align: center; margin-top: 50px;">Register Patient</h3>
    <form action="/patient" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Vaccine Id</label>
            <input type="text" name="vaccine" class="form-control" id="inputEmail4" value="{{$vaccine->id}}" readonly>
        </div>
        <div class="col-12">
            <label for="inputPassword4" class="form-label">Patient Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="col-12">
            <label for="inputPassword4" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat">
        </div>
        <div class="col-12">
            <label for="inputEmail4" class="form-label">NIK</label>
            <input type="number" name="nik" class="form-control" id="inputEmail4">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">KTP</label>
            <input type="file" name="image" class="form-control" id="inputGroupFile02">
        </div>
        <div class="col-12">
            <label for="inputEmail4" class="form-label">No HP</label>
            <input type="number" name="nomor" class="form-control" id="inputEmail4">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>

@endsection