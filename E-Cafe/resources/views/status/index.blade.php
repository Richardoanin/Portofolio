@extends('layouts.app')

@section('content')

<!-- STATUS PESANAN -->
<section class="ftco-section mt-5">
    <div class="container">
        <h3 class="row justify-content-center"> Status Pemesanan</h3>
        <div class="container mt-3">
            <table class="table table-dark table-striped">
                <thead>
                    <tr class="table-dark">
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Menu</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        @if (!Auth::user())

                        @elseif(Auth::user()->role ==null)
                        @elseif(Auth::user()->role =='pelanggan');

                        @else

                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;    
                    @endphp
                    @foreach ($collection as $item)
                    <form id="form_pelayan">
                        <tr class="">
                            <td>{{$i++}}</td>
                            <td>{{$item->users->name}}</td>
                            <td>{{$item->menu->nama}}</td>
                            <td>{{$item->subtotal}}</td>
                            @if (!Auth::user())

                            @elseif (Auth::user() ==null)
                            @elseif (Auth::user()->role=='pelanggan')
                            <td>{{$item->status}}</td>

                            @else
                            
                            <td>
                            <select name="status"> 
                                <option value="waiting" {{$item->status=="waiting"?'selected':''}}>Waiting</option>
                                <option value="proses" {{$item->status=="proses"?'selected':''}}>Process</option>
                                <option value="selesai" {{$item->status=="selesai"?'selected':''}}>Done</option>
                            </select>
                            </td>
                            @endif
                            
                            @if (!Auth::user())

                            @elseif (Auth::user()==null)
                            @elseif (Auth::user()->role =='pelanggan')

                            @else
                            <td>
                                <button class="btn btn-warning" id="tombol_edit" onclick="handle_save('#tombol_edit', '#form_pelayan', '{{route('status.update', $item->id)}}', 'POST', 'submit' )">Update</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                            @endif
                        </tr>
                    </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@section('custom_js')
    <script> 
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    </script> 
@endsection


@endsection