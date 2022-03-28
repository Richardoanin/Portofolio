<?php
    session_start();

    include('Config.php');

    if (isset($_POST['register'])){
        register($_POST);
    }
    ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Register</title>
</head>

<body>

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

    <div class="container" style="margin-top: 50px;">
        <div class="row justify-content-center">
            <div class="card col-5" style="margin-bottom: 50px;">
                    <div class=" container">
                <h4 class="card-title text-center mt-4 pb-2">Register</h4>
                <hr>
                <div class="card-body pt-0">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="inputEmail4" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4" class="form-label">Nomor Handphone</label>
                            <input type="number" class="form-control" name="nomor" id="nomor"
                                placeholder="Masukkan Nomor Handphone">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Masukkan Kata Sandi">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4" class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control" name="confirm" id="confirm"
                                placeholder="Konfirmasi Kata Sandi">
                        </div>
                        <div class="text-center pt-2">
                            <button type="submit" class="btn btn-primary" name="register">Register</button>
                            <p class="mt-3">You already have account? <a href="Login.php">Login</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>