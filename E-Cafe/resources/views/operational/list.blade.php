<table class="table table-dark table-striped">
    <thead>
        <tr class="table-dark">
            <th>No</th>
            <th>Jam Buka</th>
            <th>Jam Tutup</th>
            <th>Keterangan</th>
            <th>Aksi</th>
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
                <td>{{$item->open}}</td>
                <td>{{$item->close}}</td>
                <td>{{$item->keterangan}}</td>
                <td>
                    <button class="btn btn-warning" id="tombol_edit" onclick="load_input('{{route('operational.edit',$item->id)}}');">Edit</button>
                    <button type="button" class="btn btn-danger" onclick="handle_delete('{{route('operational.destroy',$item->id)}}')">Delete</button>
                </td>
            </tr>
            @endforeach
        </form>
    </tbody>
</table>