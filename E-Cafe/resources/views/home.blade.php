@extends('layouts.app')
 
@section('content')
    <section id="content">
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row--> 
            @php
                $collection = \App\Models\Information::get();
            @endphp
            @foreach($collection as $item)
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{$item->takeImage}}" alt="..." /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light">{{$item->judul}}</h1>
                    <p>{{$item->deskripsi}}</p>
                </div>
            </div>
            @endforeach
            
            <div class="card text-white bg-secondary my-5 py-4 text-center">
            <div class="card-body">
                <h3 class="text-white m-0">Some of our finest work comes through service to others</h3>
                <p class="text-white m-0">Gordon B. Hinckley</p>
                <center><img src="https://gallery.yopriceville.com/var/albums/Free-Clipart-Pictures/Coffee_Clipart.png?m=1434276875" width="275" height="300"/></center>
            </div>
        </div>
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 align ="center" class="card-title">Operational Hours</h2>
                              <center><img src="data:image/jpeg;base64,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" /></center>
                            <hr style="color:brown; height: 5px;">
                            <ul class="address">
                        @php
                            $collection = \App\Models\Operational::get();
                        @endphp
                        @foreach($collection as $item)
                            <li></i>{{$item->day}}</li>
                            </i>{{$item->open}} - {{$item->close}}
                        @endforeach
                    </ul>
 
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!"><!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            More Info
                            </button>
 
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Hari</th>
                                        <th scope="col">Jam</th>
                                        <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                            $collection = \App\Models\Operational::get();
                                        @endphp
                                    @foreach($collection as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->day}}</td>
                                        <td>{{$item->open}} - {{$item->close}}</td>
                                        <td>{{$item->keterangan}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table>    
                                </div>
                                <div class="modal-footer">
                                </div>
                                </div>
                            </div>
                            </div></a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 align ="center" class="card-title">Coffee House</h2>
                            <center><img src="data:image/jpeg;base64,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" /></center>
                            <br><br><hr style="color:brown; height: 5px;">
                            <ul class="address">
                                @php
                                    $i = 1;
                                    $collection = \App\Models\Information::get();
                                @endphp
                                @foreach($collection as $item)
                                    <li></i>{{$item->location}} </li>
                                @endforeach
                        <li></i><a href="mailto:info@email">info@email</a></li>
                        <li></i>022 678 900 200</li>
                    </ul>
 
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">
                     <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">More Info
                    </button>
 
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 >Location</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.
                                                774206293822!2d107.6071809147728!3d-6.917576095001749!2m3!1f0!2f0!3f0!3m2!
                                                1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e63aa8eef09b%3A0x492819c17ff5b185!2sJl.
                                                %20Braga%2C%20Kec.%20Sumur%20Bandung%2C%20Kota%20Bandung%2C%20Jawa%20Barat!
                                                5e0!3m2!1sid!2sid!4v1641352785971!5m2!1sid!2sid"
                                                width="600" height="450" style="border:0;"
                                                allowfullscreen="" loading=""></iframe>
                    </div>
 
                    </div>
                </div>
                </div></a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 align ="center" class="card-title">Hubungi Kami</h2><br>
                            <center><img style="padding-top:37px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvHMuELQnevVf7Q_KppQeWbQZj9g94TQzTQg&usqp=CAU" /></center>
                            <hr style="color:brown; height: 5px;">
                            @php
                                $i = 1;
                                $collection = \App\Models\Contact::get();
                            @endphp
                            @foreach($collection as $item)
                                <center>
                                <a href="{{$item->link}}" class="text-decoration-none">
                                    {{$item->sosmed}}
                                    <img src="{{asset($item->takeImage)}}" alt="" style="max-width:50px; max-height:50px;">
                                </a>
                                <br><br>
                                </center>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection
 

