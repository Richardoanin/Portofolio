<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title> Mindy Dashboard Admin </title>
  @include('includes.admin.style')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('includes.admin.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
    
            <div id="content">
                @include('includes.admin.navbar')
                @yield('content')
            </div>
        </div>
    </div>
    @include('includes.admin.script')
    @include('sweetalert::alert')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>