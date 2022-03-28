<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Richardo Anin</title>
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

    .isi {
        margin-left: 150px;
    }

    .about {
        display: flex;
        margin-left: 150px;
    }

    .carousel-inner {
        width: 800px;
        height: 500px;
        margin-left: 360px;
    }

    .container .row .col-3 .card .card-body {
        background-color: rgb(44, 44, 44);
    }

    .container .row .col-3 .card .card-img-top {
        width: 100px;
        height: 100px;
        margin-left: 100px;

    }

    svg {
        margin-top: 15px;
        margin-left: 23px;
    }

    .baris1 {
        display: flex;
        margin-left: 200px;
    }

    .html:hover {
        box-shadow: 0px 0px 10px white;
        transition: 0.2s;
    }

    .css {
        margin-left: 30px;
    }

    .css:hover {
        box-shadow: 0px 0px 10px white;
        transition: 0.2s;
    }

    .python {
        margin-left: 30px;
    }

    .python:hover {
        box-shadow: 0px 0px 10px white;
        transition: 0.2s;
    }

    .php {
        margin-left: 30px;
    }

    .php:hover {
        box-shadow: 0px 0px 10px white;
        transition: 0.2s;
    }

    .baris2 {
        margin-top: 20px;
        margin-left: 200px;
        display: flex;
    }

    .figma:hover {
        box-shadow: 0px 0px 10px white;
        transition: 0.2s;
    }

    .premier {
        margin-left: 30px;
    }

    .premier:hover {
        box-shadow: 0px 0px 10px white;
        transition: 0.2s;
    }

    .photoshop {
        margin-left: 30px;
    }

    .photoshop:hover {
        box-shadow: 0px 0px 10px white;
        transition: 0.2s;
    }

    .after {
        margin-left: 30px;
    }

    .after:hover {
        box-shadow: 0px 0px 10px white;
        transition: 0.2s;
    }

    .bungkus {
        display: flex;
    }

    #video iframe {
        margin-left: 450px;
    }

    .lokasi iframe {
        margin-left: 100px;
    }

    input[type=submit] {
        background-color: rgba(13, 110, 253, 1);
        color: rgb(255, 255, 255);
        font-size: 15px;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        margin-left: 10px;
    }

    input[type=submit]:hover {
        background-color: rgb(0, 86, 214);
        transition: 0.2s;
    }

    .navbar .container .navbar-brand {
        display: flex;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home"><img src="r.png" width="70" height="50">
                <h2>Richard</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="#collapsNavbar" style="margin-left: 400px;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Me</a>
                    </li>
                    <li class="nav-item" style="margin-left: 40px;">
                        <a class="nav-link" href="#projects">Projects</a>
                    </li>
                    <li class="nav-item" style="margin-left: 40px;">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item" style="margin-left: 40px;">
                        <a class="nav-link" href="#skills">Skills</a>
                    </li>
                    <li class="nav-item" style="margin-left: 40px;">
                        <a class="nav-link" href="#video">Video</a>
                    </li>
                    <li class="nav-item" style="margin-left: 40px;">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                <li>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Login
                    </button>
                </li>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You want to login as?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"><a href="Login.php"
                            style="text-decoration: none; color: white;">Client</a></button>
                    <button type="button" class="btn btn-primary"><a href="Admin.php"
                            style="text-decoration: none; color: white;">Admin</a></button>
                </div>
            </div>
        </div>
    </div>

    <section id="home" style="background-color: rgb(44, 44, 44); height: 730px; padding: 30px 0px;">
        <div class="home" style="display: flex;">
            <div class="teks" style="margin-top: 250px; margin-left: 220px;">
                <p style="font-size: 25px; margin-bottom: 5px; color: white;">Hello, I'm</p>
                <h1>Cristian Richardo Anin</h1>
                <p style="font-weight: medium; font-size: 25px; color: white;">Front-End Developer and Graphic Designer
                </p>
                <a href="https://wa.me/+6281231165922"><button type="button"
                        class="btn btn-primary btn-lg">Whatsapp</button></a>
            </div>
            <div class="landing" style="margin-top: 100px; margin-left: 100px">
                <img src="landing.png" alt="landing" width="600px" height="400px">
            </div>
        </div>

    </section>

    <section id="about" style="background-color: rgba(32, 32, 36, 1); height: 600px; padding: 100px 0px;">
        <div class="about">
            <img src="aku1.png" alt="aku" width="300px" height="300px">
            <div class="isi">
                <h3 style="font-family: poppins; font-weight: bold; color: white; font-size: 30px;">About Me</h3>
                <p style="font-size: 15px; font-family: poppins; color: white; width: 70%;">My name is Richard, I live
                    in Sidoarjo, East Java, Indonesia. I'm currently studying at
                    an university majoring Information System. At university I joined Enterprise System Development
                    Laboratory as Software Development.
                    I've been started as a Front-End Developer in 2021 since I got Website Development course. While I
                    started as a graphic design in 2018
                    since I was in high school.</p>
                <p style="font-size: 15px; font-family: poppins; color: white; width: 70%;">I've worked on freelance
                    projects as well as personal projects.
                    So I'm experienced enough to work on the project.</p><br>
                <div class="tombol" style="padding: 50px;">
                    <a href="https://www.linkedin.com/in/cristian-richardo-anin/"><button type="button"
                            class="btn btn-primary btn-lg">Linkedin</button></a>
                    <a href="https://drive.google.com/file/d/1UlqM-ObxBkyjS9yOL7uyiAwCB-Z1kOvE/view?usp=sharing"><button
                            type="button" class="btn btn-primary btn-lg" style="margin-left: 30px;">Resume</button></a>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" style="background-color: rgb(44, 44, 44); height: 730px; padding: 100px 0px;">
        <h3
            style="font-family: poppins; font-weight: bold; color: white; font-size: 30px; margin-left: 700px; margin-bottom: 40px">
            Projects</h3>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="pos1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="pos9.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="pos10.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section id="services" style="background-color: rgba(32, 32, 36, 1); height: 600px; padding: 100px 0px;">
        <h3
            style="font-family: poppins; font-weight: bold; color: white; font-size: 30px; margin-left: 700px; margin-bottom: 80px">
            Services</h3>
        <div class="container">
            <div class="row row-cols-1">
                <div class="col-3">
                    <div class="card h-100 text-white bg-dark mb-3">
                        <img src="ui.png" class="card-img-top" alt="ui">
                        <div class="card-body">
                            <h5 class="card-title">UI/UX Design</h5>
                            <p class="card-text">Design layout that fit your business in professional development.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card h-100 text-white bg-dark mb-3">
                        <img src="curve.png" class="card-img-top" alt="design">
                        <div class="card-body">
                            <h5 class="card-title">Design</h5>
                            <p class="card-text">Create design for any poster or social media post.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card h-100 text-white bg-dark mb-3">
                        <img src="video.png" class="card-img-top" alt="antibodi">
                        <div class="card-body">
                            <h5 class="card-title">Video Editing</h5>
                            <p class="card-text">Create a beautiful scene, visual effects, transistion, subtitle, etc.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card h-100 text-white bg-dark mb-3">
                        <img src="coding.png" class="card-img-top" alt="antibodi">
                        <div class="card-body">
                            <h5 class="card-title">Website Development</h5>
                            <p class="card-text">Development of professional website, web systems, blogs, and online
                                stores.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="skills" style="background-color: rgb(44, 44, 44); height: 730px; padding: 100px 0px;">
        <h3
            style="font-family: poppins; font-weight: bold; color: white; font-size: 30px; margin-left: 700px; margin-bottom: 80px">
            Skills</h3>
        <div class="bungkus">
            <p
                style="font-family: poppins; color: white; font-size: 20px; width: 30%; margin-left: 100px; margin-top: 100px">
                This is the skills that I have, I believe in the skills that I have, I can be trusted to do all the
                tasks given professionally and on time.</p>
            <div class="skill">
                <div class="baris1">
                    <div class="html"
                        style="background-color: rgb(32, 32, 36, 1); width: 150px; height: 170px; border-radius: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#006aff">
                                    <path
                                        d="M155.74063,7.99531c-0.645,-0.71219 -1.57219,-1.11531 -2.53969,-1.11531h-134.40187c-0.9675,0 -1.89469,0.40313 -2.53969,1.11531c-0.65844,0.71219 -0.98094,1.66625 -0.88688,2.63375l12.10719,135.62469c0.12094,1.42438 1.11531,2.60688 2.48594,3.01l55.08031,15.72188c0.29563,0.09406 0.61813,0.13437 0.94063,0.13437c0.3225,0 0.63156,-0.04031 0.94062,-0.13437l55.12063,-15.72188c1.37062,-0.40312 2.35156,-1.58562 2.48594,-3.01l12.09375,-135.62469c0.09406,-0.9675 -0.22844,-1.92156 -0.88687,-2.63375zM126.75594,54.75781h-64.715l1.54531,17.50906h61.61094l-4.6225,51.74781l-34.60156,10.45438l-0.33594,-0.1075l-34.19844,-10.36031l-1.86781,-21.08344h16.75656l0.72563,8.18344l19.12156,4.00438l18.77219,-4.00438l2.00219,-22.145h-58.62781l-4.55531,-50.92812h84.48156z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <p
                            style="color: white; font-family: poppins; font-size: 20px; margin-top: 10px; margin-left: 50px">
                            HTML</p>
                    </div>
                    <div class="css"
                        style="background-color: rgb(32, 32, 36, 1); width: 150px; height: 170px; border-radius: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="none" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none" fill-rule="nonzero"></path>
                                <g fill="#0066ff" fill-rule="evenodd">
                                    <path
                                        d="M144.48,20.64l-10.32,116.96l-48.16,13.76l-48.16,-13.76l-10.32,-116.96zM57.79469,96.32h13.76l0.33594,8.6l14.10937,4.81063l14.10938,-4.81063l1.02125,-15.48h-30.26125l-0.69875,-13.76h31.65875l1.02125,-13.76h-47.46125l-1.03469,-13.76h62.95469l-1.72,27.52l-2.41875,39.56l-27.17063,8.94938l-27.17062,-8.94938z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <p
                            style="color: white; font-family: poppins; font-size: 20px; margin-top: 10px; margin-left: 55px">
                            CSS</p>
                    </div>
                    <div class="python"
                        style="background-color: rgb(32, 32, 36, 1); width: 150px; height: 170px; border-radius: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#006dff">
                                    <path
                                        d="M84.28,6.88c-29.92531,0 -36.12,15.45313 -36.12,24.4025v16.8775h34.4v3.44h-51.2775c-11.35469,0 -24.4025,8.94938 -24.4025,34.4c0,25.45063 13.04781,34.4 24.4025,34.4h20.3175v-20.64c0,-7.56531 6.19469,-13.76 13.76,-13.76h41.28c5.84531,0 10.32,-4.47469 10.32,-10.32v-44.3975c0,-12.04 -11.35469,-24.4025 -32.68,-24.4025zM68.8,24.08c3.78938,0 6.88,3.09063 6.88,6.88c0,3.78938 -3.09062,6.88 -6.88,6.88c-3.78937,0 -6.88,-3.09062 -6.88,-6.88c0,-3.78937 3.09063,-6.88 6.88,-6.88zM120.4,51.6v24.08c0,7.56531 -6.19469,13.76 -13.76,13.76h-41.28c-5.84531,0 -10.32,4.47469 -10.32,10.32v40.9575c0,12.04 11.35469,24.4025 32.68,24.4025c29.92531,0 36.12,-15.45312 36.12,-24.4025v-16.8775h-34.4v-3.44h51.2775c11.35469,0 24.4025,-8.94937 24.4025,-34.4c0,-25.45062 -13.04781,-34.4 -24.4025,-34.4zM103.2,134.16c3.78938,0 6.88,3.09063 6.88,6.88c0,3.78938 -3.09062,6.88 -6.88,6.88c-3.78937,0 -6.88,-3.09062 -6.88,-6.88c0,-3.78937 3.09063,-6.88 6.88,-6.88z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <p
                            style="color: white; font-family: poppins; font-size: 20px; margin-top: 10px; margin-left: 42px">
                            Python</p>
                    </div>
                    <div class="php"
                        style="background-color: rgb(32, 32, 36, 1); width: 150px; height: 170px; border-radius: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#0065ff">
                                    <path
                                        d="M86,41.28c-46.29219,0 -82.56,19.64563 -82.56,44.72c0,25.07438 36.26781,44.72 82.56,44.72c46.29219,0 82.56,-19.64562 82.56,-44.72c0,-25.07437 -36.26781,-44.72 -82.56,-44.72zM77.42688,55.04h9.01656l-2.86219,13.76h8.04906c5.10625,0 8.53281,0.71219 10.48125,2.49938c1.90812,1.76031 2.48594,4.64937 1.72,8.58656l-3.57438,16.43406h-9.16437l3.29219,-15.19781c0.40313,-2.08281 0.24188,-3.53406 -0.45687,-4.3c-0.69875,-0.76594 -2.23063,-1.14219 -4.52844,-1.14219h-7.21594l-4.35375,20.64h-9.03zM37.84,68.8h18.34219c8.74781,0 14.04219,5.85875 11.97281,14.60656c-2.40531,10.15875 -8.85531,12.91344 -20.70719,12.91344h-5.67063l-1.80062,10.32h-9.11063zM110.08,68.8h18.34219c8.74781,0 14.04219,5.85875 11.97281,14.60656c-2.40531,10.15875 -8.85531,12.91344 -20.70719,12.91344h-5.67063l-1.80062,10.32h-9.11063zM45.64719,75.68l-2.59344,13.76h5.88563c5.09281,0 9.82281,-0.57781 10.61562,-8.17c0.29563,-2.94281 -0.92719,-5.59 -6.81281,-5.59zM117.88719,75.68l-2.59344,13.76h5.88563c5.09281,0 9.82281,-0.57781 10.61562,-8.17c0.29563,-2.94281 -0.92719,-5.59 -6.81281,-5.59z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <p
                            style="color: white; font-family: poppins; font-size: 20px; margin-top: 10px; margin-left: 55px">
                            PHP</p>
                    </div>
                </div>

                <div class="baris2">
                    <div class="figma"
                        style="background-color: rgb(32, 32, 36, 1); width: 150px; height: 170px; border-radius: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="96" height="96"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g>
                                    <path
                                        d="M93.16667,60.91667h-28.66667c-13.85317,0 -25.08333,-11.23017 -25.08333,-25.08333v0c0,-13.85317 11.23017,-25.08333 25.08333,-25.08333h28.66667z"
                                        fill="#0067ff"></path>
                                    <path
                                        d="M89.58333,111.08333h-25.08333c-13.85317,0 -25.08333,-11.23017 -25.08333,-25.08333v0c0,-13.85317 11.23017,-25.08333 25.08333,-25.08333h25.08333z"
                                        fill="#0067ff"></path>
                                    <path
                                        d="M64.5,161.25v0c-13.85317,0 -25.08333,-11.23017 -25.08333,-25.08333v0c0,-13.85317 11.23017,-25.08333 25.08333,-25.08333h25.08333v25.08333c0,13.85317 -11.23017,25.08333 -25.08333,25.08333z"
                                        fill="#0068ff"></path>
                                    <path
                                        d="M114.66667,60.91667h-25.08333v-50.16667h25.08333c13.85317,0 25.08333,11.23017 25.08333,25.08333v0c0,13.85317 -11.23017,25.08333 -25.08333,25.08333z"
                                        fill="#0067ff"></path>
                                    <circle cx="32" cy="24" transform="scale(3.58333,3.58333)" r="7" fill="#0067ff">
                                    </circle>
                                </g>
                            </g>
                        </svg>
                        <p
                            style="color: white; font-family: poppins; font-size: 20px; margin-top: 10px; margin-left: 45px">
                            Figma</p>
                    </div>
                    <div class="premier"
                        style="background-color: rgb(32, 32, 36, 1); width: 150px; height: 170px; border-radius: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="96" height="96"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#0067ff">
                                    <path
                                        d="M136.16667,21.5h-100.33333c-7.88333,0 -14.33333,6.45 -14.33333,14.33333v100.33333c0,7.88333 6.45,14.33333 14.33333,14.33333h100.33333c7.88333,0 14.33333,-6.45 14.33333,-14.33333v-100.33333c0,-7.88333 -6.45,-14.33333 -14.33333,-14.33333zM70.16167,66.66433h-7.998v18.00267h7.998c5.332,0 6.665,-3.999 6.665,-8.6645c0.00717,-4.67267 -1.99233,-9.33817 -6.665,-9.33817zM70.16167,93.998h-7.998v14.72033c0,3.28233 -2.666,5.94833 -5.94833,5.94833h-0.10033c-3.28233,0 -5.94833,-2.666 -5.94833,-5.94833v-45.43667c0,-3.28233 2.666,-5.94833 5.94833,-5.94833h13.38733c16.66967,0 18.66917,15.33667 18.66917,18.66917c-0.00717,13.33 -9.33817,17.9955 -18.00983,17.9955zM120.65083,83.13333c-0.53033,-0.05733 -3.38983,-0.33683 -3.94883,-0.33683c-4.56517,0 -6.03433,2.881 -6.59333,4.28567v21.63617c0,3.28233 -2.666,5.94833 -5.94833,5.94833h-0.02867c-3.28233,0 -5.94833,-2.666 -5.94833,-5.94833v-31.78417c0,-2.90967 2.35783,-5.2675 5.2675,-5.2675h1.02483c2.76633,0 5.06683,2.14283 5.25317,4.90917v0.00717c0.89583,-1.82033 3.2895,-5.75483 7.76867,-5.75483c1.96367,0 2.881,0.37983 3.27517,0.54467z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <p
                            style="color: white; font-family: poppins; font-size: 20px; margin-top: 10px; margin-left: 13px">
                            Premiere Pro</p>
                    </div>
                    <div class="photoshop"
                        style="background-color: rgb(32, 32, 36, 1); width: 150px; height: 170px; border-radius: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="96" height="96"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#0067ff">
                                    <path
                                        d="M34.4,22.93333c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v103.2c0,6.33533 5.13133,11.46667 11.46667,11.46667h103.2c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-103.2c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667zM45.86667,57.28854h22.81016c11.28893,0 19.01406,7.72244 19.01406,19.12604c0,11.20867 -8.00705,18.89089 -19.45078,18.89089h-12.26172v18.54375h-10.11172zM55.97839,65.75417v21.16406h9.99974c7.21254,0 11.44427,-3.76124 11.44427,-10.50364c0,-6.9316 -4.12361,-10.66042 -11.41067,-10.66042zM110.12031,70.09896c10.18813,0 16.58438,4.50918 17.28958,12.30651h-9.1263c-0.7052,-3.01573 -3.57195,-4.93828 -8.11849,-4.93828c-4.42613,0 -7.76016,2.12223 -7.76016,5.21823c0,2.43093 2.03775,3.91883 6.34922,4.89349l7.55859,1.72448c8.19293,1.8404 11.99297,5.37276 11.99297,11.67942c0,8.2388 -7.5654,13.72865 -18.2638,13.72864c-10.6984,0 -17.44008,-4.63235 -18.18542,-12.42968h9.60782c0.94027,3.17627 3.95089,5.06146 8.81276,5.06146c4.89627,0 8.30886,-2.15394 8.30886,-5.33021c0,-2.43093 -1.8361,-3.96523 -5.9125,-4.8711l-7.60339,-1.75807c-8.23307,-1.88053 -12.10495,-5.68254 -12.10495,-12.14974c0,-7.76293 7.04161,-13.13516 17.15521,-13.13516z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <p
                            style="color: white; font-family: poppins; font-size: 20px; margin-top: 10px; margin-left: 20px">
                            Photoshop</p>
                    </div>
                    <div class="after"
                        style="background-color: rgb(32, 32, 36, 1); width: 150px; height: 170px; border-radius: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="96" height="96"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#0067ff">
                                    <path
                                        d="M34.4,22.93333c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v103.2c0,6.33533 5.13133,11.46667 11.46667,11.46667h103.2c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-103.2c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667zM59.70729,58.0612h11.36589l20.10026,56.56068h-10.85078l-4.78151,-14.46771h-20.81693l-4.8599,14.46771h-10.2237zM64.83594,68.84479l-7.76016,23.31407h16.1138l-7.68177,-23.31407zM115.5513,70.88281c12.2292,0 19.56276,8.10944 19.56276,21.63438v3.13542h-29.94323v0.5039c0.23507,7.13227 4.34614,11.60104 10.7388,11.60104c4.816,0 8.15262,-1.76201 9.56302,-4.93828h9.20468c-1.83467,7.80307 -8.93979,12.66484 -19.04765,12.66484c-12.61907,0 -20.22344,-8.35508 -20.22344,-22.14948c0,-13.7944 7.72665,-22.45183 20.14505,-22.45183zM115.51771,78.58698c-5.80214,0 -9.87755,4.15873 -10.31329,10.42526h20.18985c-0.20067,-6.3468 -4.04577,-10.42526 -9.87656,-10.42526z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <p
                            style="color: white; font-family: poppins; font-size: 20px; margin-top: 10px; margin-left: 15px">
                            After Effects</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="video" style="background-color: rgba(32, 32, 36, 1); height: 600px; padding: 100px 0px;">
        <h3
            style="font-family: poppins; font-weight: bold; color: white; font-size: 30px; margin-left: 700px; margin-bottom: 80px">
            Video</h3>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/L6jtTTl5kBU" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </section>

    <section id="contact" style="background-color: rgb(44, 44, 44); height: 600px; padding: 100px 0px;">
        <h3
            style="font-family: poppins; font-weight: bold; color: white; font-size: 30px; margin-left: 700px; margin-bottom: 80px">
            Contact</h3>
        <div class="kontak" style="display: flex;">
            <div class="lokasi">
                <p
                    style="font-family: poppins; color: white; font-size: 20px; width: 40%; margin-left: 100px; margin-top: 50px">
                    Let's get in touch.</p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15824.851925554003!2d112.6794581!3d-7.4416718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e170f7e0dbb3%3A0xe61ececa39b65c60!2zN8KwMjYnMzcuMiJTIDExMsKwNDAnMzUuMyJF!5e0!3m2!1sid!2sid!4v1634550778960!5m2!1sid!2sid"
                    width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="talk">
                <p
                    style="font-family: poppins; color: white; font-size: 20px; width: 40%; margin-left: 500px; margin-top: 50px">
                    If you wanna talk about some projects or hiring me, please click the button below.</p>
                <a href="Pesan.php"><button type="button" class="btn btn-primary btn-lg" style="margin-left: 500px">Send
                        Email</button></a>
            </div>
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