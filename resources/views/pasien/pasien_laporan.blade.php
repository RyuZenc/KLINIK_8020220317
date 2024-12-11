<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pasien</title>

    <!-- Scripts-->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center">
                    <h2>{{ $judul }}</h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Pasien</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Nomor Hp</th>
                                <th>Alamat</th>
                                <th>Dibuat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $a)
                                <tr>
                                    <td>{{ $a->id }}</td>
                                    <td>{{ $a->kode_pasien }}</td>
                                    <td>{{ $a->nama_pasien }}</td>
                                    <td>{{ $a->jenis_kelamin }}</td>
                                    <td>{{ $a->status }}</td>
                                    <td>{{ $a->nomor_hp }}</td>
                                    <td>{{ $a->alamat }}</td>
                                    <td>{{ $a->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <h5>Mengetahui</h5>
                <br>
                <br>
                <br>
                <h5>Admin</h5>
            </div>
        </div>
    </div>
</body>

</html>
