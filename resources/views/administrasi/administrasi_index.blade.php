@extends('layouts.sbadmin2')
<style>
    .biaya-display {
        display: inline-block;
        text-align: right;
        min-width: 100px;
    }
</style>
@section('isinya')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $judul }}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pasien</th>
                                    <th>Nama Dokter</th>
                                    <th>Biaya</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($administrasi as $c)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d M Y', strtotime($c->tanggal)) }}</td>
                                        <td>{{ $c->pasien->nama_pasien }}</td>
                                        <td>{{ $c->dokter->nama_dokter }}</td>
                                        <td>Rp. <span
                                                class="biaya-display">{{ number_format($c->biaya, 0, ',', '.') }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ url('administrasi/' . $c->id . '/edit', []) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ url('administrasi/' . $c->id, []) }}" method="post"
                                                class="d-inline" onsubmit="return confirm('Apakah Yakin Dihapus?')">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $administrasi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
