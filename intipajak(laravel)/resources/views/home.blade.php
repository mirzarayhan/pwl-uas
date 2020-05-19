@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h2>Daftar Pembayaran</h2>
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
            <table class="table table-striped" id="listPembayaran">
                <thead>
                    <tr>
                        <th scope="col">id bayar</th>
                        <th scope="col">nama </th>
                        <th scope="col">plat nomor</th>
                        <th scope="col">petugas </th>
                        <th scope="col">pembayaran</th>
                        <th scope="col">tanggal Lunas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayaran as $bayar)
                    <tr>
                        <td>{{ $bayar['idbayar']}}</td>
                        <td>{{ $bayar['nama']}}</td>
                        <td>{{ $bayar['nomorplat']}}</td>
                        <td>{{ $bayar['namapetugas']}}</td>
                        <td>{{ $bayar['besarpajak']}}</td>
                        <td>{{ $bayar['tanggal']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection