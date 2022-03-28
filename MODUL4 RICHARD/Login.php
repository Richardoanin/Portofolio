<?php
session_start();

$navbar = 'Navy';
if (isset($_COOKIE['bg-navbar'])){
    $navbar = $_COOKIE['bg-navbar'];
}

include('Config.php');
if (isset($_POST['login'])){
    login($_POST);
}
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
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
                    style="box-shadow: 0px 15px 39px 0px rgba(62,66,66,0.1); margin-left: 1050px;">
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Register.php">Register</a>
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

    <?php if (isset($_SESSION['registered'])):?>
    <div class="alert alert-warning alert-dismissable fade show fade in" role="alert">
        <?php echo $_SESSION['registered'] ?>
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="close">
        </button>
    </div>

    <?php
    unset($_SESSION['registered']);
    endif;
    ?>


    <div class="container" style="margin-top: 150px;">
        <div class="row justify-content-center">
            <div class="card col-5" style="margin-bottom: 50px;">
                <div class="container">
                    <h4 class="card-title text-center mt-4 pb-2">Login</h4>
                    <hr>
                    <div class="card-body pt-0">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="Masukkan Email"
                                    value="<?php if (isset($_COOKIE['email']))echo $_COOKIE['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4" class="form-label">Kata Sandi</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Masukkan Kata Sandi"
                                    value="<?php if (isset($_COOKIE['password']))echo $_COOKIE['password'] ?>">
                            </div><br>
                            <div class="col-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="remember" id="inlineCheckbox1"
                                        value="remember">
                                    <label class="form-check-label" for="inlineCheckbox1">Remember Me</label>
                                </div>
                            </div>
                            <div class="text-center pt-2">
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                                <p class="mt-3">Anda belum punya akun? <a href="register.php">Register</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-4 border-top py-4 bg-navbar d-flex justify-content-center align-items-center" style="background-color:<?php echo $navbar ?>">
        <p style="color: white;">2021 Copyright: <a href="#modal">CRISTIAN RICHARDO ANIN 1202194121</a></p>
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