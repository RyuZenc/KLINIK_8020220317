@extends('layouts.sbadmin2')
@section('isinya')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tambah data dokter
                    </div>
                    <div class="card-body">
                        <form action="{{ url('dokter', []) }}" method="POST">

                            @method('POST')
                            @csrf

                            <div class="form-group">
                                <label for="kode_dokter">Kode Dokter</label>
                                <input id="kode_dokter" class="form-control" type="text" name="kode_dokter"
                                    value="{{ old('kode_dokter') }}">
                                <span class="text-danger">{{ $errors->first('kode_dokter') }}</span>

                            </div>

                            <div class="form-group">
                                <label for="nama_dokter">Nama Dokter</label>
                                <input id="nama_dokter" class="form-control" type="text" name="nama_dokter"
                                    value="{{ old('nama_dokter') }}">
                                <span class="text-danger">{{ $errors->first('nama_dokter') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="spesialis">Spesialis</label>
                                <select id="spesialis" class="form-control" name="spesialis">
                                    @foreach ($list_sp as $a)
                                        <option value="{{ $a }}" @selected($a == old('spesialis'))>{{ $a }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('spesialis') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input id="no_hp" class="form-control" type="text" name="nomor_hp"
                                    value="{{ old('nomor_hp') }}">
                                <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                            </div>

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
