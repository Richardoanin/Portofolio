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
            <li class="breadcrumb-item"><a href="/dashboard" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Hasil Rekap</li>
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">Hasil Rekap</h1> 
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <button class="btn btn-success text-white mb-3" data-bs-toggle="modal" data-bs-target="#lihatModal"><i class="mdi mdi-open-in-new"></i>Lihat Nilai</button>
        @if (Auth::user()->role == 'Administrator')
        <button class="btn btn-warning text-white mb-3" style="width: 100px" data-bs-toggle="modal" data-bs-target="#editModal"><i class="mdi mdi-update"></i>Ubah</button>
        @else
        @endif
        <form action="/dashboard" method="get" class="col-md-4 d-flex mb-4">
          @csrf
          <select id="sesi" class="form-select border border-secondary me-2" name="lihat">
            @if (empty($lihat))
            <option selected disabled>Pilih Sesi</option>
            @else
            <option selected value="{{$lihat}}">Sesi {{$lihat_sesi->sesi}}</option>
            @endif
            @foreach ($sesi as $item)
            <option value="{{$item->sesi}}">Sesi {{$item->sesi}}</option>
            @endforeach
          </select>
          <button type="submit" class="btn btn-info text-white">Lihat</button>
        </form>
        <div class="card">
          <div class="card-body">
            <div width="200" height="200">
              <canvas id="pie-chart"></canvas>
            </div>
            <h5>Keterangan</h5>
            <h5>Nilai A >= 90</h5>
            <h5>Nilai AB >= 80</h5>
            <h5>Nilai B >= 75</h5>
            <h5>Nilai BC >= 70</h5>
            <h5>Nilai C <= 69</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Modal Lihat --}}
<div class="modal fade" id="lihatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" value="Nilai Survey">Nilai Survey Pegawai</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                @if (Auth::user()->role == 'Administrator')
                  <button id="btnExport" class="btn btn-primary text-white mb-3" onclick="exportReportToExcel()"><i class="mdi mdi-download"></i>Unduh Hasil</button>
                @else
                @endif
                  <div class="card">
                      <div class="card-body">
                          <div class="table-responsive">
                            <div id="printable">
                              <table id="data_table" class="table table-hover">
                                  <thead>
                                      <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">Nama</th>
                                          <th scope="col">Jabatan</th>
                                          <th scope="col">Nilai</th>
                                          <th scope="col">Kategori</th>
                                          <th scope="col">Waktu</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($nilai as $item)
                                      <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->jabatan}}</td>
                                        @if ($item->nilai === null)
                                        <td>Kosong</td>
                                        <td>Kosong</td>
                                        <td>Kosong</td>
                                        @else
                                        <td>{{$item->nilai}}</td>
                                        <td>{{$item->kategori}}</td>
                                        <td>{{$item->updated_at}}</td>
                                        @endif
                                      </tr>
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" value="Nilai Survey">Ubah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body">
                          <div class="table-responsive">
                            <div id="printable">
                              <table id="data_table" class="table table-hover">
                                  <thead>
                                      <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">Nama</th>
                                          <th scope="col">Jabatan</th>
                                          <th scope="col">Nilai</th>
                                          <th scope="col">Kategori</th>
                                          <th scope="col">Waktu</th>
                                          <th scope="col">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($nilai as $data)
                                      <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$data->nama}}</td>
                                        <td>{{$data->jabatan}}</td>
                                        <td>{{$data->nilai}}</td>
                                        <td>{{$data->kategori}}</td>
                                        <td>{{$data->created_at}}</td>
                                        @if ($data->nilai === null)
                                        <td></td>
                                        @else
                                        <td>
                                          <form action="/nilai/hapus/{{$data->id}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger text-white"><i class="mdi mdi-delete"></i>Reset</button>
                                          </form>
                                        </td>
                                        @endif
                                      </tr>
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="/js/tableToExcel.js"></script>
<script type="text/javascript">
		
	function exportReportToExcel() {
	  let table = document.getElementById("data_table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
	  TableToExcel.convert(table, { // html code may contain multiple tables so here we are refering to 1st table tag
		name: 'Nilai Survey.xlsx', // fileName you could use any name
		sheet: {
		  name: 'Sheet 1' // sheetName
		}
	  });
	}
	
	function printArea(area) {
        var printContents = document.getElementById(area).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

{{-- pie chart --}}
<script>
  $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx = $("#pie-chart");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Nilai Count",
            data: cData.data,
            backgroundColor: [
              "rgb(235, 83, 83)",
              "rgb(249, 217, 35)",
              "rgb(54, 174, 124)",
              "rgb(24, 116, 152)",
              "#A149FA",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "rgb(235, 83, 83)",
              "rgb(249, 217, 35)",
              "rgb(54, 174, 124)",
              "rgb(24, 116, 152)",
              "#A149FA",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Sebaran Nilai Survey Pegawai",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        },
        tooltips: {
          callbacks: {
            label: (tooltipItem, data) => {
              var value = data.datasets[0].data[tooltipItem.index];
              var total = data.datasets[0].data.reduce((a, b) => a + b, 0);
              var pct = 100 / total * value;
              var pctRounded = Math.round(pct * 10) / 10;
              return value + ' (' + pctRounded + '%)';
            }
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });
 
  });
</script>


<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
@endsection