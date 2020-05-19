<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
  <div class="card-header">
    Detail Data Wajib Pajak
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $wajibpajak['nama']; ?></h5>
    <p class="card-text">
        <label for=""><b> alamat: </b></label>
        <?= $wajibpajak['alamat']; ?></p>
    <p class="card-text">
        <label for=""><b>  no telp: </b></label>
        <?= $wajibpajak['notelp']; ?></p>
    <a href="<?= base_url();?>wajibpajak/indexwajibpajak" class="btn btn-primary">Kembali</a>
        </div>
        </div>
        </div>
    </div>
</div>
