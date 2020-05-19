<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
  <div class="card-header">
    Detail Data Objek Pajak
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $objekpajak['merk']; ?></h5>
    <p class="card-text">
        <label for=""><b> noplat: </b></label>
        <?= $objekpajak['nomorplat']; ?></p>
    <p class="card-text">
        <label for=""><b>  besar pajak: </b></label>
        <?= $objekpajak['besarpajak']; ?></p>
    <p class="card-text">
        <label for=""><b>  jenis kendaraan: </b></label>
        <?= $objekpajak['jeniskendaraan']; ?></p>
    <a href="<?= base_url();?>pajak" class="btn btn-primary">Kembali</a>
        </div>
        </div>
        </div>
    </div>
</div>

