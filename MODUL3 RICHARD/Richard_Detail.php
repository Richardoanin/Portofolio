    <?php
    $conn = mysqli_connect("localhost","root","","modul3");
    $id_buku = $_GET ['id_buku'];
    $hasil = mysqli_query($conn,"SELECT * FROM Buku_Table where id_buku = '$id_buku'");
    $data = mysqli_fetch_assoc($hasil);
    $tag= explode(", ",$data["tag"]);

    if( isset($_POST["submit"]) ){
        $judulbuku = $_POST["judul_buku"];
        $penulis = $_POST["penulis"];
        $tahun = $_POST["tahun_terbit"];
        $deskripsi = $_POST["deskripsi"];
        $gambar = $_FILES["gambar"]['name'];
        $tag = implode(",",$_POST["tag"]);
        $bahasa = $_POST["bahasa"];

        move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/'.$gambar);
        $buku = "UPDATE Buku_Table SET judul_buku='$judulbuku', penulis_buku='$penulis',tahun_terbit='$tahun',deskripsi='$deskripsi',bahasa='$bahasa',tag='$tag', gambar='$gambar' WHERE id_buku='$id_buku'";
        mysqli_query($conn,$buku);
        header('location:Richard_Detail.php?id_buku='.$id_buku);
    }
    ?>

    <!doctype html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Detail Buku</title>
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
            <section id="detail"
                style="background-color: white; box-shadow: 0px 15px 40px 0px rgba(62,66,66,0.1); height: 1050px; border-radius: 20px;">
                <div class="container">
                    <div class="detail" style="margin-top: 100px;">
                        <h4 style="font-weight: bold; text-align: center;">Detail Buku</h4>
                        <img src="img/<?= $data['gambar']?>" width="250" height="400"
                            style="margin-left: 507px; margin-bottom: 50px; margin-top: 20px;">
                        <div class="isi" style="margin-left: 85px;">
                            <p style="font-weight: bold;">Judul :</p>
                            <p><?php echo $data['judul_buku']?></p>
                            <p style="font-weight: bold;">Penulis :</p>
                            <p><?php echo $data['penulis_buku']?></p>
                            <p style="font-weight: bold;">Tahun Terbit :</p>
                            <p><?php echo $data['tahun_terbit']?></p>
                            <p style="font-weight: bold;">Deskripsi :</p>
                            <p><?php echo $data['deskripsi']?></p>
                            <p style="font-weight: bold;">Bahasa :</p>
                            <p><?php echo $data['bahasa']?></p>
                            <p style="font-weight: bold;">Tag :</p>
                            <p><?php echo $data['tag']?></p>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sunting"
                            style="width: 500px; margin-left: 80px;">Sunting</button>
                        <a class="btn btn-danger" href="Richard_Delete.php?id_buku=<?php echo $data['id_buku']?>" role="button"
                            style="width: 500px; margin-left: 40px">Hapus</a>

                        <div class="modal fade" id="sunting" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Sunting</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label"
                                                    style="font-weight: bold;">Judul Buku</label>
                                                <input type="text" class="form-control" name="judul_buku" id="judul"
                                                    value="<?= $data['judul_buku']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label"
                                                    style="font-weight: bold;">Penulis</label>
                                                <input name="penulis" class="form-control" type="text"
                                                    value="Richard_1202194121" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label"
                                                    style="font-weight: bold;">Tahun Terbit</label>
                                                <input type="number" class="form-control" name="tahun_terbit" id="tahun" value="<?= $data['tahun_terbit']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label"
                                                    style="font-weight: bold;">Deskripsi</label>
                                                <textarea class="form-control" name="deskripsi"
                                                    id="message-text"><?= $data['deskripsi']?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="deskripsi" class="form-label"
                                                    style="font-weight: bold; margin-right: 20px;">Bahasa</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="bahasa" <?php if ($data['bahasa'] == "Indonesia") echo "checked" ?>
                                                        id="inlineRadio1" value="Indonesia">
                                                    <label class="form-check-label" for="inlineRadio1">Indonesia</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="bahasa" <?php if ($data['bahasa'] == "Lainnya") echo "checked" ?>
                                                        id="inlineRadio2" value="Lainnya">
                                                    <label class="form-check-label" for="inlineRadio2">Lainnya</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tag" class="form-label"
                                                    style="font-weight: bold; margin-right: 20px;">Tag</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="tag[]" <?php if (in_array('Pemrograman', $tag)) echo "checked" ?>
                                                        id="inlineCheckbox1" value="Pemrograman">
                                                    <label class="form-check-label"
                                                        for="inlineCheckbox1">Pemrograman</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="tag[]" <?php if (in_array('Website', $tag)) echo "checked" ?>
                                                        id="inlineCheckbox2" value="Website">
                                                    <label class="form-check-label" for="inlineCheckbox2">Website</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="tag[]" <?php if (in_array('Java', $tag)) echo "checked" ?>
                                                        id="inlineCheckbox1" value="Java">
                                                    <label class="form-check-label" for="inlineCheckbox1">Java</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="tag[]" <?php if (in_array('OOP', $tag)) echo "checked" ?>
                                                        id="inlineCheckbox2" value="OOP">
                                                    <label class="form-check-label" for="inlineCheckbox2">OOP</label> 
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="tag[]" <?php if (in_array('MVC', $tag)) echo "checked" ?>
                                                        id="inlineCheckbox1" value="MVC">
                                                    <label class="form-check-label" for="inlineCheckbox1">MVC</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="tag[]" <?php if (in_array('Kalkulus', $tag)) echo "checked" ?>
                                                        id="inlineCheckbox2" value="Kalkulus">
                                                    <label class="form-check-label" for="inlineCheckbox2">Kalkulus</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="tag[]" <?php if (in_array('Lainnya', $tag)) echo "checked" ?>
                                                        id="inlineCheckbox2" value="Lainnya">
                                                    <label class="form-check-label" for="inlineCheckbox2">Lainnya</label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tag" class="form-label"
                                                        style="font-weight: bold;">Gambar</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="gambar"
                                                            id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                                                            aria-label="Browse...">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">Simpan
                                                        Perubahan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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