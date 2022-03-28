<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>E-Cafe</title>
        <!-- Favicon-->
        <link rel="stylesheet" href="{{asset('css/toastr.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('css/swa2.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('css/confirm.css')}}" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    </head>
<body>
    <div id="app">
        @include('layouts.navbar')

        <main class="py-4">
            @yield('content')
        </main>

        
    </div>
    @include('layouts.footer')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{asset('js/confirm.js')}}"></script>
    <script src="{{asset('js/swa2.js')}}"></script>
    <script src="{{asset('js/plugin.js')}}"></script>
    <script src="{{asset('js/method.js')}}"></script>
    <script src="{{asset('js/auth.js')}}"></script>
    <script src="{{asset('js/plugins.min.js')}}"></script>
    <script src="{{asset('js/functions.js')}}"></script>
    @yield('custom_js')
</body>
</html>
