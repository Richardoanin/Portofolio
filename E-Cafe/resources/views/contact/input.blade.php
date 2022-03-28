<div class="container" style="margin-top: 10rem;">
    <section id="form" style="box-shadow: 0px 15px 40px 0px rgba(62,66,66,0.1); border-radius: 20px;">
        <div class="container">
            <button class="btn btn-primary" onclick="main_content('content_list')">Kembali</button>
            <form class="row g-3" id="form_menu">
                <h1 style="font-weight: bold; text-align: center;">Tambah Baru</h1>
                <div class="col-12">
                    <label for="sosmed" class="form-label" style="font-weight: bold;">Nama Kontak</label>
                    <input type="text" class="form-control" name="sosmed" value="{{$contact->sosmed}}" id="sosmed">
                </div>

                <div class="col-12">
                    <label for="link" class="form-label" style="font-weight: bold;">Link</label>
                    <input class="form-control" type="text" name="link"  value="{{$contact->link}}">
                </div>

                @if($contact->gambar)
                <div class="col-12">
                    <label for="gambar" class="form-label" style="font-weight: bold;">Gambar</label>
                    <br>
                    <img src="{{asset($contact->takeImage)}}" style="max-width: 300px;max-height:150px;">
                </div>
                @endif
                
                <div class="col-12">
                    <input type="file" name="gambar" id="gambar" accept=".png, .jpg, .jpeg" >
                </div>

                <div class="col-12 d-flex justify-content-center mb-4">
                    @if($contact->id)
                        <button id="button_menu" class="btn btn-primary" style="width: 15%;" onclick="handle_upload('#button_menu', '#form_menu', '{{route('contact.update',$contact->id)}}', 'PATCH', 'submit' )" >Ubah</button>
                    @else
                        <button id="button_menu" class="btn btn-primary" style="width: 15%;" onclick="handle_upload('#button_menu', '#form_menu', '{{route('contact.store')}}', 'POST', 'submit' )" >Simpan</button>
                    @endif
                </div>
            </form>
        </div>
    </section>
</div>