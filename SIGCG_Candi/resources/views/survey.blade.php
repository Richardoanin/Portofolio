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
        <button class="btn btn-primary text-white mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal" style="width: 134px"><i class="mdi mdi-note-plus"></i>Buat Soal</button>
        {{-- <button class="btn btn-warning text-white mb-3" data-bs-toggle="modal" data-bs-target="#ubahSemua"><i class="mdi mdi-update"></i>Ubah Sesi Soal</button> --}}
        <button class="btn btn-success text-white mb-3" data-bs-toggle="modal" data-bs-target="#importModal"><i class="mdi mdi-file-excel"></i>Import Excel</button>
        <button class="btn btn-secondary text-white mb-3" data-bs-toggle="modal" data-bs-target="#sesiModal" style="width: 134px"><i class="mdi mdi-calendar-plus"></i>Buat Sesi</button>
        <div class="table-responsive">
          <div id="printable">
            <table id="data_table" class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Sesi</th>
                  <th scope="col">Mulai</th>
                  <th scope="col">Selesai</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($sesi as $items)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>Sesi {{$items->sesi}}</td>
                  <td>{{$items->mulai}}</td>
                  <td>{{$items->selesai}}</td>
                  <td class="d-flex">
                    <button class="btn btn-warning text-white me-2" data-bs-toggle="modal" data-bs-target="#ubahSesi{{$items->id}}"><i class="mdi mdi-update"></i>Ubah</button>
                    <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#hapusSesi{{$items->id}}"><i class="mdi mdi-delete"></i>Hapus</button>
                  </td>
                </tr>
                <!-- Modal Ubah -->
                <div class="modal fade" id="ubahSesi{{$items->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Sesi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="/ubah/sesi/{{$items->id}}" method="post">
                      <div class="modal-body">
                            @csrf
                              <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Sesi</label>
                                <input type="text" class="form-control" id="recipient-name" name="sesi" value="{{$items->sesi}}">
                              </div>
                              <div class="mb-3">
                                <label for="message-text" class="col-form-label">Mulai</label>
                                <input type="datetime-local" class="form-control" id="message-text" name="mulai" value="{{$items->mulai}}">
                              </div>
                              <div class="mb-3">
                                  <label for="recipient-name" class="col-form-label">Selesai</label>
                                  <input type="datetime-local" class="form-control" id="recipient-name" name="selesai" value="{{$items->selesai}}">
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
                <div class="modal fade" id="hapusSesi{{$items->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Partisipan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Apakah anda yakin menghapus Sesi {{$items->sesi}} ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="/hapus/sesi/{{$items->id}}" method="POST">
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

        @foreach ($data as $item)
          <div class="card">
            <div class="card-body d-inline">
              <h4>{{$loop->iteration}}. {{$item->pertanyaan}}</h4>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios{{$item->id}}" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                  {{$item->opsi1}}
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios{{$item->id}}" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  {{$item->opsi2}}
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios{{$item->id}}" id="exampleRadios3" value="option3">
                <label class="form-check-label" for="exampleRadios3">
                  {{$item->opsi3}}
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios{{$item->id}}" id="exampleRadios3" value="option4">
                <label class="form-check-label" for="exampleRadios3">
                  {{$item->opsi4}}
                </label>
              </div>
              <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#ubahModal{{$item->id}}"><i class="mdi mdi-update"></i>Ubah</button>
              <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#hapusModal{{$item->id}}"><i class="mdi mdi-delete"></i>Hapus</button>
            </div>
          </div>


          <!-- Modal Ubah -->
          <div class="modal fade" id="ubahModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ubah Soal</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/ubah/survey/{{$item->id}}" method="POST">
                  @csrf
                  <label for="sesi" class="col-form-label">Sesi</label>
                  <select id="sesi" class="form-select" name="sesi">
                    <option selected value="{{$item->id_sesi}}">Sesi {{$item->id_sesi}}</option>
                    @foreach ($sesi as $data)
                    <option value="{{$data->id}}">Sesi {{$data->sesi}}</option>
                    @endforeach
                  </select>
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Pertanyaan</label>
                      <input type="text" class="form-control" id="recipient-name" name="pertanyaan" value="{{$item->pertanyaan}}">
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Opsi 1</label>
                      <input type="text" class="form-control" id="message-text" name="opsi1" value="{{$item->opsi1}}">
                    </div>
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Opsi 2</label>
                      <input type="text" class="form-control" id="recipient-name" name="opsi2" value="{{$item->opsi2}}">
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Opsi 3</label>
                      <input type="text" class="form-control" id="message-text" name="opsi3" value="{{$item->opsi3}}">
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Opsi 4</label>
                      <input type="text" class="form-control" id="message-text" name="opsi4" value="{{$item->opsi4}}">
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Jawaban</label>
                      <input type="text" class="form-control" id="message-text" name="jawaban" value="{{$item->jawaban}}">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal Hapus -->
          <div class="modal fade" id="hapusModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Soal</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Apakah anda yakin?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <form action="/hapus/survey/{{$item->id}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger text-white">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/tambah/survey" method="POST">
              @csrf
              <label for="sesi" class="col-form-label">Sesi</label>
              <select id="sesi" class="form-select">
                <option>Pilih Sesi</option>
                @foreach ($sesi as $item)
                <option value="{{$item->id}}">Sesi {{$item->sesi}}</option>
                @endforeach
              </select>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Pertanyaan</label>
                  <input type="text" class="form-control" id="recipient-name" name="pertanyaan">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Opsi 1</label>
                  <input type="text" class="form-control" id="message-text" name="opsi1">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Opsi 2</label>
                    <input type="text" class="form-control" id="recipient-name" name="opsi2">
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Opsi 3</label>
                    <input type="text" class="form-control" id="message-text" name="opsi3">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Opsi 4</label>
                  <input type="text" class="form-control" id="message-text" name="opsi4">
              </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Jawaban</label>
                    <input type="text" class="form-control" id="message-text" name="jawaban">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>      
          </div>
      </div>
    </div>
</div>

<!-- Modal Import -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/import/soal" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Pilih FIle Excel</label>
                <input class="form-control" type="file" id="file" name="file" required='required' multiple>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success text-white">Import</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Sesi -->
<div class="modal fade" id="sesiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Sesi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/sesi" method="POST">
        @csrf
        <div class="modal-body">
          <div class="col-12">
            <label for="sesi" class="form-label">Sesi</label>
            <input type="text" class="form-control" id="sesi" name="sesi">
          </div>
          <div class="col-12">
            <label for="sesi" class="form-label">Mulai</label>
            <input type="datetime-local" class="form-control" id="mulai" name="mulai">
          </div>
          <div class="col-12">
            <label for="sesi" class="form-label">Selesai</label>
            <input type="datetime-local" class="form-control" id="selesai" name="selesai">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success text-white">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- ubah semua sesi soal --}}
<div class="modal fade" id="ubahSemua" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="/edit/semua/sesi" method="POST">
            @csrf
            <label for="sesi" class="col-form-label">Sesi</label>
            <select id="sesi" class="form-select">
              <option>Pilih Sesi</option>
              @foreach ($sesi as $item)
              <option value="{{$item->id}}">Sesi {{$item->sesi}}</option>
              @endforeach
            </select>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>      
      </div>
    </div>
  </div>
</div>
@endsection