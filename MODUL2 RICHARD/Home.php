    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Home</title>
        <style>
        .navbar .container .collapse .navbar-nav {
            margin-left: 580px;
        }

        h2 {
            text-align: center;
            margin-top: 70px;
        }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <div class="container">
                <div class="collapse navbar-collapse" id="#collapsNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="booking.php">Booking</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <h2>WELCOME TO ESD VENUE RESERVATION</h2>

        <div class="container">
            <section id="card" style="background-color: rgb(44, 44, 44); height: 30px; margin-top: 30px;">
                <h5 style="text-align: center; color: white;">Find your best deal for your event here!</h5>
            </section> <br>
            <div class="row">
                <div class="col">
                    <div class="card h-100">
                        <img src="img/Nusantara Hall.jpg"
                            class="card-img-top" alt="hotel1">
                        <div class="card-body">
                            <h5 class="card-title">Nusantara Hall</h5>
                            <p class="card-text" style="margin-bottom: 0px;">$2000 / Hour</p>
                            <p class="card-text">5000 Capacity</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="text-align: center; color: green; font-weight: bold;">Free
                                Parking</li>
                            <li class="list-group-item" style="text-align: center; color: green; font-weight: bold;">Full AC
                            </li>
                            <li class="list-group-item" style="text-align: center; color: green; font-weight: bold;">
                                Cleaning Service</li>
                            <li class="list-group-item" style="text-align: center; color: green; font-weight: bold;">
                                Covid-19 Health Protocol</li>
                        </ul>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="booking.php?gedung=Nusantara Hall" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100">
                        <img src="img/Garuda Hall.jpg"
                            class="card-img-top" alt="hotel1" height="233px">
                        <div class="card-body">
                            <h5 class="card-title">Garuda Hall</h5>
                            <p class="card-text" style="margin-bottom: 0px;">$1000 / Hour</p>
                            <p class="card-text">2000 Capacity</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="text-align: center; color: green; font-weight: bold;">Free
                                Parking</li>
                            <li class="list-group-item" style="text-align: center; color: green; font-weight: bold;">Full AC
                            </li>
                            <li class="list-group-item" style="text-align: center; color: red; font-weight: bold;">No
                                Cleaning Service</li>
                            <li class="list-group-item" style="text-align: center; color: green; font-weight: bold;">
                                Covid-19 Health Protocol</li>
                        </ul>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="booking.php?gedung=Garuda Hall" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100">
                        <img src="img/Gedung Serba Guna.jpg"
                            class="card-img-top" alt="hotel1" height="233px">
                        <div class="card-body">
                            <h5 class="card-title">Gedung Serba Guna</h5>
                            <p class="card-text" style="margin-bottom: 0px;">$500 / Hour</p>
                            <p class="card-text">500 Capacity</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="text-align: center; color: red; font-weight: bold;">No Free
                                Parking</li>
                            <li class="list-group-item" style="text-align: center; color: red; font-weight: bold;">No Full
                                AC</li>
                            <li class="list-group-item" style="text-align: center; color: red; font-weight: bold;">No
                                Cleaning Service</li>
                            <li class="list-group-item" style="text-align: center; color: green; font-weight: bold;">
                                Covid-19 Health Protocol</li>
                        </ul>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="booking.php?gedung=Gedung Serba Guna" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer style="text-align: center; background-color: rgb(214, 214, 214); height: 30px; margin-top: 50px;">Created by: richard_1202194121</footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

    </body>

    </html>