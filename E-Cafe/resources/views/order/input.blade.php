<div class="container" style="margin-top: 10rem;">
    <section id="form" style="box-shadow: 0px 15px 40px 0px rgba(62,66,66,0.1); border-radius: 20px;">
        <div class="container">
            <button class="btn btn-primary" onclick="main_content('content_list')">Kembali</button>
            <form class="row g-3" id="form_pesan">
                <h1 style="font-weight: bold; text-align: center;">Order Menu</h1>
                <div class="col-12">
                    <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                    <input type="hidden" name="id_menu" value="{{$item->id}}">
                    <label for="judul" class="form-label" style="font-weight: bold;">Nama</label>
                    <input type="text" class="form-control" name="nama" id="judul"  value="{{Auth::user()->name}}" >
                </div>
                <div class="col-12">
                    <label for="penulis" class="form-label" style="font-weight: bold;">Menu</label>
                    <input class="form-control" type="text" name="menu" value="{{$item->nama}}">
                </div>

                <div class="col-12">
                    <label for="penulis" class="form-label" style="font-weight: bold;">Jumlah</label>
                    <input class="form-control" type="number" name="jumlah">
                </div>

                <div class="col-12">
                    <label for="penulis" class="form-label" style="font-weight: bold;">Harga</label>
                    <input class="form-control" type="number" name="harga" value="{{$item->harga}}" readonly>
                </div>

                <div class="col-12">
                    <label for="deskripsi" class="form-label" style="font-weight: bold;">Catatan</label>
                    <textarea class="form-control" name="catatan" id="deskripsi" rows="3"></textarea>
                </div>

                <div class="col-12 d-flex justify-content-center mb-4">
                    <button type="button" id="button_pesan" class="btn btn-primary" style="width: 15%;" onclick="handle_save('#button_pesan', '#form_pesan', '{{route('order.store')}}', 'POST', 'submit' )" >Order</button>
                </div>
            </form>
        </div>
    </section>
</div>