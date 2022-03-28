    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>My Booking</title>
        <?php
        $name = $_POST['name'];
        $tanggal = $_POST['tanggal'];
        $start = $_POST['start'];
        $duration = $_POST['duration'];
        $building = $_POST['building'];
        $phone = $_POST['phone'];
        $check_out_jam = date("H:i", strtotime("+$duration hours", strtotime($start)));
        $check_out = date('m-d-Y H:i:s', strtotime("$tanggal $check_out_jam"));
        $check_in = date('m-d-Y H:i:s', strtotime("$tanggal $start"));
        $harga = 0;
        if ($building == 'Nusantara Hall') {
            $harga = 2000;
        }
        if ($building == 'Garuda Hall') {
            $harga = 1000;
        }
        if ($building == 'Gedung Serba Guna') {
            $harga = 500;
        }

        if (!empty($_POST['service'])) {
            foreach ($_POST['service'] as $data) {
                if ($data == "Catering") {
                    $harga += 700;
                }
                if ($data == "Decoration") {
                    $harga += 450;
                }
                if ($data == "Sound System") {
                    $harga += 250;
                }
            }
        }
        ?>
        <style>
        .navbar .container .collapse .navbar-nav {
            margin-left: 580px;
        }
        </style>
    </head>

    <body>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <div class="container">
                <div class="collapse navbar-collapse" id="#collapsNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="Home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="booking.php">Booking</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <h4 style="text-align: center; margin-top: 70px;">
                Thank you richard_1202194121 for Reserving</h4>
            <h5 style="text-align: center;">Please double check for your reservation details</h5>
            <section id="mybook">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Boking Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Check-In</th>
                            <th scope="col">Check-Out</th>
                            <th scope="col">Building Type</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Service</th>
                            <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo rand() ?></th>
                            <td><?php echo $name ?></td>
                            <td><?php echo $check_in ?></td>
                            <td><?php echo $check_out ?></td>
                            <td><?php echo $building ?></td>
                            <td><?php echo $phone ?></td>
                            <td><?php
                            if (!empty($_POST['service'])) {
                                echo "<ul>";
                                foreach ($_POST['service'] as $layanan) {
                                    echo "<li>" .  $layanan . "</li>";
                                }
                                echo "</ul>";
                            } else {
                                echo "no service";
                            }
                            ?></td>
                            <td>$ <?php echo $harga ?></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
        <footer style="text-align: center; background-color: rgb(214, 214, 214); height: 30px; margin-top: 410px;">Created by: richard_1202194121</footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

    </body>

    </html>