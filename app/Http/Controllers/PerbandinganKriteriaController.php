<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\PerbandinganKriteria;

class PerbandinganKriteriaController extends Controller
{

    public function getJumlahKriteria()
    {
        return Kriteria::count();
    }

    public function getListNamaPilihan($kriteria)
    {
        try {
            $pilihan = Kriteria::orderBy('id')->pluck('nama')->toArray();
        } catch (\Exception $e) {
            // Handle error jika terjadi
            return [];
        }

        return $pilihan;
    }

    public function index() {
        $n = $this->getJumlahKriteria();
        $pilihan = $this->getListNamaPilihan('kriteria');

        return view('admin.perbandinganKriteria', compact('n', 'pilihan'));
    }


    function getKriteriaID($no_urut) {
        try {
            // Ambil ID kriteria terurut menggunakan Eloquent
            $idKriteria = Kriteria::orderBy('id')->pluck('id')->toArray();
    
            if ($no_urut !== null) {
                // Ambil elemen ke-$no_urut dari array sebagai integer
                $result = isset($idKriteria[$no_urut]) ? (int)$idKriteria[$no_urut] : null;
            } 
    
            return $result;
        } catch (\Exception $e) {
            // Handle error jika terjadi
            return null;
        }
    }

    public function getNilaiPerbandinganKriteria($kriteria1, $kriteria2)
    {
        $id_kriteria1 = $this->getKriteriaID($kriteria1);
        $id_kriteria2 = $this->getKriteriaID($kriteria2);
        
        $query = DB::table('perbandingan_kriteria')
            ->select('nilai')
            ->where('kriteria1', $id_kriteria1)
            ->where('kriteria2', $id_kriteria2)
            ->first();
        
        if (!$query) {
            $nilai = 1;
        } else {
            $nilai = $query->nilai;
        }
        
        return $nilai;
        
    }

}
