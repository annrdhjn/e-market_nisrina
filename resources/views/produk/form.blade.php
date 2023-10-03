<!-- Modal -->
<div class="modal fade" id="modalFormProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form method="post" action="produk">
        @csrf
        <div id="method"></div>
        <div class="form-group row">
            <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="nama_produk" value="" name="nama_produk">
            </div>
        </div>
        <div class="form-group row">
            <label for="kode" class="col-sm-4 col-form-label">Kode</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="kode" value="" name="kode">
            </div>
        </div>
        <div class="form-group row">
            <label for="stock" class="col-sm-4 col-form-label">Stock</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="stock" value="" name="stock">
            </div>
        </div>
        <div class="form-group row">
            <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
            <div class="col-sm-8">
            <select class="form-select form-select-lg mb-7" aria-label=".form-select-lg example">
            <option selected>Open this select menu</option>
            <option value="1">Makanan</option>
            <option value="2">Minuman</option>
            <option value="3">Sabun</option>
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-4 col-form-label">Harga</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="harga" value="" name="harga">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>