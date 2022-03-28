    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Booking</title>
        <?php
        $gedung=$_GET['gedung'];
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
            <h5
                style="text-align: center; background-color: rgb(44, 44, 44); height: 30px; color: white; margin-top: 50px;">
                Reserve your venue now!</h5><br>

            <section id="booking"
                style="background-color: white; border: solid gray 1px; height: 800px; border-radius: 10px; display: flex;">
                <div class="foto">
                    <?php
                    if (isset($gedung)){
                    ?>
                    <img src="img/<?php echo $gedung ?>.jpg"
                        style="margin-top: 200px; margin-left: 50px; margin-right: 50px;" alt="nusantara" height="230px">
                        <?php
                        }else{
                        ?>
                        <img src="img/Nusantara Hall.jpg"
                        style="margin-top: 200px; margin-left: 50px; margin-right: 50px;" alt="nusantara" height="230px">
                        <?php
                        }
                        ?>

                    
                </div>

                <form class="row g-3" method="post" action="my booking.php" style="margin-right: 25px; margin-top: 10px; height: 90%;">
                    <div class="col-12">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" class="form-control" type="text" value="richard_1202194121" readonly>
                    </div>

                    <div class="col-12">
                        <label for="tanggal" class="form-label">Date</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="mm/dd/yyyy">
                    </div>

                    <div class="col-12">
                        <label for="start" class="form-label">Start Time</label>
                        <input type="time" name="start" class="form-control" id="start"
                            placeholder="--:-- --">
                    </div>

                    <div class="col-12">
                        <label for="duration" class="form-label">Duration (Hours)</label>
                        <input type="number" name="duration" class="form-control" value="1">
                    </div>

                    <div class="col-12">
                        <label for="building" class="form-label">Building Type</label>
                        <select id="building" name="building" class="form-select">
                        <?php
                    if (isset($gedung)){
                    ?>
                    <option selected><?php echo $gedung ?></option>
                    <option value="Nusantara Hall" disabled>Nusantara Hall</option>
                    <option value="Garuda Hall" disabled>Garuda Hall</option>
                    <option value="Gedung Serba Guna" disabled>Gedung Serba Guna</option>
                        <?php
                        }else{
                        ?>
                        <option selected>Choose...</option>
                        <option value="Nusantara Hall">Nusantara Hall</option>
                        <option value="Garuda Hall">Garuda Hall</option>
                        <option value="Gedung Serba Guna">Gedung Serba Guna</option>
                        <?php
                        }
                        ?>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="number" name="phone" class="form-control" id="phone">
                    </div>

                    <div class="col-12">
                        <label for="service" class="form-label">Add Service(s)</label>
                        <div class="form-check">
                            <input class="form-check-input" name="service[]" type="checkbox" id="catering" value="Catering">
                            <label class="form-check-label" for="gridCheck">
                                Catering / $700
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="service[]" type="checkbox" id="decor" value="Decoration">
                            <label class="form-check-label" for="gridCheck">
                                Decoration / $450
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="service[]" type="checkbox" id="sound" value="Sound System">
                            <label class="form-check-label" for="gridCheck">
                                Sound System / $250
                            </label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit" style="width: 750px;">Book</button>
                    </div>
                </form>
            </section>
        </div>

        <footer style="text-align: center; background-color: rgb(214, 214, 214); height: 30px; margin-top: 50px;">Created by: richard_1202194121</footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

    </body>

    </html>