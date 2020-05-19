<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Form Edit Data Wajib Pajak
				</div>
				<div class="card-body">
					<?php if (validation_errors()):?>
						<div class="alert alert-danger" role="alert">
					<?= validation_errors();?>
				</div>
			<?php endif ?>
					<form action="" method="post">
                    <input type="hidden" name="idnpwp" value="<?= $wajibpajak['idnpwp']; ?>">
						<div class="form-group">
							<label for="nama">nama</label>
							<input type="text" class="form-control" 
                            id="nama"
							name="nama"
                            value="<?= $wajibpajak['nama'];?>">
						</div>
						<div class="form-group">
							<label for="idobjekpajakfk">id objek pajak fk</label>
							<input type="text" class="form-control" id="idobjekpajakfk" name="idobjekpajakfk"
                            value="<?= $wajibpajak['idobjekpajakfk'];?>">
						</div>
						<div class="form-group">
							<label for="alamat">alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat"
                            value="<?= $wajibpajak['alamat'];?>">
						</div>
						<div class="form-group">
							<label for="notelp">no telp</label>
							<input type="text" class="form-control" id="notelp" name="notelp"
                            value="<?= $wajibpajak['notelp'];?>">
						</div>
						<div class="dropdown">
							<label for="alamat">Status</label>
						  <select name="status" class="form-control">
                            <option selected>Choose Status</option>
                            <option value="0">Tidak Aktif</option>
                            <option value="1" >Aktif</option>
                        </select>
						</div>
						<button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>