<?php
include('Config.php');

session_start();

$navbar = 'Navy';
if (isset($_COOKIE['bg-navbar'])){
    $navbar = $_COOKIE['bg-navbar'];
}

$user = $_SESSION['id'];
$konek = mysqli_connect("localhost","root","","wad_modul4");
$query = mysqli_query($konek, "SELECT * FROM booking WHERE user_id = '$user'");

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
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

    <title>Bookings</title>
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
        <table class="table table-striped" style="margin-top: 100px;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Tempat</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Tinggal Perjalanan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                <?php $total = 0; 
                while ($data = mysqli_fetch_assoc($query)):
                    $total = $total + (int)$data['harga']; 
                ?>
                <tr>
                    <th scope="row">1</th>
                    <td><?php echo $data ['nama_tempat'] ?></td>
                    <td><?php echo $data ['lokasi'] ?></td>
                    <td><?php echo $data ['tanggal'] ?></td>
                    <td><?php echo $data ['harga'] ?></td>
                    <td><a class="btn btn-danger" href="Delete.php?id=<?php echo $data['id']?>">Hapus</a></td>
                </tr>
                <?php endwhile; ?>
                <tr>
                    <th scope="row" colspan="4">Total</th>
                    <td><?php echo rupiah($total) ?></td>
                    <td> </td>
                </tr>
            </tbody>
        </table>
    </div>

    <footer class="footer border-top py-4 bg-navbar d-flex justify-content-center align-items-center"
        style="margin-top: 410px; background-color:<?php echo $navbar ?>">
        <p style="color: white;">2021 Copyright: <a href="#modal" data-bs-toggle="modal"
                data-bs-target="#modal">CRISTIAN RICHARDO ANIN 1202194121</a></p>
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