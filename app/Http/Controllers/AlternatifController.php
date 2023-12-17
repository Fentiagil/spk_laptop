<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Alternatif::orderBy('id', 'asc')->get();

        return view('admin.alternatif', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:50',
            'layar' => 'required|string|max:50',
            'prosesor' => 'required|string|max:50',
            'RAM' => 'required|string|max:50',
            'penyimpanan' => 'required|string|max:50',
            'baterai' => 'required|string|max:10',
            'harga' => 'required|int|max:5'
            // Tambahkan validasi untuk input lainnya jika diperlukan
        ]);

        // Simpan data baru
        Alternatif::create($request->all());

        return redirect('/alternatif')->with('success', 'Data berhasil ditambahkan.');
    } catch (\Exception $e) {
        // Tangani kesalahan validasi atau kesalahan penyimpanan data
        return redirect('/alternatif')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Tampilkan halaman edit dengan data berdasarkan ID
        $alternatif = Alternatif::find($id);
        return view('admin.alternatif.edit', compact('alternatif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Proses update data berdasarkan ID
        $alternatif = Alternatif::find($id);
        $alternatif->update($request->all());

        return redirect()->route('indexAlternatif')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Proses hapus data berdasarkan ID
        $alternatif = Alternatif::find($id);
        $alternatif->delete();

        return redirect()->route('indexAlternatif')->with('success', 'Data berhasil dihapus.');
    }
}
