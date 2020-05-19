@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h2>Daftar Pajak</h2>
            </div>

            <table class="table table-striped" id="listPembayaran">
                <thead>
                    <tr>
                        <th scope="col">id pajak</th>
                        <th scope="col">merk </th>
                        <th scope="col">tipe</th>
                        <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pajak as $pjk)
                    <tr>
                        <td>{{ $pjk['idobjekpajak']}}</td>
                        <td>{{ $pjk['merk']}}</td>
                        <td>{{ $pjk['type']}}</td>

                        <td>
                            <a href="{{ url('/pajak/{id}') }}" class="btn btn-xs btn-danger">Hapus</a>
                        </td>
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