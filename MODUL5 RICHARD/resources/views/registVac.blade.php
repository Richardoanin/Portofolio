@extends('layout')
@section('content')

<div class="container">
    <h3 style="text-align: center; margin-top: 50px;">List Vaccine</h3>
    <div class="row">
        @foreach($vaccine as $data)
        <div class="card col-3 me-4">
            <img src="/image/{{$data->image}}" class="card-img-top" alt="image">
            <div class="card-body">
                <h5 class="card-title">{{$data->name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Rp {{$data->price}}</h6>
                <p class="card-text">{{$data->description}}</p>
            </div>
            <div class="card-footer">
                <div class="button d-flex">
                    <a href="/patient/create/{{$data->id}}/" class="btn btn-primary col">Vaccine Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection