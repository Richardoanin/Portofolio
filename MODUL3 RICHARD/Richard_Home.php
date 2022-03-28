    <?php
    $conn = mysqli_connect("localhost","root","","modul3");
    $hasil = mysqli_query($conn,"SELECT * FROM Buku_Table");
    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Home</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="Richard_Home.php"><img src="img/logo-ead.png" width="100" height="40"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="#collapsNavbar">
                    <ul class="navbar-nav" style="box-shadow: 0px 15px 39px 0px rgba(62,66,66,0.1);">
                        <li class="nav-item" style="margin-left: 1050px;">
                            <a class="btn btn-primary" href="Richard_Tambah.php" role="button">Tambah Buku</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <?php if (mysqli_num_rows($hasil)<1){ ?>
            <section id="kosong">
                <div class="container">
                    <h1 style="margin-top: 200px; text-align: center;">Belum Ada Buku</h1>
                    <hr style="border: 5px solid rgb(44,44,44); border-radius: 3px;">
                    <h5 style="text-align: center;">Silahkan menambahkan buku</h5>
                </div>
            </section>
            <?php }else{?>

            <div class="row" style="margin-top: 100px;">
                <?php while ($data = mysqli_fetch_array($hasil)) {
                ?>
                <div class="col-3">
                    <div class="card h-100">
                        <img src="img/<?php echo $data['gambar']?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data['judul_buku']?></h5>
                            <p class="card-text"><?php echo $data['deskripsi']?></p>
                            <a href="Richard_Detail.php?id_buku=<?php echo $data['id_buku']?>" class="btn btn-primary">Tampilkan Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>


        <section class="d-flex flex-column align-items-center" id="bawah" style="background-color: rgb(189, 189, 189); margin-top: 207px; height: 200px;">
            <img src="img/logo-ead.png" width="100" height="40" style="margin-top: 50px;">
            <h1 style="text-align: center; font-weight: bold;">Perpustakaan EAD</h1>
            <footer style="text-align: center;">Richard_1202194121</footer>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

    </body>

    </html>