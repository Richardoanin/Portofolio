<!doctype html>
<html lang="en">

<?php

include('config.php');

session_start();

echo $_SESSION['id'];
if(isset($_POST['submit'])){
    $nama=$_POST['nama'];
    $email=$_POST['email'];
    $deskripsi=$_POST['deskripsi'];
    $service=$_POST['service'];
    $id=$_SESSION['id'];
    $progress=0;
    $status="Belum Bayar";

    if ($service=='Design'){
        $harga='100000';
    }
    elseif ($service=='UI/UX'){
        $harga='200000';
    }
    elseif ($service=='Video Editing'){
        $harga='250000';
    }
    elseif ($service=='Web Development'){
        $harga='200000';
    }

    $query = "INSERT INTO pesan VALUES ('', '$id', '$email', '$nama', '$deskripsi', '$service', '$harga', '$progress', '$status')";
            mysqli_query($conn, $query);

    $_SESSION['message'] = 'Berhasil Pesan';
    header("Location: Proses.php");
    exit();
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Send Email</title>
    <style>

    </style>
</head>

<body>
    <section style="background-color: white; height: 571px;">
        <div class="container">
            <h1
                style="text-align: center; margin-top: 50px; margin-bottom: 30px; font-family: poppins; font-weight: bold;">
                Pesan Jasa</h1>
            <form class="row g-3" action="" method="post">
                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Your Email">
                </div>
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Name</label>
                    <input type="name" class="form-control" id="inputPassword4" name="nama" placeholder="Your Name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi"
                        placeholder="Explain your project" rows="3"></textarea>
                </div>
                <div class="col-md-12">
                    <label for="inputState" class="form-label">Service</label>
                    <select id="inputState" class="form-select" name="service">
                        <option selected>Choose...</option>
                        <option value="Design">Design</option>
                        <option value="UI/UX">UI/UX</option>
                        <option value="Video Editing">Video Editing</option>
                        <option value="Web Development">Web Development</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary">
                        Submit
                    </button>
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