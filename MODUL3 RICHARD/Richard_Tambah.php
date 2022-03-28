    <?php
    $conn = mysqli_connect("localhost", "root", "", "modul3");
    if( isset($_POST["submit"]) ){
        $judulbuku = $_POST["judul_buku"];
        $penulis = $_POST["penulis"];
        $tahun = $_POST["tahun_terbit"];
        $deskripsi = $_POST["deskripsi"];
        $gambar = $_FILES["gambar"]['name'];
        $tag = implode(",",$_POST["tag"]);
        $bahasa = $_POST["bahasa"];

        move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/'.$gambar);
        $buku = "INSERT INTO buku_table VALUES
            ('','$judulbuku','$penulis','$tahun','$deskripsi','$gambar','$tag','$bahasa')";
        mysqli_query($conn,$buku);
        header('location:Richard_Home.php');
    }
    ?>

    <!doctype html>
    <html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Tambah Buku</title>
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
            <section id="form" style="box-shadow: 0px 15px 40px 0px rgba(62,66,66,0.1); border-radius: 20px;">
                <div class="container">
                    <form class="row g-3" action="" method="post" enctype="multipart/form-data" style="margin-top: 150px; height: 1000px;">
                        <h1 style="font-weight: bold; text-align: center;">Tambah Data Buku</h1>
                        <div class="col-12">
                            <label for="judul" class="form-label" style="font-weight: bold;">Judul Buku</label>
                            <input type="text" class="form-control" name="judul_buku" id="judul" placeholder="Contoh: Pemrograman Web Bersama EAD">
                        </div>
                        <div class="col-12">
                            <label for="penulis" class="form-label" style="font-weight: bold;">Penulis</label>
                            <input name="penulis" class="form-control" type="text" value="Richard_1202194121" readonly>
                        </div>
                        <div class="col-12">
                            <label for="tahun" class="form-label" style="font-weight: bold;">Tahun Terbit</label>
                            <input type="number" class="form-control" name="tahun_terbit" id="tahun" placeholder="Contoh: 1990">
                        </div>
                        <div class="col-12">
                            <label for="deskripsi" class="form-label" style="font-weight: bold;">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Contoh: Buku ini menjelaskan tentang..."></textarea>
                        </div>
                        <div class="col-12">
                            <label for="deskripsi" class="form-label" style="font-weight: bold; margin-right: 20px;">Bahasa</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="bahasa" id="inlineRadio1" value="Indonesia">
                                <label class="form-check-label" for="inlineRadio1">Indonesia</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="bahasa" id="inlineRadio2" value="Lainnya">
                                <label class="form-check-label" for="inlineRadio2">Lainnya</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="tag" class="form-label" style="font-weight: bold; margin-right: 20px;">Tag</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox1" value="Pemrograman">
                                <label class="form-check-label" for="inlineCheckbox1">Pemrograman</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="Website">
                                <label class="form-check-label" for="inlineCheckbox2">Website</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox1" value="Java">
                                <label class="form-check-label" for="inlineCheckbox1">Java</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="OOP">
                                <label class="form-check-label" for="inlineCheckbox2">OOP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox1" value="MVC">
                                <label class="form-check-label" for="inlineCheckbox1">MVC</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="Kalkulus">
                                <label class="form-check-label" for="inlineCheckbox2">Kalkulus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="inlineCheckbox2" value="Lainnya">
                                <label class="form-check-label" for="inlineCheckbox2">Lainnya</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="tag" class="form-label" style="font-weight: bold;">Gambar</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="gambar" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Browse...">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary" style="width: 750px; margin-left: 250px;">+ Tambah</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>

        <section class="d-flex flex-column align-items-center" id="bawah" style="background-color: rgb(189, 189, 189); margin-top: 207px; height: 200px;">
            <img src="img/logo-ead.png" width="100" height="40" style="margin-top: 50px;">
            <h1 style="text-align: center; font-weight: bold;">Perpustakaan EAD</h1>
            <footer style="text-align: center;">Richard_1202194121</footer>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
    </html>