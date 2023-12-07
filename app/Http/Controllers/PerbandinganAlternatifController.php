<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;

class PerbandinganAlternatifController extends Controller
{
    public function getJumlahAlternatif()
    {
        return Alternatif::count();
    }

    public function getListNamaPilihan($alternatif)
    {
        try {
            $pilihan = Alternatif::orderBy('id')->pluck('nama')->toArray();
        } catch (\Exception $e) {
            // Handle error jika terjadi
            return [];
        }

        return $pilihan;
    }

    function getKriteriaNama($no_urut) {
        try {
            $nama = Kriteria::orderBy('id')->pluck('nama')->toArray();
            return $nama[($no_urut - 1)]; // Sesuaikan dengan indeks array, karena array dimulai dari 0
        } catch (\Exception $e) {
            // Handle error jika terjadi
            return null;
        }
    }

    public function navbarAdmin()
    {
        $n = $this->getJumlahAlternatif();
        $pilihan = $this->getListNamaPilihan('alternatif');
        $jenis = request('jenis');
        $namaK= $this->getKriteriaNama($jenis-1);

        return view('admin.perbandinganAlternatif', compact('n', 'pilihan', 'jenis', 'namaK'));
    }

    public function index($jenis)
    {
        $n = $this->getJumlahAlternatif();
        $pilihan = $this->getListNamaPilihan('alternatif');
        $jenis = request('jenis');
        $namaK= $this->getKriteriaNama($jenis-1);

        return view('admin.perbandinganAlternatif', compact('n', 'pilihan', 'jenis', 'namaK'));
    }

    public function getAlternatifID($no_urut)
    {
        try {
            // Ambil ID Alternatif terurut menggunakan Eloquent
            $idAlternatif = Alternatif::orderBy('id')->pluck('id')->toArray();

            if ($no_urut !== null) {
                // Ambil elemen ke-$no_urut dari array sebagai integer
                $result = isset($idAlternatif[$no_urut]) ? (int)$idAlternatif[$no_urut] : null;
            } 

            return $result;
        } catch (\Exception $e) {
            // Handle error jika terjadi
            return null;
        }
    }

    public function getNilaiPerbandinganAlternatif($alternatif1, $alternatif2, $pembanding)
    {
        $id_alternatif1 = $this->getAlternatifID($alternatif1);
        $id_alternatif2 = $this->getAlternatifID($alternatif2);
        $id_pembanding = $this->getAlternatifID($pembanding);

        $query = DB::table('perbandingan_alternatif')
            ->select('nilai')
            ->where('alternatif1', $id_alternatif1)
            ->where('alternatif2', $id_alternatif2)
            ->where('pembanding', $id_pembanding)
            ->first();

        if (!$query) {
            $nilai = 1;
        } else {
            $nilai = $query->nilai;
        }

        return $nilai;
    }
}
