<div class="container">
    <div class="row mt 4">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Pembayaran Pajak <strong>Berhasil</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>

                </tr>
            </thead>
        </table>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Pembayaran Pajak" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-striped" id="list_petugas">
        <thead>
            <tr>
                <th scope="col">no urut</th>
                <th scope="col">id bayar</th>
                <th scope="col">nama </th>
                <th scope="col">plat nomor</th>
                <th scope="col">petugas </th>
                <th scope="col">pembayaran</th>
                <th scope="col">tanggal Lunas</th>
            </tr>
        </thead>
        <tbody>
            <?php $loop = 1;
            foreach ($bayar as $jn) : ?>
                <tr>
                    <th scope="row"><?= $loop++ ?></th>
                    <td><?= $jn['nama'] ?> - <?= $jn['idbayar'] ?></td>
                    <td> <?= $jn['nama'] ?></td>
                    <td> <?= $jn['nomorplat'] ?></td>
                    <td> <?= $jn['namapetugas'] ?></td>
                    <td> <?= $jn['besarpajak'] ?></td>
                    <td> <?= $jn['tanggal'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>



    <?php ?>

</div>