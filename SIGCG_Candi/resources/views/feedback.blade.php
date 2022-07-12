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
            <form class="app-search position-absolute" action="/feedback/cari" method="GET">
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
                      <li class="breadcrumb-item active" aria-current="page">Feedback</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Feedback</h1> 
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <button id="btnExport" class="btn btn-success text-white mb-3" onclick="exportReportToExcel()"><i class="mdi mdi-file-excel"></i>Export Excel</button>
                <div class="card">
                    <div class="table-responsive">
                        <div id="printable">
                            <table id="data_table" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Feedback</th>
                                        <th scope="col">Saran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->feedback}}</td>
                                        <td>{{$item->saran}}</td>
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

<script type="text/javascript" src="/js/tableToExcel.js"></script>
<script type="text/javascript">
		
	function exportReportToExcel() {
	  let table = document.getElementById("data_table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
	  TableToExcel.convert(table, { // html code may contain multiple tables so here we are refering to 1st table tag
		name: 'Feedback.xlsx', // fileName you could use any name
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

@endsection