<div class="container" style="margin-top: 10rem;">
    <section id="form" style="box-shadow: 0px 15px 40px 0px rgba(62,66,66,0.1); border-radius: 20px;">
        <div class="container">
            <button class="btn btn-primary" onclick="main_content('content_list')">Kembali</button>
            <form class="row g-3" id="form_menu">
                <h1 style="font-weight: bold; text-align: center;">Tambah Baru</h1>
                <div class="col-12">
                    <label for="open" class="form-label" style="font-weight: bold;">Jam Buka</label>
                    <input type="time" class="form-control" name="open" value="{{$operational->open}}" id="open">
                </div>

                <div class="col-12">
                    <label for="close" class="form-label" style="font-weight: bold;">Jam Tutup</label>
                    <input class="form-control" type="time" name="close"  value="{{$operational->close}}">
                </div>

                <div class="col-12">
                    <label for="hari" class="form-label" style="font-weight: bold;">Hari</label>
                    <select name="day" id="day"  class="form-control">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jum'at">Jum'at</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>

                <div class="col-12">
                    <label for="gambar" class="form-label" style="font-weight: bold;">Keterangan</label>
                    <input  class="form-control" type="text" name="keterangan" id="keterangan" value="{{$operational->keterangan}}">
                </div>
                

                <div class="col-12 d-flex justify-content-center mb-4">
                    @if($operational->id)
                        <button id="button_menu" class="btn btn-primary" style="width: 15%;" onclick="handle_upload('#button_menu', '#form_menu', '{{route('operational.update',$operational->id)}}', 'PATCH', 'submit' )" >Ubah</button>
                    @else
                        <button id="button_menu" class="btn btn-primary" style="width: 15%;" onclick="handle_upload('#button_menu', '#form_menu', '{{route('operational.store')}}', 'POST', 'submit' )" >Simpan</button>
                    @endif
                </div>
            </form>
        </div>
    </section>
</div>