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
                <h1 style="font-weight: bold;">Pembayaran</h1>
                <h5 class="mt-5">Package yang dipilih</h5>
                <form action="/upload/bukti/{{$pembelian->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-5">
                        <h3>{{$pembelian->pilihan}}</h3>
                    </div>
                    <h5 class="mt-4">Dokter yang dipilih</h5>
                    <div class="col-md-5">
                        <h3>dr. {{$dokter->nama}}</h3>
                    </div>
                    <h5 class="mt-4">Deskripsi Paket</h5>
                    <div class="col-md-5">
                        <h3>{{$layanan->service}}</h3>
                    </div>
                    <h5 class="mt-4">Total Pembayaran</h5>
                    <div class="col-md-5">
                        <h3>Rp. {{$layanan->harga}}</h3>
                    </div>
                    <div class="col-8 mb-3">
                        <label for="formFile" class="form-label">Upload Bukti Pembayaran</label>
                        <input class="form-control" type="file" id="formFile" name="transfer">
                    </div>
                    <a href="/" class="mt-5 me-3 btn btn-danger py-2 px-5 mb-5 rounded-pill">Back</a>
                    <button type="submit" class="mt-5 btn btn-success ml-3 py-2 px-5 mb-5 rounded-pill">Pay</button>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>