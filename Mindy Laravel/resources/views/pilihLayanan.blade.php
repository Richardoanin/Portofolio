<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <link rel="stylesheet" href="stylesheet.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Checkout</title>
</head>

<body>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="row" style="background-color: rgba(221, 255, 223, 1); height: 100vh; width: 100vh;">
                <img src="/gambar/bust-mask-5.svg" class="ml-5" height="700" width="500">
            </div>
            <div class="col-5">
                <h1 style="font-weight: bold;">Pesan Layanan</h1>
                <h5 class="mt-5">Pilih Package</h5>
                <form action="/bayar" method="POST">
                    @csrf
                    <div class="col-md-5">
                        <select class="form-select" aria-label="Default select example" name="pilihan">
                            <option>Pilih</option>
                            @foreach ($layanan as $item)
                            <option value="{{$item->paket}}">{{$item->paket}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h5 class="mt-4">Pilih Dokter</h5>
                    <div class="col-md-5">
                        <select id="pilih" name="dokter" class="form-select">
                        <option selected>Pilih</option>
                        @foreach ($user as $item)
                        <option value="{{$item->id}}">dr. {{$item->nama}}</option>
                        @endforeach
                        </select>
                    </div>
                    <a href="/" class="mt-5 me-3 btn btn-danger py-2 px-5 mb-5 rounded-pill">Back</a>
                    <button type="submit" class="mt-5 btn btn-success ml-3 py-2 px-5 mb-5 rounded-pill">Buy</button>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>