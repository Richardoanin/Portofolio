<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include('config.php');

$id=$_SESSION['id'];
$query=mysqli_query($conn, "SELECT * FROM pesan WHERE User_id='$id'");
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Project Progress</title>
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

    input[type=submit] {
        background-color: rgba(32, 32, 36, 1);
        width: 200px;
        color: rgb(255, 255, 255);
        font-size: 15px;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        margin-left: 550px;
        margin-top: 70px;
    }

    input[type=submit]:hover {
        background-color: rgb(44, 44, 44);
        transition: 0.2s;
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

            <div class="collapse navbar-collapse" id="#collapsNavbar" style="margin-left: 400px;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="Pesan.php"><button type="submit" class="btn btn-primary"
                                name="login">Pesan</button></a>
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

    <section style="background-color: white; height: 571px;">
        <div class="container">
            <h1
                style="text-align: center; margin-top: 50px; margin-bottom: 30px; font-family: poppins; font-weight: bold;">
                Project Progress</h1>
            <table>
                <tr>
                    <th>Service</th>
                    <th>Description</th>
                    <th>Cost</th>
                    <th>Status</th>
                    <th>Progress</th>
                </tr>
                <?php while($data=mysqli_fetch_assoc($query)):?>
                <tr>
                    <td><?php echo $data['Service'] ?></td>
                    <td><?php echo $data['Deskripsi'] ?></td>
                    <td><?php echo $data['Harga'] ?></td>
                    <td><?php echo $data['Status'] ?></td>
                    <td>
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                            aria-valuenow="<?php echo $data['Progress'] ?>" aria-valuemin="0" aria-valuemax="100"
                            style="width: <?php echo $data['Progress'] ?>%">
                            <?php echo $data['Progress'] ?></div>
                    </td>
                </tr>
                <?php endwhile ?>
            </table>
            <a href="Home.php"><input type="submit" value="Logout"></a>
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