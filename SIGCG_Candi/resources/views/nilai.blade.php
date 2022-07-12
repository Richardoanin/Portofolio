@extends('layout.app')
@section('content')

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
  data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
  <header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
      <div class="navbar-header" data-logobg="skin6">
        <a class="navbar-brand fixed-top mt-3" href="/dashboard">
          <b class="logo-icon">
            <img src="/assets/images/logocb.png" width="180" height="50" alt="homepage" class="dark-logo" />
          </b>
                        {{-- <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span> --}}
        </a>
    </nav>
  </header>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                      <li class="breadcrumb-item"><a href="#" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                      <li class="breadcrumb-item active" aria-current="page">Survey</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Survey Kepemahaman</h1> 
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @foreach ($nilai as $item)
                    <h1 class="text-center mt-5">Nilai kamu adalah {{$item->nilai}}</h1>
                    <p class="text-center">Benar: {{$item->benar}} Salah: {{$item->salah}}</p>
                @endforeach
                <form action="/feedback/send" method="POST">
                    @csrf
                    <h3 class="text-center mt-5">Mohon Penilaian Anda Terhadap Layanan Kami</h3>
                    <div class="btn-group-horizontal text-center mt-3">
                        <input type="hidden" id="feedback" name="feedback">
                        <input type="text" id="b1" class="btn btn-light border border-secondary rounded" value="Bagus" readonly>
                        <input type="text" id="b2" class="btn btn-light border border-secondary rounded" value="Biasa" readonly>
                        <input type="text" id="b3" class="btn btn-light border border-secondary rounded" value="Kurang" readonly>
                    </div>
                    <div class="mt-5 col-5 mx-auto">
                        <label for="exampleFormControlTextarea1" class="form-label">Saran</label>
                        <textarea class="form-control border border-secondary rounded" id="exampleFormControlTextarea1" rows="3" name="saran"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success text-white mt-3" value="Submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
    const btn1 = document.getElementById("b1");
    const btn2 = document.getElementById("b2");
    const btn3 = document.getElementById("b3");
    // btn 2
    // btn 3

    const feedback = document.getElementById("feedback");

    btn1.addEventListener("click", function () {
        feedback.value = btn1.value;
    });

    btn2.addEventListener("click", function () {
        feedback.value = btn2.value;
    });

    btn3.addEventListener("click", function () {
        feedback.value = btn3.value;
    });
    };
</script>

<script>
var b1 = document.getElementById("b1");
var b2 = document.getElementById("b2");
var b3 = document.getElementById("b3");

b1.onclick = function() {
     b1.style.background = "#00FFAB";
     b2.style.background = "";
     b3.style.background = "";    
}

b2.onclick = function() {
     b1.style.background = "";
     b2.style.background = "#00FFAB";
     b3.style.background = "";    
}

b3.onclick = function() {
     b1.style.background = "";
     b2.style.background = "";
     b3.style.background = "#00FFAB";    
}
</script>
@endsection