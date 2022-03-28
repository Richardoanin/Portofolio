@extends('layout')
@section('content')

<div class="container">
    @if ($count < 1)
    <div class="d-flex align-items-center flex-column">
        <p class="mt-5" style="color: grey;">There is no data...</p>
        <a href="/patient/register" class="btn btn-primary">Register Patient</a>
    </div>
    @else
    <h3 style="text-align: center; margin-top: 50px;">List Patient</h3>
    <a href="/patient/register" class="btn btn-primary" style="margin-bottom: 20px; margin-top: 20px;">Add Patient</a>
    <table class="table">
        <thead>
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">NIK</th>
                <th scope="col">Alamat</th>
                <th scope="col">No HP</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patient as $data)
            <tr class="table-primary">
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$data->name}}</td>
                <td>{{$data->nik}}</td>
                <td>{{$data->alamat}}</td>
                <td>{{$data->no_hp}}</td>
                <td>
                    <div class="button d-flex">
                        <a href="/patient/{{$data->id}}/edit" class="btn btn-warning">Edit</a>
                        <form action="/patient/{{$data->id}}" method="post">
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