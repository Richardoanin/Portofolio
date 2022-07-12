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
          <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
            href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
            <form class="app-search position-absolute" action="/partisipan/cari" method="GET">
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
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                      <li class="breadcrumb-item"><a href="/dashboard" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                      <li class="breadcrumb-item active" aria-current="page">Partisipan</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Partisipan</h1> 
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              @if (Auth::user()->role == 'Administrator')
                <button class="btn btn-primary text-white mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal"><i class="mdi mdi-account-multiple-plus"></i>Tambah Partisipan</button>
                <button class="btn btn-success text-white mb-3" data-bs-toggle="modal" data-bs-target="#importModal"><i class="mdi mdi-file-excel"></i>Import Excel</button>
              @else
              @endif
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Bagian</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Status</th>
                                        @if (Auth::user()->role == 'Administrator')
                                        <th scope="col">Aksi</th>
                                        @else
                                        @endif
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
                                      <td>{{$item->nama}}</td>
                                      <td>{{$item->nik}}</td>
                                      <td>{{$item->bagian}}</td>
                                      <td>{{$item->jabatan}}</td>
                                      <td>{{$item->status}}</td>
                                      @if (Auth::user()->role == 'Administrator')
                                      <td class="d-flex">
                                        <button class="btn btn-warning text-white me-2" data-bs-toggle="modal" data-bs-target="#ubahModal{{$item->id}}"><i class="mdi mdi-account-edit"></i>Ubah</button>
                                        @if ($item->role === 'Administrator')
                                        
                                        @else
                                        <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#hapusModal{{$item->id}}"><i class="mdi mdi-account-remove"></i>Hapus</button>
                                        @endif
                                      </td>
                                      @else
                                      @endif
                                    </tr>

                                    <!-- Modal Ubah -->
                                    <div class="modal fade" id="ubahModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Partisipan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <form action="/ubah/{{$item->id}}" method="post">
                                          <div class="modal-body">
                                                @csrf
                                                  <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Nama</label>
                                                    <input type="text" class="form-control" id="recipient-name" name="nama" value="{{$item->nama}}">
                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">NIK</label>
                                                    <input type="text" class="form-control" id="message-text" name="nik" value="{{$item->nik}}">
                                                  </div>
                                                  <div class="mb-3">
                                                      <label for="recipient-name" class="col-form-label">Bagian</label>
                                                      <input type="text" class="form-control" id="recipient-name" name="bagian" value="{{$item->bagian}}">
                                                  </div>
                                                  <div class="mb-3">
                                                      <label for="message-text" class="col-form-label">Jabatan</label>
                                                      <input type="text" class="form-control" id="message-text" name="jabatan" value="{{$item->jabatan}}">
                                                  </div>
                                                  <div class="mb-3">
                                                      <label for="recipient-name" class="col-form-label">Status</label>
                                                      <select class="form-select" aria-label="Default select example" name="status">
                                                          <option selected value="{{$item->status}}">{{$item->status}}</option>
                                                          <option value="Non Aktif">Non Aktif</option>
                                                          <option value="Aktif">Aktif</option>
                                                      </select>
                                                  </div>
                                                  <div class="mb-3">
                                                      <label for="message-text" class="col-form-label">Username</label>
                                                      <input type="text" class="form-control" id="message-text" name="username" value="{{$item->username}}">
                                                  </div>
                                                  <div class="mb-3">
                                                      <label for="message-text" class="col-form-label">Password</label>
                                                      <input type="password" class="form-control" id="message-text" name="password">
                                                  </div>
                                                  <div class="mb-3">
                                                      <label for="recipient-name" class="col-form-label">Role</label>
                                                      <select class="form-select" aria-label="Default select example" name="role">
                                                          <option selected value="{{$item->role}}">{{$item->role}}</option>
                                                          <option value="Administrator">Administrator</option>
                                                          <option value="User">User</option>
                                                      </select>
                                                  </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
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
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Partisipan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            Apakah anda yakin menghapus {{$item->nama}} ?
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="/hapus/{{$item->id}}" method="POST">
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
</div>
  
  <!-- Modal Tambah -->
  <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Partisipan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/tambah" method="post">
              @csrf
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nama</label>
                  <input type="text" class="form-control" name="nama" id="recipient-name">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">NIK</label>
                  <input type="text" class="form-control" name="nik" id="message-text">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Bagian</label>
                    <input type="text" class="form-control" name="bagian" id="recipient-name">
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" id="message-text">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Status</label>
                    <select class="form-select" name="status" aria-label="Default select example">
                        <option selected value="Aktif">Aktif</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Non Aktif">Non Aktif</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="message-text">
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="message-text">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Role</label>
                    <select class="form-select" aria-label="Default select example" name="role">
                        <option selected value="User">User</option>
                        <option value="User">User</option>
                        <option value="Administrator">Administrator</option>
                    </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Import -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/import/partisipan" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Pilih FIle Excel</label>
                <input class="form-control" type="file" id="file" name="file" required='required' multiple>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Import</button>
        </div>
      </form>
    </div>
  </div>
</div>
  @include('sweetalert::alert')
@endsection