<div class="container" style="margin-top: 10rem;">
    <section id="form" style="box-shadow: 0px 15px 40px 0px rgba(62,66,66,0.1); border-radius: 20px;">
        <div class="container">
            <button class="btn btn-primary" onclick="main_content('content_list')">Kembali</button>
            <form class="row g-3" id="form_menu">
                <h1 style="font-weight: bold; text-align: center;">Ubah Status</h1>
               
                <select name="st"> 
                    <option value="waiting" {{$collection->status=="waiting"?'selected':''}}>Waiting</option>
                    <option value="proses" {{$collection->status=="proses"?'selected':''}}>Process</option>
                    <option value="selesai" {{$collection->status=="selesai"?'selected':''}}>Done</option>
                </select>

                <div class="col-12 d-flex justify-content-center mb-4">
                    <button id="button_menu" class="btn btn-primary" style="width: 15%;" onclick="handle_upload('#button_menu', '#form_menu', '{{route('status.update',$collection->id)}}', 'PATCH', 'submit' )" >Ubah</button>
                </div>
            </form>
        </div>
    </section>
</div>