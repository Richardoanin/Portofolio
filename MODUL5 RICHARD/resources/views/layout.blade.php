<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Home</title>
</head>

<body>

    <ul class="nav f-dark justify-content-center">
        <li class="nav-item">
            <a class="nav-link {{Request::is('/') ? 'active fw-bold' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('vaccine') ? 'active fw-bold' : '' }}" href="/vaccine">Vaccine</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('patient') ? 'active fw-bold' : '' }}" href="/patient">Patient</a>
        </li>
    </ul>

    <main>
        @yield('content')
    </main>

    <footer class="fixed-bottom" style="text-align: center;">
        <a href="#modal" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="text-decoration: none; color: grey;">Made by Cristian Richardo Anin - 1202194121</a>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesan dan Kesan Praktikum</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Kesan : Cukup mendebarkan hati, jiwa, raga, dan pikiran</p>
                    <p>Pesan : Terima kasih untuk bang akbar yang telah membimbing saya dalam praktikum WAD</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>