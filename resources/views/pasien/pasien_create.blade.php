@extends('layouts.sbadmin2')
@section('isinya')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Tambah Data Pasien
                    </div>
                    <div class="card-body">
                        <form action="{{ url('pasien') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="kode_pasien">Kode Pasien</label>
                                <input id="kode_pasien" class="form-control" type="text" name="kode_pasien"
                                    value="{{ old('kode_pasien') }}">
                                <span class="text-danger">{{ $errors->first('kode_pasien') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="nama_pasien">Nama Pasien</label>
                                <input id="nama_pasien" class="form-control" type="text" name="nama_pasien"
                                    value="{{ old('nama_pasien') }}">
                                <span class="text-danger">{{ $errors->first('nama_pasien') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select id="jenis_kelamin" class="form-control" name="jenis_kelamin">
                                    @foreach ($list_kelamin as $a)
                                        <option value="{{ $a }}" @selected($a == old('jenis_kelamin'))>{{ $a }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="form-control" name="status">
                                    @foreach ($list_status as $a)
                                        <option value="{{ $a }}" @selected($a == old('status'))>{{ $a }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input id="no_hp" class="form-control" type="text" name="nomor_hp"
                                    value="{{ old('nomor_hp') }}">
                                <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" class="form-control" name="alamat">
                                    {{ old('alamat') }}</textarea>
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection