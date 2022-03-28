@extends('layout')
@section('content')

<div class="container">
    <h3 style="text-align: center; margin-top: 50px;">Update Vaccine</h3>
    <form action="/vaccine/{{$vaccine->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Vaccine Name</label>
            <input type="text" name="vaccine" class="form-control" id="inputEmail4" value="{{$vaccine->name}}">
        </div>
        <div class="col-12">
            <label for="inputPassword4" class="form-label">Price</label>
            <div class="input-group">
                <div class="input-group-text">Rp</div>
                <input type="text" class="form-control" name="price" value="{{$vaccine->price}}">
            </div>
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="inputAddress"
                value="{{$vaccine->description}}">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="inputGroupFile02">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>

@endsection