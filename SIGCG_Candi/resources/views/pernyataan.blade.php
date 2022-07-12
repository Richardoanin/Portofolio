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
                              <li class="breadcrumb-item active" aria-current="page">Pernyataan</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Pernyataan Komitmen COC</h1> 
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
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
                                            <th scope="col">Lembar COC</th>
                                            <th scope="col">Unduh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (Auth::user()->role == 'User')
                                            @foreach ($user as $item)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$item->nama}}</td>
                                                <td>{{$item->nik}}</td>
                                                <td>{{$item->bagian}}</td>
                                                <td>{{$item->jabatan}}</td>
                                                <td>{{$item->status}}</td>
                                                <td class="d-flex">
                                                    <button class="btn btn-success text-white me-2" data-bs-toggle="modal" data-bs-target="#isiModal{{$item->id}}"  style="width: 80"><i class="mdi mdi-pencil-box-outline"></i>Isi</button>
                                                    <button class="btn btn-secondary text-white me-2" data-bs-toggle="modal" data-bs-target="#lihatModal{{$item->id}}" style="width: 80"><i class="mdi mdi-open-in-new"></i>Lihat</button>
                                                </td>
                                                @if ($item->ttd === null)
                                                <td>Belum Isi</td>
                                                @else
                                                <td><button class="btn btn-primary text-white me-2" type="button" data-toggle="tooltip" onclick="printArea('printable{{$item->id}}');" title="Print"><i class="mdi mdi-download"></i>Unduh</button></td>
                                                @endif
                                            </tr>

                                            {{-- Modal Lihat --}}
                                            <div class="modal fade" id="lihatModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-fullscreen">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Lihat Lembar COC</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body" id="printable{{$item->id}}">
                                                        <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12.0pt">PERNYATAAN KOMITMEN</span></strong></span></span></p>

                                                        <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12.0pt">KEPATUHAN PADA PEDOMAN ETIKA &amp; PERILAKU PERUSAHAAN</span></strong></span></span></p>

                                                        <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><em><span style="font-size:12.0pt">(CODE OF CONDUCT)</span></em></strong></span></span></p>

                                                        <p>&nbsp;</p>

                                                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Yang bertanda tangan dibawah ini, Saya</span></span></span></p>

                                                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Nama&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$item->nama}}</span></span></span></p>

                                                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">NIK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$item->nik}}</span></span></span></p>

                                                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Unit Kerja&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$item->bagian}}</span></span></span></p>

                                                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Jabatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$item->jabatan}}</span></span></span></p>

                                                        <p>&nbsp;</p>

                                                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Menyatakan bahwa :</span></span></span></p>

                                                        <ol>
                                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Telah menerima buku <em>Code of Conduct</em> PT PG Candi Baru, baik dalam bentuk <em>hardfile</em> atau <em>softfile</em>.</span></span></span></li>
                                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Telah memahami isi dari buku <em>Code of Conduct</em> PT PG Candi Baru.</span></span></span></li>
                                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Bersedia mematuhi apa yang telah menjadi komitmen Insan PT PG Candi Baru dalam buku <em>Code of Conduct</em> PT PG Candi Baru dan akan menerapkannya dalam pelaksanaan tugas sehari-hari.</span></span></span></li>
                                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Siap menerima konsekuensi bila melakukan pelanggaran atas komitmen perilaku yang telah ditetapkan dalam <em>Code of Conduct</em> PT PG Candi Baru.</span></span></span></li>
                                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Akan segera mengkonsultasikan dan/atau melaporkan pada Pihak-pihak Berwenang yang telah ditunjuk sesuai dengan ketentuan yang berlaku apabila menemui permasalahan dan/atau potensi/indikasi pelanggaran dalam pelaksanaan <em>Code of Conduct</em>.</span></span></span></li>
                                                        </ol>

                                                        <p style="text-align:justify">&nbsp;</p>

                                                        <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Sidoarjo, {{ date("d-m-Y", strtotime($item->tanggal)); }}</span></span></span></p>

                                                        <img class="mx-auto d-block" src="/gambar/{{$item->ttd}}" width="170" height="120"><br>

                                                        <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">({{$item->nama}})</span></span></span></p>

                                                    </div>
                                                </div>
                                                </div>
                                            </div>

                                            {{-- Modal Isi --}}
                                            <div class="modal fade" id="isiModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Isi Lembar COC</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="/tambah/pernyataan/{{$item->id}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="formFile" class="form-label">Tanggal</label>
                                                                    <input class="form-control" type="date" id="formFile" name="tanggal">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="formFile" class="form-label">Upload TTD</label>
                                                                    <input class="form-control" type="file" id="formFile" name="ttd">
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
                                            @endforeach
                                        @else
                                            @foreach ($admin as $item)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$item->nama}}</td>
                                                <td>{{$item->nik}}</td>
                                                <td>{{$item->bagian}}</td>
                                                <td>{{$item->jabatan}}</td>
                                                <td>{{$item->status}}</td>
                                                <td class="d-flex">
                                                    <button class="btn btn-success text-white me-2" data-bs-toggle="modal" data-bs-target="#isiModal{{$item->id}}"  style="width: 80"><i class="mdi mdi-pencil-box-outline"></i>Isi</button>
                                                    <button class="btn btn-secondary text-white me-2" data-bs-toggle="modal" data-bs-target="#lihatModal{{$item->id}}" style="width: 80"><i class="mdi mdi-open-in-new"></i>Lihat</button>
                                                </td>
                                                @if ($item->ttd === null)
                                                <td>Belum Isi</td>
                                                @else
                                                <td><button class="btn btn-primary text-white me-2" type="button" data-toggle="tooltip" onclick="printArea('printable{{$item->id}}');" title="Print"><i class="mdi mdi-download"></i>Unduh</button></td>
                                                @endif
                                            </tr>

                                            {{-- Modal Lihat --}}
                                            <div class="modal fade" id="lihatModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-fullscreen">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Lihat Lembar COC</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body" id="printable{{$item->id}}">
                                                        <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12.0pt">PERNYATAAN KOMITMEN</span></strong></span></span></p>

                                                        <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12.0pt">KEPATUHAN PADA PEDOMAN ETIKA &amp; PERILAKU PERUSAHAAN</span></strong></span></span></p>

                                                        <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><em><span style="font-size:12.0pt">(CODE OF CONDUCT)</span></em></strong></span></span></p>

                                                        <p>&nbsp;</p>

                                                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Yang bertanda tangan dibawah ini, Saya</span></span></span></p>

                                                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Nama&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$item->nama}}</span></span></span></p>

                                                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">NIK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$item->nik}}</span></span></span></p>

                                                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Unit Kerja&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$item->bagian}}</span></span></span></p>

                                                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Jabatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$item->jabatan}}</span></span></span></p>

                                                        <p>&nbsp;</p>

                                                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Menyatakan bahwa :</span></span></span></p>

                                                        <ol>
                                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Telah menerima buku <em>Code of Conduct</em> PT PG Candi Baru, baik dalam bentuk <em>hardfile</em> atau <em>softfile</em>.</span></span></span></li>
                                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Telah memahami isi dari buku <em>Code of Conduct</em> PT PG Candi Baru.</span></span></span></li>
                                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Bersedia mematuhi apa yang telah menjadi komitmen Insan PT PG Candi Baru dalam buku <em>Code of Conduct</em> PT PG Candi Baru dan akan menerapkannya dalam pelaksanaan tugas sehari-hari.</span></span></span></li>
                                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Siap menerima konsekuensi bila melakukan pelanggaran atas komitmen perilaku yang telah ditetapkan dalam <em>Code of Conduct</em> PT PG Candi Baru.</span></span></span></li>
                                                            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Akan segera mengkonsultasikan dan/atau melaporkan pada Pihak-pihak Berwenang yang telah ditunjuk sesuai dengan ketentuan yang berlaku apabila menemui permasalahan dan/atau potensi/indikasi pelanggaran dalam pelaksanaan <em>Code of Conduct</em>.</span></span></span></li>
                                                        </ol>

                                                        <p style="text-align:justify">&nbsp;</p>

                                                        <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Sidoarjo, {{ date("d-m-Y", strtotime($item->tanggal)); }}</span></span></span></p>

                                                        <img class="mx-auto d-block" src="/gambar/{{$item->ttd}}" width="170" height="120"><br>

                                                        <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">({{$item->nama}})</span></span></span></p>

                                                    </div>
                                                </div>
                                                </div>
                                            </div>

                                            {{-- Modal Isi --}}
                                            <div class="modal fade" id="isiModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Isi Lembar COC</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="/tambah/pernyataan/{{$item->id}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="formFile" class="form-label">Tanggal</label>
                                                                    <input class="form-control" type="date" id="formFile" name="tanggal">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="formFile" class="form-label">Upload TTD</label>
                                                                    <input class="form-control" type="file" id="formFile" name="ttd">
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
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
<script>
    function printArea(area) {
        var printContents = document.getElementById(area).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection