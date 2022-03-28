@extends('layouts.app')
 
@section('content')
    <h1 style="text-align: center; font-weight: bold; margin-top: 20px;">KONTAK CAFE</h1>
    <section id="content">
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
           
            <!-- Content Row-->
            <div id="content_list">
                <div class="wrapper">
                    <button class="btn btn-primary mb-3" onclick="load_input('{{route('contact.create')}}')">Tambah Kontak/Sosial Media</button>
                    <div id="list_result"></div>
                </div>
            </div>
            <div id="content_input"></div>
        </section>

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

 

