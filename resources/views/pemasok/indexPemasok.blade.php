@extends('templates.layout')

@push('style')

@endpush

@section('content')
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Pemasok</h3>

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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormPemasok">
    Tambah Pemasok
    </button>
    @include('pemasok.dataPemasok')
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@include('pemasok.formPemasok')
</section>

@endsection

@push('script')
<script>
  $(function(){
    $('#tbl-pemasok').DataTable()
 })
   //dialog delete
 $('.btn-delete').on('click', function(e){
  let nama_pemasok = $(this).closest('tr').find('td:eq(1)').text();
  Swal.fire({
      icon: 'error',
      title: 'Hapus Data',
      html: `Apakah data <b>${nama_pemasok}</b> akan dihapus?`,
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
  $('#modalFormPemasok').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nama_pemasok = btn.data('nama_pemasok')
            const id = btn.data('id')
            const modal = $(this)
            // console.log($(this))
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data Pemasok')
                modal.find('#nama_pemasok').val(nama_pemasok)
                modal.find('.modal-body form').attr('action', '{{ url("pemasok") }}/' + id)
                modal.find('#method').html('@method("PATCH")')
                console.log(nama_pemasok)
            } else {
                modal.find('.modal-title').text('Input Data Pemasok')
                modal.find('#nama_pemasok').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url("pemasok") }}')
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