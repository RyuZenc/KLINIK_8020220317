<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasien'] = \App\Models\Pasien::paginate(5);
        $data['judul'] = 'Data Pasien';
        return view('pasien/pasien_index', $data);
    }

    public function cari(Request $request)
    {
        $cari = $request->get('search');
        $data['pasien'] = \App\Models\Pasien::where('nama_pasien', 'like', '%' . $cari . '%')
            ->orwhere('alamat', 'like', '%' . $cari . '%')->paginate(5);

        $data['judul'] = 'Data-Data Pasien';
        return view('pasien/pasien_index', $data);
    }

    public function registrasi()
    {
        $data['list_jk'] = ['Pria', 'Wanita'];
        return view('registrasi_form', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_kelamin'] = ['Laki-Laki', 'Perempuan'];
        $data['list_status'] = ['Belum Menikah', 'Sudah Menikah'];
        return view('pasien/pasien_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'kode_pasien' => 'required|unique:pasiens,kode_pasien',
            'nama_pasien' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'status' => 'required|string',
            'nomor_hp' => 'required',
            'alamat' => 'required|string',
        ]);

        $pasien = new \App\Models\Pasien();
        $pasien->kode_pasien = $request->kode_pasien;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->status = $request->status;
        $pasien->nomor_hp = $request->nomor_hp;
        $pasien->alamat = $request->alamat;
        $pasien->save();

        return back()->with('pesan', 'Data sudah Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pasien'] = \App\Models\Pasien::findOrFail($id);
        $data['list_kelamin'] = ['Laki-Laki', 'Perempuan'];
        $data['list_status'] = ['Aktif', 'Tidak Aktif'];
        return view('pasien/pasien_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_pasien' => 'required|unique:pasiens,kode_pasien,' . $id,
            'nama_pasien' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'status' => 'required|string',
            'nomor_hp' => 'required',
            'alamat' => 'required|string',
        ]);

        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->kode_pasien = $request->kode_pasien;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->status = $request->status;
        $pasien->nomor_hp = $request->nomor_hp;
        $pasien->alamat = $request->alamat;

        $pasien->save();

        return redirect('/pasien')->with('pesan', 'Data sudah DiUpdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->delete();
        return back()->with('pesan', 'Data sudah Dihapus');
    }

    public function laporan()
    {
        $data['pasien'] = \App\Models\Pasien::all();
        $data['judul'] = 'Laporan Data Pasien';
        return view('pasien/pasien_laporan', $data);
    }
}
