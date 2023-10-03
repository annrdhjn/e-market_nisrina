@extends('templates.layout')

@push('style')

@endpush

@section('content')
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Barang</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormBarang">
    Tambah Barang
    </button>
    @include('barang.dataBarang')
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@include('barang.formBarang')
</section>

@endsection

@push('script')
<script>
  $(function(){
    $('#tbl-barang').DataTable()
 })
   //dialog delete
 $('.btn-delete').on('click', function(e){
  let nama_barang = $(this).closest('tr').find('td:eq(1)').text();
  Swal.fire({
      icon: 'error',
      title: 'Hapus Data',
      html: `Apakah data <b>${nama_barang}</b> akan dihapus?`,
      confirmButtonText: 'Ya',
      denyConfirmText: 'Tidak',
      showDenyButton: true,
      focusConfirm: false
    }).then((result)=>{
      if(result.isConfirmed) $(e.target).closest('form').submit()
      else Swal.close()
    })
  })
  //dialog edit
  $('#modalFormBarang').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nama_barang = btn.data('nama_barang')
            const satuan = btn.data('satuan')
            const harga_jual = btn.data('harga_jual')
            const stock_brg = btn.data('stock_brg')
            const ditarik = btn.data('ditarik')
            const id = btn.data('id')
            const modal = $(this)
            // console.log($(this))
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data barang')
                modal.find('#nama_barang').val(nama_barang)
                modal.find('#satuan').val(satuan)
                modal.find('#harga_jual').val(harga_jual)
                modal.find('#stock_brg').val(stock_brg)
                modal.find('#ditarik').val(ditarik)
                modal.find('.modal-body form').attr('action', '{{ url("barang") }}/' + id)
                modal.find('#method').html('@method("PATCH")')
                console.log(nama_barang)
            } else {
                modal.find('.modal-title').text('Input Data barang')
                modal.find('#nama_barang').val('')
                modal.find('#satuan').val('')
                modal.find('#harga_jual').val('')
                modal.find('#stock_brg').val('')
                modal.find('#ditarik').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url("barang") }}')
            }
        })
 $('.alert-success').fadeTo(1000, 500).slideUp(500, function(){
    $('.alert-success').slideUp(500)
 })

 $('#error-alert').fadeTo(1000, 500).slideUp(500, function(){
    $('error-alert').slideUp(500)
 })


</script>
@endpush