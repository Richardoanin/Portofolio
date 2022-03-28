 <table class="table table-dark table-striped" style="margin-bottom: 270px;">
                <thead>
                    <tr class="table-dark">
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Menu</th>
                        <th>Catatan</th>
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
                    <form id="form_status">
                        @foreach ($collection as $item)
                        <tr class="">
                            <td>{{$i++}}</td>
                            <td>{{$item->users->name}}</td>
                            <td>{{$item->menu->nama}}</td>
                            <td>{{$item->catatan}}</td>
                            <td>{{$item->subtotal}}</td>
                            @if (!Auth::user())
                            
                            @elseif (Auth::user() && Auth::user()->role=='pelanggan')
                            <td>{{$item->status}}</td>
                            
                            @else
                            
                            <td>
                                {{$item->status}}
                            </td>
                            @endif
                            
                            @if (!Auth::user())

                            @elseif (Auth::user()==null)
                            @elseif (Auth::user()->role =='pelanggan')

                            @else
                            <td>
                                <button class="btn btn-warning" id="tombol_edit" onclick="load_input('{{route('status.edit',$item->id)}}');">Update</button>
                                <button type="button" class="btn btn-danger" onclick="handle_delete('{{route('status.destroy',$item->id)}}')">Delete</button>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </form>
                </tbody>
            </table>