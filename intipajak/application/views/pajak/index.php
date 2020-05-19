<div class ="container">
<?php if ($this->session->flashdata('flash-data')):?>
    <div class="row mt 4">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Objek Pajak <strong>Berhasil</strong> <?= $this->session->flashdata('flash-data'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class ="row mt-4">
<div class ="col-md-6">

   <a href="<?= base_url(); ?>pajak/tambah"class="btn btn-primary"> Tambah Data</a>
</div>
</div>

<div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Objek Pajak" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
 

    <div class ="row mt-3">
    <div class="col-md-6">
        <h2>Daftar Pajak</h2>

        <!-- alert -->
        <?php if(empty($objekpajak)): ?>
                <div class="alert alert-danger" role="alert">
                    Data Objek Pajak Tidak Ditemukan
                </div>
            <?php endif; ?>


        <ul class="list-group"> 
        <?php foreach($objekpajak as $objp):?>
        <li class="list-group-item"><?= $objp['nomorplat'];?>
        <a href="<?= base_url();?>pajak/hapus/<?= $objp['idobjekpajak'];?>"
        class="badge badge-danger float-right"
        onclick="return confirm('Yakin Data ini akan dihapus');">hapus</a>
        <a href="<?= base_url();?>pajak/edit/<?= $objp['idobjekpajak'];?>"
        class="badge badge-success float-right">edit</a>
        <a href="<?= base_url();?>pajak/detail/<?= $objp['idobjekpajak'];?>"
        class="badge badge-primary float-right">detail</a>
        
        </li>
        <?php endforeach; ?>
        </ul>
</div>
</div>
</div>