<!DOCTYPE html>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Choose Payment</title>
</head>

<body>
    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-5">
                <div class="position-absolute bg-success w-100 h-75 rounded-circle" style="opacity: 0.25;"></div>
                <img src="gambar\bust-mask-5.svg" class="position-relative" alt="">
            </div>
            <div class="col-5">
                <h1>Payment</h1>
                <div class="form-check mt-5">
                    <p class="mt-3">Pilih Package:</p>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1 mt-3">
                        Package 1
                    </label>
                </div>
                <div class="form-check mt-3">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Package 2
                    </label>
                </div>
                <div class="form-check mt-3">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Package 3
                    </label>
                </div>
                <a href="/payment/{{ Session::get('user')->id }}" class="bg-danger fontcolor-light mt-5 btn btn-success py-2 px-5 mb-5 rounded-pill">Cancel</a>
                <a href="/bayar" class="bg-dark fontcolor-light mt-5 btn btn-success ml-3  py-2 px-5 mb-5 rounded-pill">Next</a>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>