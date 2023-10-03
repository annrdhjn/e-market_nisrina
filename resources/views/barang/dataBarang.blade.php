<table class="table table-compact table stripped" id="tbl-barang">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Satuan Barang</th>
            <th>Harga Jual</th>
            <th>Stock Barang</th>
            <th>Ditarik</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barang as $p)
        <tr>
            <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
            <td>{{ $p->nama_barang }}</td>
            <td>{{ $p->satuan }}</td>
            <td>{{ $p->harga_jual }}</td>
            <td>{{ $p->stock_brg }}</td>
            <td>{{ $p->ditarik }}</td>
            <td>
                <button class="btn" data-toggle="modal" data-target="#modalFormBarang" data-mode="edit" 
                data-id="{{ $p->id }}" data-nama_barang="{{ $p->nama_barang }}" data-satuan="{{ $p->satuan }}" 
                data-harga_jual="{{ $p->harga_jual }}" data-stock_brg="{{ $p->stock_brg }}" data-ditarik="{{ $p->ditarik }}">
                <i class="fas fa-edit text-success"></i>
                </button>
                <form method="post" action="{{ route('barang.destroy', $p->id) }}" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-delete" data-nama_barang="{{ $p->nama_barang }}">
                        <i class="fas fa-trash text-danger"></i>
                    </button>
            </td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>