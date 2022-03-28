<!doctype html>
<html lang="en">

<?php
include('config.php');
session_start();

if (isset($_POST['login'])){
    login($_POST);
}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
    <style>
    input[type=submit] {
        background-color: rgba(13, 110, 253, 1);
        width: 200px;
        color: rgb(255, 255, 255);
        font-size: 15px;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        margin-left: 550px;
    }

    input[type=submit]:hover {
        background-color: rgb(0, 86, 214);
        transition: 0.2s;
    }
    </style>
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

    <section id="login" style="background-color: white; height: 571px;">
        <div class="container">
            <div class="title">
                <h1 style="margin-top: 50px; margin-bottom: 50px; text-align: center;">Login Client</h1>
            </div>
            <form action="" method="post">
                <div class="row mb-3">
                    <label for="inputNama" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNama" name='email' placeholder="Email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNomer" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputNomer" name='password'
                            placeholder="Password">
                    </div>
                </div>
                <div class="text-center pt-2">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                    <p style="font-weight: bold; text-align: center;">You don't have account? <a
                            href="Register.php">Register</a></p>
                </div>
            </form>
        </div>
    </section>
    <footer
        style="background-color: rgba(13, 110, 253, 1); height: 100px; padding: 50px 0px; text-align: center; color: white">
        Created by Cristian Richardo Anin</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>