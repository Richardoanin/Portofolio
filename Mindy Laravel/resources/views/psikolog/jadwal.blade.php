@extends('psikolog.app')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-8 pb-2 mb-3">
  <h1>Jadwal</h1>
  <a href="/logout" class="btn btn-success px-3 py-2 primary-btn mb-5"
    style="border-radius: 30px; font-size: 20px; background-color: #079911;margin-right: 40px;">Logout</a>
</div>
<div class="container-fluid" style="width: 1000px;">
  <table class="table table-borderless">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Paket</th>
        <th scope="col">Service</th>
        <th scope="col">Jadwal</th>
        <th scope="col">Link</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($jadwal as $item)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$item->nama}}</td>
        <td>{{$item->paket}}</td>
        <td>{{$item->service}}</td>
        <td>{{$item->jadwal}}</td>
        <td><a href="https://{{$item->link}}" style="text-decoration: none; color: black">{{$item->link}}</td>
        <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ubahModal{{$item->id}}">Edit</button></td>
      </tr>

      <!-- Modal Ubah -->
      <div class="modal fade" id="ubahModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/input/jadwal/{{$item->id}}" method="post">
            <div class="modal-body">
                  @csrf
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Jadwal</label>
                      <input type="text" class="form-control" id="recipient-name" name="jadwal" value="{{$item->jadwal}}">
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Link Meet</label>
                      <input type="text" class="form-control" id="message-text" name="link" value="{{$item->link}}">
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
      @endforeach
    </tbody>
  </table>
</div>
@endsection