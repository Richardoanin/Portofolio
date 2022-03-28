@extends('layout')
@section('content')

<div class="container">
    <h3 style="text-align: center; margin-top: 50px;">Update Patient</h3>
    <form action="/patient/{{$patient->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Vaccine Id</label>
            <input type="text" name="vaccine" class="form-control" id="inputEmail4" value="{{$patient->vaccine_id}}" readonly>
        </div>
        <div class="col-12">
            <label for="inputPassword4" class="form-label">Patient Name</label>
            <input type="text" class="form-control" name="name" value="{{$patient->name}}">
        </div>
        <div class="col-12">
            <label for="inputPassword4" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="{{$patient->alamat}}">
        </div>
        <div class="col-12">
            <label for="inputEmail4" class="form-label">NIK</label>
            <input type="number" name="nik" class="form-control" id="inputEmail4" value="{{$patient->nik}}">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">KTP</label>
            <input type="file" name="image" class="form-control" id="inputGroupFile02">
        </div>
        <div class="col-12">
            <label for="inputEmail4" class="form-label">No HP</label>
            <input type="number" name="nomor" class="form-control" id="inputEmail4" value="{{$patient->no_hp}}">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>

@endsection