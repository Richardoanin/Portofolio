<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>PG Candi Baru</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/logo-candi.png">
    <!-- Custom CSS -->
    <link href="/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link href="/dist/css/style.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <style>
        .card:hover{
            -webkit-box-shadow:0px 6px 10px 0px rgba(62,66,66,0.22);
            -moz-box-shadow: 0px 6px 10px 0px rgba(62,66,66,0.22);
            box-shadow: 0px 6px 10px 0px rgba(62,66,66,0.22);
            transition: 0.5s;
        }
    </style>

</head>

<body>
    {{-- @include('include.head') --}}
    @include('include.side')

    <main>
        @yield('content')
    </main>

    @include('include.foot')
    
        <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/dist/js/app-style-switcher.js"></script>
        <!--Wave Effects -->
        <script src="/dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="/dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="/dist/js/custom.js"></script>
        <!--This page JavaScript -->
        <!--chartis chart-->
        <script src="/assets/libs/chartist/dist/chartist.min.js"></script>
        <script src="/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
        <script src="/dist/js/pages/dashboards/dashboard1.js"></script>
        @include('sweetalert::alert')
</body>