<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $data = Kriteria::orderBy('id', 'asc')->get();

        return view('admin.kriteria', ['data' => $data]);
    }

    public function create()
    {
        // Tampilkan halaman tambah
        return view('admin.kriteria.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:50',
            // Tambahkan validasi untuk input lainnya jika diperlukan
        ]);

        // Simpan data baru
        Kriteria::create($request->all());

        return redirect('/kriteria')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Tampilkan halaman edit dengan data berdasarkan ID
        $kriteria = Kriteria::find($id);
        return view('admin.kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        // Proses update data berdasarkan ID
        $kriteria = Kriteria::find($id);
        $kriteria->update($request->all());

        return redirect()->route('indexKriteria')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Proses hapus data berdasarkan ID
        $kriteria = Kriteria::find($id);
        $kriteria->delete();

        return redirect()->route('indexKriteria')->with('success', 'Data berhasil dihapus.');
    }

    public function showTabelPerbandingan (Request $request){

        

    }
}
