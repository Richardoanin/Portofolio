    <?php
    $conn = mysqli_connect("localhost","root","","wad_modul4");

    session_start();

    $navbar = 'Navy';
    if (isset($_COOKIE['bg-navbar'])){
        $navbar = $_COOKIE['bg-navbar'];
    }

    $email = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    $data = mysqli_fetch_assoc($query);

    if (isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $nomor = $_POST['nomor'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        $password = password_hash($password, PASSWORD_DEFAULT);
        $cekEmail = "UPDATE user SET nama='$nama', email='$email', no_hp='$nomor', password='$password' WHERE email='$email'";
        $hasil = mysqli_query($conn, $cekEmail);

        $bg_navbar = $_POST['navbar'];
        setcookie('bg-navbar', $bg_navbar, strtotime('+7 days'), '/');
        $_SESSION['message'] = 'Update Berhasil!';
        header("Location:Profile.php");
    }
    ?>

    <!doctype html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
            integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>Profile</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:<?php echo $navbar ?>">
            <div class="container">
                <a class="navbar-brand" href="Index.php">
                    <h6 style="font-weight: bold;">EAD Travel</h6>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="#collapsNavbar">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"
                        style="box-shadow: 0px 15px 39px 0px rgba(62,66,66,0.1); margin-left: 990px;">
                        <li class="nav-item">
                            <a class="nav-link" href="Bookings.php"><i class="fas fa-shopping-cart"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Cristian Richardo Anin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="Profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="Logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php if (isset($_SESSION['message'])):?>
        <div class="alert alert-warning alert-dismissable fade show fade in" role="alert">
            <?php echo $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="close">
            </button>
        </div>

        <?php
        unset($_SESSION['message']);
        endif;
        ?>

        <section id="profile">
            <div class="container d-flex justify-content-center">
                <div class="card col-10 p-4"
                    style="box-shadow: 0px 15px 40px 0px rgba(62,66,66,0.1); border-radius: 5px; margin-top: 100px;">
                    <form action="" method="post" style="margin-top: 30px; height: 450px;">
                        <h3 class="text-center">Profile</h3>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" name="email" value="<?php echo $data['email'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data['nama'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Nomor Handphone</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="nomor" id="nomor" value="<?php echo $data['no_hp'] ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Kata Sandi</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Kata Sandi">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Konfirmasi Kata Sandi</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="confirm" id="confirm"
                                    placeholder="Konfirmasi Kata Sandi">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Warna Navbar</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="navbar" aria-label="Default select example">
                                    <option value="<?php echo $navbar ?>" selected><?php echo $navbar ?></option>
                                    <option value="black">Dark Boba</option>
                                    <option value="navy">Navy</option>
                                </select>
                            </div>
                        </div>
                        <div class="container d-flex justify-content-center">
                            <button type="submit" name="submit" class="btn btn-primary" style="margin-right: 10px;">Simpan</button>
                            <a class="btn btn-danger" href="index.php">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <footer class="footer border-top py-4 bg-navbar d-flex justify-content-center align-items-center"
            style="margin-top: 410px; background-color:<?php echo $navbar ?>">
            <p style="color: white;">2021 Copyright: <a href="#modal" data-bs-toggle="modal"
                    data-bs-target="#modal">CRISTIAN RICHARDO ANIN 1202194121</a></p>
        </footer>

        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Created By</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Nama : CRISTIAN RICHARDO ANIN</p>
                        <p>NIM : 1202194121</p>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

    </body>

    </html>