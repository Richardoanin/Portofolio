<table class="table table-dark table-striped">
    <thead>
        <tr class="table-dark">
            <th>No</th>
            <th>Nama Kontak</th>
            <th>Link</th>
            <th>Logo</th>
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
                <td>{{$item->sosmed}}</td>
                <td>{{$item->link}}</td>
                <td>
                    <img src="{{asset($item->takeImage)}}" style="max-width: 100px;max-height:100px;">
                </td>
                <td>
                    <button class="btn btn-warning" id="tombol_edit" onclick="load_input('{{route('contact.edit',$item->id)}}');">Edit</button>
                    <button type="button" class="btn btn-danger" onclick="handle_delete('{{route('contact.destroy',$item->id)}}')">Delete</button>
                </td>
            </tr>
            @endforeach
        </form>
    </tbody>
</table>