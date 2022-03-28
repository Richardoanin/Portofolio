<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="/home">E-Cafe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="/home">Home</a></li>
                
                @if (!Auth::user())
                    <li class="nav-item"><a class="nav-link" href="{{route('menu.index')}}">Menu</a></li>
                @elseif(Auth::user()->role == 'pelayan')

                @elseif(Auth::user()->role == 'owner')
                    <li class="nav-item"><a class="nav-link" href="{{route('web.index')}}">Edit Tagline</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('operational.index')}}">Edit Jam Kerja</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('contact.index')}}">Edit Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('menu.index')}}">Menu</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{route('menu.index')}}">Menu</a></li>
                @endif
                
                @if (Auth::user())
                    <li class="nav-item"><a class="nav-link" href="{{route('status.index')}}">Status</a></li>
                @else

                @endif
                @if(!Auth::guard('web')->user())
                <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{route('dologout')}}">Logout</a><</li>
                @endif

            </ul>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>