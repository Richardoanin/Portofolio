@extends('layout')
@section('content')

<div class="container">
    @if ($count < 1)
    <div class="d-flex align-items-center flex-column">
        <p class="mt-5" style="color: grey;">There is no data...</p>
        <a href="/vaccine/create" class="btn btn-primary">Add Vaccine</a>
    </div>
    @else
    <h3 style="text-align: center; margin-top: 50px;">List Vaccine</h3>
    <a href="/vaccine/create" class="btn btn-primary" style="margin-bottom: 20px; margin-top: 20px;">Add Vaccine</a>
    <table class="table">
        <thead>
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vaccine as $data)
            <tr class="table-primary">
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$data->name}}</td>
                <td>{{$data->price}}</td>
                <td>
                    <div class="button d-flex">
                        <a href="/vaccine/{{$data->id}}/edit" class="btn btn-warning">Edit</a>
                        <form action="/vaccine/{{$data->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-2">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection