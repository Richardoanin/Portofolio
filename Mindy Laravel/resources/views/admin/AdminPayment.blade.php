@extends('layouts.admin')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-6">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-8 pb-2 mb-3">
        <h1>Payments</h1>
        <a href="/logout" class="btn btn-success px-3 py-2 primary-btn mb-5" style="border-radius: 30px; font-size: 20px; background-color: #079911;margin-right: 40px;">Logout</a>
    </div>
    <div class="container-fluid" style="width: 800px;">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Product</th>
                    <th scope="col">Harga</th>
                    <th scope="col" width="40px">Status</th>
                    <th scope="col" width="40px">Action</th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembelian as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->paket}}</td>
                    <td>{{$item->harga}}</td>
                    <td><a href="#" class="btn btn-success px-4" style="border-radius: 30px; font-size: 12px; background-color: {{$item->status == 'Menunggu'?'grey':'black'}};" data-bs-toggle="modal" data-bs-target="#ModalSeePayments{{$item->id}}">{{$item->status}}</a></td>
                    <td><a class="btn btn-primary px-4 rounded-pill" style="border-radius: 30px; font-size: 12px;" data-bs-toggle="modal" data-bs-target="#modalEdit{{$item->id}}"> Update </a></td>
                    <td><a href="#" class="btn btn-danger px-4 rounded-pill" style="border-radius: 30px; font-size: 12px;" name=""> Delete </a></td>
                </tr>

                <!-- modal update -->
                <div class="modal fade" id="modalEdit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/payment/edit/{{$item->id}}" method="post">
                        <div class="modal-body">
                              @csrf
                                <div class="mb-3">
                                  <label for="recipient-name" class="col-form-label">Nama</label>
                                  <input type="text" class="form-control" id="recipient-name" name="nama" value="{{$item->nama}}" readonly>
                                </div>
                                <div class="mb-3">
                                  <label for="message-text" class="col-form-label">Paket</label>
                                  <input type="text" class="form-control" id="message-text" name="paket" value="{{$item->paket}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Harga</label>
                                    <input type="text" class="form-control" id="recipient-name" name="harga" value="{{$item->harga}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="status">
                                        <option selected value="{{$item->status}}">{{$item->status}}</option>
                                        <option value="Menunggu">Menunggu</option>
                                        <option value="Lunas">Lunas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

                <!-- MODAL LIHAT BUKTI -->
                <div class="modal fade" id="ModalSeePayments{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="custom-file" style="width: 200px; height: 300px; overflow: hidden; display: block; margin-left:auto;margin-right:auto;">
                                    <img src="gambar/{{$item->transfer}}"  style="width: 100%; object-fit: cover;" >                              
                                </div>                
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection