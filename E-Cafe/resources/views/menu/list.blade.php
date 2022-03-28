<div class="single-menu">
    <div class="row">
        @foreach ($collection as $item)
        <div class="col-md-6" style="margin-bottom: 30px;">
            <div class="menu-content">
            <img src="{{asset($item->takeImage)}}" style="max-width:300px;max-height:150px;" class="img-responsive img-fluid">
            <h4>{{$item->nama}} <span class="text-dark">Rp. {{$item->harga}}</span></h4>
            <p>{{$item->deskripsi}}</p>
            @if (Auth::user())
                <button type="button" class="btn btn-primary" style="width: 90px;" onclick="load_input('{{route('order.create',$item->id)}}')">Pesan</button>
            @else
                <button type="button" class="btn btn-primary" style="width: 90px;" onclick="window.location.href='{{route('login')}}'">Pesan</button>
            @endif

            @if(Auth::user() && Auth::user()->role == 'owner' && $item->id)
                <button type="button" class="btn btn-warning" style="width: 90px;" onclick="load_input('{{route('menu.edit',$item->id)}}')">Edit</button>
                <button type="button" class="btn btn-danger" style="width: 90px;" onclick="handle_delete('{{route('menu.destroy',$item->id)}}')">Hapus</button>
            @endif
            </div>
        </div>
        @endforeach
    </div>
</div>