@extends('layout.app')
@section('content')

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
  data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
  <header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
      <div class="navbar-header fixed-top mt-3" data-logobg="skin6">
        <a class="navbar-brand" href="/dashboard">
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
          <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
            href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
            <form class="app-search position-absolute" action="/materi/cari" method="GET">
              <input type="text" class="form-control" placeholder="Search &amp; enter" name="cari"> <a
                class="srh-btn"><i class="mdi mdi-window-close"></i></a>
            </form>
          </li>
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
                      <li class="breadcrumb-item active" aria-current="page">Materi</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Materi</h1> 
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              @if (Auth::user()->role == 'Administrator')
                <button class="btn btn-success text-white mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal"><i class="mdi mdi-folder-plus"></i>Tambah Materi</button>
              @else
              @endif
                <div class="card">
                    <div class="card-body">
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
                                  @php
                                      $count = 0;
                                  @endphp
                                  @foreach ($data as $item)
                                    @php
                                        $count += 1;
                                    @endphp
                                  <tr>
                                    <th scope="row">@php
                                        echo($count);
                                    @endphp</th>
                                    <td>{{$item->materi}}</td>
                                    <td class="d-flex">
                                      @if (Auth::user()->role == 'Administrator')
                                        <button class="btn btn-primary text-white me-2" data-bs-toggle="modal" data-bs-target="#lihatModal{{$item->id}}"><i class="mdi mdi-open-in-new"></i>Lihat</button>
                                        <button class="btn btn-warning text-white me-2" data-bs-toggle="modal" data-bs-target="#ubahModal{{$item->id}}"><i class="mdi mdi-file-restore"></i>Ubah</button>
                                        <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#hapusModal{{$item->id}}"><i class="mdi mdi-delete"></i>Hapus</button>
                                      @elseif (Auth::user()->role == 'User')
                                        <button class="btn btn-primary text-white me-2" data-bs-toggle="modal" data-bs-target="#lihatModal{{$item->id}}"><i class="mdi mdi-open-in-new"></i>Lihat</button>
                                      @endif
                                    </td>
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
                                  
                                  {{-- Modal Ubah --}}
                                  <div class="modal fade" id="ubahModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="/ubah/materi/{{$item->id}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          <div class="modal-body">
                                              <label for="message-text" class="col-form-label">Materi</label>
                                              <input type="text" class="form-control" id="materi" name="materi" value="{{$item->materi}}">
                                              <div class="mb-3">
                                                  <label for="formFileMultiple" class="form-label">Dokumen</label>
                                                  <input class="form-control" type="file" id="file" name="file" multiple value="{{$item->file}}">
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>

                                  <!-- Modal Hapus -->
                                  <div class="modal fade" id="hapusModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Hapus Materi</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          Apakah anda yakin?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                          <form action="/hapus/materi/{{$item->id}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <button type="submit" class="btn btn-danger text-white">Hapus</button>
                                          </form>
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
            </div>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/tambah/materi" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                  <label for="message-text" class="col-form-label">Materi</label>
                  <input type="text" class="form-control" id="materi" name="materi">
                  <div class="mb-3">
                      <label for="formFileMultiple" class="form-label">Dokumen</label>
                      <input class="form-control" type="file" id="file" name="file" multiple>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
@endsection