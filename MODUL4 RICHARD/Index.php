    <?php

    session_start();

    include('Config.php');

    if(isset($_POST['submit'])){
        booking($_POST);
    }

    $navbar = 'Navy';
    if (isset($_COOKIE['bg-navbar'])){
        $navbar = $_COOKIE['bg-navbar'];
    }

    $conn = mysqli_connect("localhost","root","","wad_modul4");
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

        <title>Home</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:<?php echo $navbar ?>">
            <div class="container">
                <a class="navbar-brand" href="Richard_Home.php">
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

        <div class="container">
            <div class="bg-info bg-gradient d-flex justify-content-center align-items-center"
                style="background-color: green; border-radius: 5px; margin-top: 50px; height: 200px">
                <h2 style="font-weight: bold;">EAD Travel</h2>
            </div>
            <div class="card-group mt-1">
                <div class="card">
                    <img src="img/Raja-Ampat.jpg" class="card-img-top" alt="raja" height="200">
                    <div class="card-body">
                        <h5 class="card-title">Raja Ampat, Papua</h5>
                        <p class="card-text">Kepulauan Raja Ampat berada di bagian paling barat Papua dan membentang di area
                            seluas kurang lebih 4,6 juta hektar. Kabupaten Raja Ampat terdiri dari 4 pulau besar yaitu Pulau
                            Waigeo, Batanta, Salawati dan Misool, dan 1.847 pulau-pulau kecil lainnya. Nah, nama Raja Ampat
                            sendiri diyakini berasal dari legenda masyarakat setempat yang percaya bahwa zaman dahulu kala
                            ada seorang wanita yang menemukan tujuh telur, empat telur tersebut menetas menjadi raja-raja
                            yang berkuasa di empat pulau utama. Tersisa tiga lainnya, satu menjadi batu, satu menjadi
                            wanita, dan satu lagi menjadi makhluk gaib atau hantu.Terlepas legenda yang dipercayai
                            masyarakat setempat, keindahan yang disuguhkan oleh Raja Ampat merupakan fakta yang tak bisa
                            diganggu gugat.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="font-weight: bold;">Rp 7.000.000</li>
                        <li class="list-group-item text-center"><a class="btn btn-primary col-12" href="#modal1"
                                data-bs-toggle="modal" name="pesan">Pesan Tiket</a></li>
                    </ul>
                </div>
                <div class="card">
                    <img src="img/bromo.jpg" class="card-img-top" alt="bromo" height="200">
                    <div class="card-body">
                        <h5 class="card-title">Gunung Bromo, Malang</h5>
                        <p class="card-text">Gunung Bromo adalah salah satu gunung api yang masih aktif di Indonesia. Gunung
                            yang memiliki ketinggian 2.392 meter di atas permukaan laut ini merupakan destinasi andalan Jawa
                            Timur. Gunung Bromo berdiri gagah dikelilingi kaldera atau lautan pasir seluas 10 kilometer
                            persegi.
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="font-weight: bold;">Rp 2.000.000</li>
                        <li class="list-group-item text-center"><a class="btn btn-primary col-12" href="#modal2"
                                data-bs-toggle="modal" name="pesan">Pesan Tiket</a></li>
                    </ul>
                </div>
                <div class="card">
                    <img src="img/tanah-lot.jpg" class="card-img-top" alt="tanah" height="200">
                    <div class="card-body">
                        <h5 class="card-title">Tanah Lot, Bali</h5>
                        <p class="card-text">Tanah Lot salah satu pura penting bagi umat Hindu Bali dan lokasi pura
                            terletak
                            di atas batu besar yang berada di lepas pantai. Pura Tanah Lot merupakan ikon pariwisata
                            pulau
                            Bali. Selain itu salah satu obyek wisata terkenal di pulau Bali yang wajib di kunjungi.
                            Karena
                            saking terkenalnya tempat wisata di Bali ini, maka hampir setiap hari, objek wisata ini
                            selalu
                            ramai dengan kunjungan wisatawan.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="font-weight: bold;">Rp 5.000.000</li>
                        <li class="list-group-item text-center"><a class="btn btn-primary col-12" href="#modal3"
                                data-bs-toggle="modal" name="pesan">Pesan Tiket</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="tanggal" class="col-form-label">Tanggal Perjalanan</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal">
                                <input type="hidden" name="tempat" value="Raja Ampat">
                                <input type="hidden" name="lokasi" value="Papua">
                                <input type="hidden" name="harga" value="7000000">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="tanggal" class="col-form-label">Tanggal Perjalanan</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal">
                                <input type="hidden" name="tempat" value="Gunung Bromo">
                                <input type="hidden" name="lokasi" value="Malang">
                                <input type="hidden" name="harga" value="2000000">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="tanggal" class="col-form-label">Tanggal Perjalanan</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal">
                                <input type="hidden" name="tempat" value="Tanah Lot">
                                <input type="hidden" name="lokasi" value="Bali">
                                <input type="hidden" name="harga" value="5000000">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>

        <footer class="footer mt-4 border-top py-4 bg-navbar d-flex justify-content-center align-items-center" style="background-color:<?php echo $navbar ?>">
            <p style="color: white;">2021 Copyright: <a href="#modal" data-bs-toggle="modal">CRISTIAN RICHARDO ANIN 1202194121</a></p>
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