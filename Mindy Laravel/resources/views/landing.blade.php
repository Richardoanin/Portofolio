@extends('layout')
@section('content')

<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
</head>


<section id="hero">
    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-5">
                <h1>Kesehatan adalah hal yang penting</h1>
                <p class="mt-3">Menjaga kesehatan mental anda merupakan hal yang harus menjadi sebuah
                    prioritas bagi diri anda.</p>
            @if (Auth::check() and Auth::user()->user == 'user')
                <a href="/layanan" class="mt-2 btn btn-success py-2 px-5 rounded-pill">Start</a>
            @elseif (Auth::check() and Auth::user()->user == 'admin')

            @elseif (Auth::check() and Auth::user()->user == 'psikolog')

            @else
                <a href="/masuk" class="mt-2 btn btn-success py-2 px-5 rounded-pill">Start</a>
            @endif
            </div>
            
            <div class="col-5">
                <div class="position-absolute bg-success w-100 h-75 rounded-circle" style="opacity: 0.25;"></div>
                <img src="/Landing Page/Person.svg" alt="" class="position-relative">
            </div>
        </div>
    </div>
</section>
<hr>

<section id="2">
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center">Kenapa Memilih Kami</h2>
                <div class="row mt-5">
                    <div class="col">
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="bg-light p-3 rounded-circle mr-3">
                                <img src="/Landing Page/$.svg" alt="">
                            </div>
                            <h4>Harga Terjangkau</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="bg-light p-3 rounded-circle mr-3">
                                <img src="/Landing Page/check.svg" alt="">
                            </div>
                            <h4>Tersertifikasi</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="bg-light     p-3 rounded-circle mr-3">
                                <img src="/Landing Page/pin.svg" alt="">
                            </div>
                            <h4>Dimana Saja</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="3">
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-12 bg-light text-center p-5 rounded-lg">
                <h2>Pricelist</h2>
                <p class="mb-5">Menawarkan harga yang menarik</p>
                <div class="row d-flex mt-5">
                    @foreach($items as $item)
                        <div class="card col border text-left p-4 rounded-lg m-2">
                            <div class="card-body">
                                <h5>{{ $item->paket }}</h5>
                                <h2 class="mb-4">Rp. {{ $item->harga}}</h2>
                                <div class="row d-flex px-3 mb-5">
                                    <img src="/Landing Page/v.svg" alt="" class="mr-2" style="height: 20px;">
                                    <p>{{ $item->service }}</p>
                                </div>
                            </div>
                            <a href="" class="btn btn-outline-success w-100 mt-5" data-bs-toggle="modal" data-bs-target="#prod1">Details</a>
                            <a href="/layanan" class="btn btn-success w-100 mt-3">Start</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<hr>

<!-- modal details  -->
<style>
    .modal-edit {
        max-width: 40%;
    }
</style>
<div class="modal fade" tabindex="-1" id="prod1" tabindex="-1">
    <div class="modal-dialog modal-edit">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Details </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li> Sesi temu konseling dengan psikolog bersertifikasi </li>
                </ul>
            </div>
            <br><br>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="prod2" tabindex="-1">
    <div class="modal-dialog modal-edit">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Details </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li> Sesi temu konseling dengan psikolog bersertifikasi </li>
                    <li> Akses layanan playlist musik yang menenangkan jiwa </li>
                </ul>
            </div>
            <br><br>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="prod3" tabindex="-1">
    <div class="modal-dialog modal-edit">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Details </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li> Sesi temu konseling dengan psikolog bersertifikasi </li>
                    <li> Akses berbagai tutorial serta tips meditasi setelah menjalani penatnya hari </li>
                </ul>
            </div>
            <br><br>
        </div>
    </div>
</div>

<!-- ----------  -->

<section id="4">
    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-5">
                <div class="position-absolute bg-success w-100 h-75 rounded-circle" style="opacity: 0.25;"></div>
                <img src="/Landing Page/A Person.svg" class="position-relative" alt="">
            </div>
            <div class="col-5">
                <h2>Tenangkan Dirimu dan Berlatih Untuk Menerima Diri</h2>
                <p class="mt-3">Menjaga kesehatan mental anda merupakan hal yang harus menjadi sebuah
                    prioritas bagi diri anda.</p>
                <a href="" class="mt-2 btn btn-success py-2 px-5 rounded-pill">Start</a>
            </div>
        </div>
    </div>
</section>

<section id="5">
    <div class="container my-5">
        <div class="row d-flex bg-success p-5 rounded-lg align-items-center">
            <div class="col-10">
                <h1 class="text-light">Mulai Course Di Mindy,
                    Gratis Yuk
                </h1>
                <p class="text-light">
                    Kamu bisa mulai mengikuti course di Mindy Secara Gratis dan mendapatkan banyak kejutan lainnya
                </p>
            </div>
            <div class="col-2">
                <a href="" class="mt-2 btn btn-light py-2 px-5 rounded-pill">Start</a>
            </div>
        </div>
    </div>
</section>
<hr>

<section id="6">
    <div class="container my-5 py-5">
        <h2 class="text-center">Kunjungi Kami</h2>
        <div class="row d-flex justify-content-between mt-5">
            <div class="col-8">
                <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.573603666437!2d106.88217375064512!3d-6.187771595498368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4e918384361%3A0xe1f0f577574583d8!2sJl.%20Locis%20No.10%2C%20RT.10%2FRW.17%2C%20Kayu%20Putih%2C%20Kec.%20Pulo%20Gadung%2C%20Kota%20Jakarta%20Timur%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2013210!5e0!3m2!1sen!2sid!4v1649621075592!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-4">
                <p class="font-weight-bold m-0">Alamat</p>
                <p class="mb-4">Jl.Locis No. 10 Kayu Putih, Jakata Timur</p>
                <p class="font-weight-bold m-0">E-mail</p>
                <p>hellomindy@gmail.com</p>
                <p class="font-weight-bold m-0">Whatsapp</p>
                <p class="mb-4">0813-9976-5555</p>
                <p class="font-weight-bold m-0">Get in touch with us today</p>
                <form action="#" method="post" role="form" class="php-email-form aos-init aos-animate" data-aos="fade-up">
                    <div class="form-group mt-3">
                        <input placeholder="Your Email" type="email" class="form-control" name="email" id="email" required="">
                    </div>
                    <div class="text-center">
                        <a href="#" class="mt-2 btn btn-success py-2 px-5 rounded-pill">Submit</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <footer class="my-5 pt-5 text-muted text-center text-small py-3 my-4 border-top">
            <p class="mb-1"> © 2022 Mindy Company, Inc </p>
        </footer>
    </div>
</section>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/62b16facb0d10b6f3e78660c/1g62hof2n';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
@endsection