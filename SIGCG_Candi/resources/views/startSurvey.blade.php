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
                      <li class="breadcrumb-item"><a href="/dashboard" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
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
            <div class="card">
              <div class="card-body">
                <h3 class="mb-2 fw-bold">Materi</h3>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Materi</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->materi}}</td>
                        <td><button class="btn btn-primary text-white me-2" data-bs-toggle="modal" data-bs-target="#lihatModal{{$item->id}}"><i class="mdi mdi-open-in-new"></i>Lihat</button></td>
                      </tr>
      
                      {{-- Modal Lihat --}}
                      <div class="modal fade" id="lihatModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel" value="{{$item->materi}}">{{$item->materi}}</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <iframe src="{{ url('files/' . $item->file) }}" width="1480" height="640"></iframe>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
              <h5 class="text-center mt-5">Survey dimulai {{$survey->mulai}} Sampai {{$survey->selesai}}</h5>
              @forelse ($nilai as $item)
              <h5 class="text-center">Halo {{$item->nama}}, Nilai Kamu adalah {{$item->nilai}}</h5>

              @empty
              @if ($cek)
              <h4 class="text-center mt-3">Waktu Habis</h4>
              @elseif (strtotime(date("D, d-m-Y H:i")) < strtotime($survey->mulai))
              <h4 class="text-center mt-3">Survey Belum Dimulai</h4>
              @else
              <h5 class="text-center mt-5">Survey hanya dapat dilakukan satu kali, Pastikan anda sudah siap dalam mengerjakan survey!</h5>
              <button class="btn btn-success text-white mx-auto d-block mt-4" data-bs-toggle="modal" data-bs-target="#submitModal{{$item->id}}">Mulai Survey</button>
              @endif

              <!-- Modal Submit -->
              <div class="modal fade" id="submitModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Mulai Survey</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Apakah anda yakin?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <form action="/survey/start" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success" style="color: white">Mulai</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endforelse
          </div>
        </div>
    </div>
</div>

@endsection