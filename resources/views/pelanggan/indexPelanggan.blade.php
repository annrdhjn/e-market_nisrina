@extends('templates.layout')

@push('style')

@endpush

@section('content')
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Pelanggan</h3>

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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormPelanggan">
    Tambah Pelanggan
    </button>
    @include('pelanggan.dataPelanggan')
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@include('pelanggan.formPelanggan')
</section>

@endsection

@push('script')
<script>
  $(function(){
    $('#tbl-pelanggan').DataTable()
 })
   //dialog delete
 $('.btn-delete').on('click', function(e){
  let nama_pelanggan = $(this).closest('tr').find('td:eq(1)').text();
  Swal.fire({
      icon: 'error',
      title: 'Hapus Data',
      html: `Apakah data <b>${nama_pelanggan}</b> akan dihapus?`,
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
  $('#modalFormPelanggan').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nama_pelanggan = btn.data('nama_pelanggan')
            const alamat = btn.data('alamat')
            const no_telp = btn.data('no_telp')
            const id = btn.data('id')
            const modal = $(this)
            // console.log($(this))
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data Pelanggan')
                modal.find('#nama_pelanggan').val(nama_pelanggan)
                modal.find('#alamat').val(alamat)
                modal.find('#no_telp').val(no_telp)
                modal.find('.modal-body form').attr('action', '{{ url("pelanggan") }}/' + id)
                modal.find('#method').html('@method("PATCH")')
                console.log(nama_pelanggan)
            } else {
                modal.find('.modal-title').text('Input Data Pelanggan')
                modal.find('#nama_pelanggan').val('')
                modal.find('#alamat').val('')
                modal.find('#no_telp').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url("pelanggan") }}')
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