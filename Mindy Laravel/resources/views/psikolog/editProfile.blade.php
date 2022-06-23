<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit Profile</title>
</head>

<body>

    <div class="container">
        <h1 class="mt-4 mb-4">Edit Profile</h1>
        <form class="row g-3" action="/update/psikolog/{id}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <input type="hidden" class="form-control" id="inputEmail4" name="id" value="{{$data->id}}">
            </div>
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Nama</label>
                <input type="text" class="form-control" id="inputEmail4" name="nama" value="{{$data->nama}}">
            </div>
            <div class="col-12">
                <label for="inputPassword4" class="form-label">Email</label>
                <input type="text" class="form-control" id="inputPassword4" name="email" value="{{$data->email}}">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="inputAddress" name="nomor" value="{{$data->nomor}}">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="inputAddress2" name="lahir" value="{{$data->lahir}}">
            </div>
            <div class="col-12">
                <label for="inputState" class="form-label">Kelamin</label>
                <select id="inputState" class="form-select" name="kelamin">
                    <option selected>{{$data->kelamin}}</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Input Foto</label>
                <input class="form-control" type="file" id="formFile" name="gambar">
            </div>
            <div class="col-12">
                <a href="/profil/{{ Session::get('user')->id }}" type="button" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>