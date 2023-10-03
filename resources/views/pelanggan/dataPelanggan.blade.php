<table class="table table-compact table stripped" id="tbl-pelanggan">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggan as $p)
        <tr>
            <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
            <td>{{ $p->nama_pelanggan }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->no_telp }}</td>
            <td>
                <button class="btn" data-toggle="modal" data-target="#modalFormPelanggan" data-mode="edit" 
                data-id="{{ $p->id }}" data-nama_pelanggan="{{ $p->nama_pelanggan }}" 
                data-alamat="{{ $p->alamat }}"  data-email="{{ $p->email }}" data-no_telp="{{ $p->no_telp }}">
                <i class="fas fa-edit text-success"></i>
                </button>
                <form method="post" action="{{ route('pelanggan.destroy', $p->id) }}" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-delete" data-nama_pelanggan="{{ $p->nama_pelanggan }}">
                        <i class="fas fa-trash text-danger"></i>
                    </button>
            </td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>