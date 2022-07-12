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
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
          class="mdi mdi-menu"></i></a>
      </div>
      <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
        <ul class="navbar-nav float-start me-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
          {{-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
            href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
            <form class="app-search position-absolute">
              <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                class="srh-btn"><i class="mdi mdi-window-close"></i></a>
            </form>
          </li> --}}
        </ul>
        <ul class="navbar-nav float-end">
          <li class="nav-item dropdown d-flex">
            <p class="mt-4">{{auth()->user()->role}}</p>
            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="/assets/images/users/user.png" alt="user" class="rounded-circle" width="31">
            </a>
            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
              <a class="dropdown-item text-center">{{auth()->user()->nama}}</a>
              <a class="dropdown-item" href="/logout"><i class="mdi mdi-logout m-r-5 m-l-5"></i>
                Logout</a>
            </ul>
          </li>
        </ul>
      </div>
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
                <form action="/survey/jawab" method="POST">
                @csrf
                @foreach ($data as $item)
                <div class="card">
                    <div class="card-body d-inline">
                        <h4>{{$loop->iteration}}. {{$item->pertanyaan}}</h4>
                        <input type="hidden" name="id_soal[]" value='{{$item->id}}'>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban{{$item->id}}[]" id="jawaban1" value="{{$item->opsi1}}" required>
                            <label class="form-check-label" for="jawaban1">
                              {{$item->opsi1}}
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban{{$item->id}}[]" id="jawaban2" value="{{$item->opsi2}}">
                            <label class="form-check-label" for="jawaban2">
                              {{$item->opsi2}}
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban{{$item->id}}[]" id="jawaban3" value="{{$item->opsi3}}">
                            <label class="form-check-label" for="jawaban3">
                              {{$item->opsi3}}
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="jawaban{{$item->id}}[]" id="jawaban4" value="{{$item->opsi4}}">
                            <label class="form-check-label" for="jawaban4">
                              {{$item->opsi4}}
                            </label>
                          </div>
                    </div>
                </div>
                @endforeach
                <button type="submit" class="btn btn-success" style="color: white">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection