@extends('layouts.app')

@section('content')

<div id="content_list">
    <div class="wrapper">
        @if (Auth::user() && Auth::user()->role == 'owner')
            <button class="btn btn-primary" onclick="load_input('{{route('menu.create')}}')">Buat Menu</button>
        @endif
        <div class="title">
            <h4><span>fresh coffee for start the day!</span>our menu</h4>
        </div>
        <div class="menu">
            <div id="list_result"></div>    
        </div>
    </div>
</div>
<div id="content_input"></div>
@section('custom_js')
    <script> 
        load_list(1);
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    </script> 
@endsection

@endsection