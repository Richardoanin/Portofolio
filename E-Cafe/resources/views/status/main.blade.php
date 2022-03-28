@extends('layouts.app')

@section('content')

<!-- STATUS PESANAN -->
<div id="content_list">
    <section class="ftco-section mt-5">
        <div class="container">
            <h3 class="row justify-content-center"> Status Pemesanan</h3>
            <div class="container mt-3">
                <div id="list_result"></div>  
            </div>
        </div>
    </section>
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