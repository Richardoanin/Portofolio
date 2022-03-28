<!doctype html>
<html lang="en">

<?php
session_start();
include('config.php');

$id = $_GET['id'];
$query=mysqli_query($conn, "SELECT * FROM pesan WHERE Id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])){
    $progress = $_POST['progress'];
    $status = $_POST['status'];
    $pesan = "UPDATE pesan SET Status='$status', Progress='$progress' WHERE Id='$id'";
        mysqli_query($conn,$pesan);
        header('location:Detail.php?id='.$id);
}
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>

    <style>
    h2 {
        font-family: nexa;
        font-size: 20px;
        margin-top: 15px;
    }

    h1 {
        font-family: poppins;
        font-size: 35px;
        color: white;
        font-weight: bold;
        margin-bottom: 5px;
    }

    p {
        font-family: poppins;
    }

    .navbar .collapse .navbar-nav .nav-item .nav-link:hover {
        color: rgba(13, 110, 253, 1);
    }

    .navbar:hover {
        box-shadow: 0px -2px 10px white;
        transition: 0.5s;
    }

    .navbar .container .navbar-brand {
        display: flex;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 50px;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    th {
        background-color: rgba(13, 110, 253, 1);
        color: white;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="Home.php"><img src="r.png" width="70" height="50">
                <h2>Richard</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container">
        <section style="background-color: white; height: 571px;">
            <div class="container">
                <div class="card p-4" style="margin-top: 100px;">
                    <h4 style="font-weight: bold; text-align: center;">Detail Pesanan</h4>
                    <div class="isi" style="margin-left: 85px;">
                        <p style="font-weight: bold;">Email :</p>
                        <p><?php echo $data['Email']?></p>
                        <p style="font-weight: bold;">Name :</p>
                        <p><?php echo $data['Nama']?></p>
                        <p style="font-weight: bold;">Description :</p>
                        <p><?php echo $data['Deskripsi']?></p>
                        <p style="font-weight: bold;">Service :</p>
                        <p><?php echo $data['Service']?></p>
                        <p style="font-weight: bold;">Cost :</p>
                        <p><?php echo $data['Harga']?></p>
                        <p style="font-weight: bold;">Progress :</p>
                        <p><?php echo $data['Progress']?></p>
                        <p style="font-weight: bold;">Status :</p>
                        <p><?php echo $data['Status']?></p>
                    </div>
                    <div class="d-flex justify-content-center p-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sunting"
                            style="width: 500px;">Update</button>
                        <a href="Haladmin.php" class="btn btn-secondary" style="width: 500px; margin-left: 30px;">Back</a>
                    </div>
                </div>
        </section>
    </div>

    <div class="modal fade" id="sunting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label"
                                style="font-weight: bold; margin-right: 20px;">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status"
                                    <?php if ($data['Status'] == "Belum Bayar") echo "checked" ?> id="inlineRadio1"
                                    value="Belum Bayar">
                                <label class="form-check-label" for="inlineRadio1">Belum Bayar</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status"
                                    <?php if ($data['Status'] == "Sudah Bayar") echo "checked" ?> id="inlineRadio1"
                                    value="Sudah Bayar">
                                <label class="form-check-label" for="inlineRadio1">Sudah Bayar</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label"
                                style="font-weight: bold;">Progress</label>
                            <input type="text" class="form-control" name="progress" id="judul"
                                value="<?php echo $data ['Progress'] ?>">
                        </div>
                        <div class="modal-footer">
                            <a href="Delete.php?id=<?php echo $data['Id']?>" class="btn btn-danger">Delete</a>
                            <button type="submit" name="submit" class="btn btn-primary">Save
                                Change</button>
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