<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
        </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="/register/register.css">

    <title>Register</title>
</head>

<body>

    <div class="d-flex flex-wrap flex-md-nowrap align-items-center">
        <div class="row" style="background-color: rgba(221, 255, 223, 1); height: 150vh;">
            <img src="/register/orang1.png" height="800" width="600">
        </div>

        <div class="row col-5" style="margin-left: 100px;">
            <h2 class="mb-2">Register To Mindy</h2>
            <form class="row g-3" action="/daftar" method="post">
                @csrf
                <div class="col-md-6 mb-2">
                    <label for="inputEmail4" class="form-label">First Name</label>
                    <input type="text" class="form-control border border-4 border border-dark" id="inputEmail4"
                        placeholder="First Name" name="namaDepan" autofocus required style="height: 60px; border-radius: 40px;">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="inputPassword4" class="form-label">Last Name</label>
                    <input type="text" class="form-control border border-4 border border-dark" id="inputPassword4"
                        placeholder="Last Name" name="namaBelakang" required style="height: 60px; border-radius: 40px;">
                </div>
                <div class="mb-2">
                    <label for="formGroupExampleInput" class="form-label">Email</label>
                    <input type="text" class="form-control border border-4 border border-dark"
                        id="formGroupExampleInput" placeholder="Email" name="email" required style="height: 60px; border-radius: 40px;">
                </div>
                <div class="mb-2">
                    <label for="formGroupExampleInput" class="form-label">Nomor HP</label>
                    <input type="number" class="form-control border border-4 border border-dark"
                        id="formGroupExampleInput" placeholder="Nomor HP" name="nomor" required style="height: 60px; border-radius: 40px;" value="62">
                </div>
                <div class="mb-2">
                    <label for="formGroupExampleInput" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control border border-4 border border-dark"
                        id="formGroupExampleInput" placeholder="Tanggal Lahir" name="lahir" required
                        style="height: 60px; border-radius: 40px;">
                </div>
                <div class="mb-2">
                    <label for="inputState" class="form-label">Jenis Kelamin</label>
                    <select id="inputState" class="form-select border border-4 border border-dark" name="kelamin" required
                        style="height: 60px; border-radius: 40px;">
                        <option selected>Pilih</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="inputState" class="form-label">User</label>
                    <select id="inputState" class="form-select border border-4 border border-dark" name="user" required
                        style="height: 60px; border-radius: 40px;">
                        <option selected>Pilih</option>
                        <option value="user">User</option>
                        <option value="psikolog">Psikolog</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="formGroupExampleInput2" class="form-label">Password</label>
                    <input type="password" class="form-control border border-4 border border-dark"
                        id="formGroupExampleInput2" placeholder="Password" name="password" required style="height: 60px; border-radius: 40px;">
                </div>
                <div class="d-flex">
                    <p class="mt-6">Already have an Account?<a href="/masuk"> Login</a></p>
                    <input class="btn btn-primary" type="submit" value="Register"
                        style="height: 50px; width: 150px; margin-left: 212px; background-color: rgba(7, 153, 17, 1); border-radius: 30px;">
                </div>
            </form>
            <div class="d-flex align-items-center">
                <a href="/"><img src="/register/back.svg" width="40" height="40" style="margin-left: 250px;"></a>
                <a href="/"><p style="margin-top: 17px; font-size: 30px; margin-left: 10px; color: black">Back</p></a>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>