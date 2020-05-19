<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title><?= $title ?></title>

    <!-- <title>Hello, World!</title -->
    <title><?= $title ?></title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="htpps://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css" />
    <script type="text/javascript" src="htpps://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #7df06c;">
        <div class='container'>
            <a class="navbar-brand" href="#">Perpajakan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>Home/laporan_pdf">Cetak Laporan</a>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>api/pajak">Data Objek Pajak</a>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>api/wajibpajak/indexwajibpajak">Data Wajib Pajak</a>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>api/petugaspajak">Data petugas Pajak</a>
                    <?php
                    if ($this->session->userdata('nama')) {
                    ?>
                        <a class="nav-item nav-link" href="<?= base_url(); ?>login_control/logout">LogOut</a>
                    <?php
                    } else {
                    ?>
                        <a class="nav-item nav-link" href="<?= base_url(); ?>login_control/index">Login</a>
                    <?php } ?>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>about">About</a>
                    <!--a class="nav-item nav-link disabled" href="#">Disabled</a-->
                </div>
            </div>
    </nav>