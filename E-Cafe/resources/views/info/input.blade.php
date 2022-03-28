<div class="container" style="margin-top: 10rem;">
    <section id="form" style="box-shadow: 0px 15px 40px 0px rgba(62,66,66,0.1); border-radius: 20px;">
        <div class="container">
            <button class="btn btn-primary" onclick="main_content('content_list')">Kembali</button>
            <form class="row g-3" id="form_menu">
                <h1 style="font-weight: bold; text-align: center;">Tambah Baru</h1>
                <div class="col-12">
                    <label for="judul" class="form-label" style="font-weight: bold;">Judul</label>
                    <input type="text" class="form-control" name="judul" value="{{$information->judul}}" id="judul">
                </div>

                <div class="col-12">
                    <label for="penulis" class="form-label" style="font-weight: bold;">Deskripsi</label>
                    <input class="form-control" type="text" name="deskripsi"  value="{{$information->deskripsi}}">
                </div>
               
                <div class="col-12">
                    <label for="penulis" class="form-label" style="font-weight: bold;">Lokasi (optional)</label>
                    <input class="form-control" type="text" name="location"  value="{{$information->location}}">
                </div>

                @if($information->gambar)
                <div class="col-12">
                    <label for="gambar" class="form-label" style="font-weight: bold;">Gambar</label>
                    <br>
                    <img src="{{asset($information->takeImage)}}" style="max-width: 300px;max-height:150px;">
                </div>
                @endif
                
                <div class="col-12">
                    <input type="file" name="gambar" id="gambar" accept=".png, .jpg, .jpeg" >
                </div>

                <div class="col-12 d-flex justify-content-center mb-4">
                    @if($information->id)
                        <button id="button_menu" class="btn btn-primary" style="width: 15%;" onclick="handle_upload('#button_menu', '#form_menu', '{{route('web.update',$information->id)}}', 'PATCH', 'submit' )" >Ubah</button>
                    @else
                        <button id="button_menu" class="btn btn-primary" style="width: 15%;" onclick="handle_upload('#button_menu', '#form_menu', '{{route('web.store')}}', 'POST', 'submit' )" >Simpan</button>
                    @endif
                </div>
            </form>
        </div>
    </section>
</div>