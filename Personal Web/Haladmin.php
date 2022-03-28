<!doctype html>
<html lang="en">

<?php
session_start();
include('config.php');

$query=mysqli_query($conn, "SELECT * FROM pesan");
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

    <h1 style="text-align: center; margin-top: 50px; color: black;">My Project</h1>

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
        <section style="background-color: white;">
            <div class="container">
                <h1
                    style="text-align: center; margin-top: 10px; margin-bottom: 30px; font-family: poppins; font-weight: bold;">
                    Project Progress</h1>
                <table>
                    <tr>
                        <th>Service</th>
                        <th>Description</th>
                        <th>Cost</th>
                        <th>Status</th>
                        <th>Progress</th>
                        <th>Action</th>
                    </tr>
                    <?php while($data=mysqli_fetch_assoc($query)):?>
                    <tr>
                        <td><?php echo $data['Service'] ?></td>
                        <td><?php echo $data['Deskripsi'] ?></td>
                        <td><?php echo $data['Harga'] ?></td>
                        <td><?php echo $data['Status'] ?></td>
                        <td><?php echo $data['Progress'] ?></td>
                        <td><a href="Detail.php?id=<?php echo $data['Id'] ?>" class="btn btn-primary">
                                Detail
                            </a></td>
                    </tr>
                    <?php endwhile ?>
                </table>
            </div>
        </section>
        <div class="d-flex justify-content-center">
            <a href="Home.php" class="btn btn-dark" style="width: 500px; margin-left: 30px;">Logout</a>
        </div>
    </div>

    <div class="modal fade" id="sunting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sunting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label"
                                style="font-weight: bold; margin-right: 20px;">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                                    value="Belum Bayar">
                                <label class="form-check-label" for="inlineRadio1">Belum Bayar</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                                    value="Sudah Bayar">
                                <label class="form-check-label" for="inlineRadio1">Sudah Bayar</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label"
                                style="font-weight: bold;">Progress</label>
                            <input type="text" class="form-control" name="progress" id="judul">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
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