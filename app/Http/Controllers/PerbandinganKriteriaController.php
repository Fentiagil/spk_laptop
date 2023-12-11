<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Ranking;
use App\Models\PerbandinganKriteria;
use App\Models\PVKriteria; 
use App\Models\PVAlternatif; 

class PerbandinganKriteriaController extends Controller
{

    public function getJumlahKriteria()
    {
        return Kriteria::count();
    }

    public function getJumlahAlternatif()
    {
        return Alternatif::count();
    }

    public function getListNamaPilihanA($alternatif)
    {
        try {
            $pilihan = Alternatif::orderBy('id')->pluck('nama')->toArray();
        } catch (\Exception $e) {
            // Handle error jika terjadi
            return [];
        }

        return $pilihan;
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

    public function getKriteriaNama($no_urut)
    {
        try {
            // Ambil nama terurut menggunakan Eloquent
            $namaKriteria = Kriteria::orderBy('id')->pluck('nama')->toArray();
    
            if ($no_urut !== null) {
                // Ambil elemen ke-$no_urut dari array sebagai integer
                $result = isset($namaKriteria[$no_urut]) ? $namaKriteria[$no_urut] : null;
            } 
    
            return $result;
        } catch (\Exception $e) {
            // Handle error jika terjadi
            return null;
        }
    }

    public function getAlternatifNama($no_urut)
    {
        try {
            // Ambil nama terurut menggunakan Eloquent
            $namaAlternatif = Alternatif::orderBy('id')->pluck('nama')->toArray();
    
            if ($no_urut !== null) {
                // Ambil elemen ke-$no_urut dari array sebagai integer
                $result = isset($namaAlternatif[$no_urut]) ? $namaAlternatif[$no_urut] : null;
            } 
    
            return $result;
        } catch (\Exception $e) {
            // Handle error jika terjadi
            return null;
        }
    }

    public function index() {
        $n = $this->getJumlahKriteria();
        $pilihan = $this->getListNamaPilihan('kriteria');

        return view('admin.perbandinganKriteria', compact('n', 'pilihan'));
    }

    public function indexA($jenis) {
        $jenis = request('jenis');
        $n = $this->getJumlahAlternatif();
        $pilihan = $this->getListNamaPilihanA('alternatif');
    
        return view('admin.perbandinganAlternatif', compact('n', 'pilihan', 'jenis'));
    }

    public function indexR() {
        $jmlAlternatif = $this->getJumlahAlternatif();
        $jmlKriteria = $this->getJumlahKriteria();
        $nilai = array();

        // Mendapatkan nilai tiap alternatif
        for ($x = 0; $x <= ($jmlAlternatif-1); $x++) {
            // Inisialisasi
            $nilai[$x] = 0;

            for ($y = 0; $y <= ($jmlKriteria-1); $y++) {
                $id_alternatif = $this->getAlternatifID($x);
                $id_kriteria = $this->getKriteriaID($y);

                $pv_alternatif	= $this->getAlternatifPV($id_alternatif,$id_kriteria);
		        $pv_kriteria	= $this->getKriteriaPV($id_kriteria);

                $nilai[$x] += ($pv_alternatif * $pv_kriteria);
            }
        }

        // Update nilai ranking
        for ($i = 0; $i <= ($jmlAlternatif-1); $i++) {
            $id_alternatif = $this->getAlternatifID($i);

            Ranking::updateOrInsert(
                ['id_alternatif' => $id_alternatif],
                ['nilai' => $nilai[$i]]
            );
        }
        

        $results = Alternatif::join('ranking', 'alternatif.id', '=', 'ranking.id_alternatif')
                ->orderBy('ranking.nilai', 'DESC')
                ->select('alternatif.id', 'alternatif.nama', 'ranking.nilai')
                ->get();
    
        return view('admin.ranking', compact('jmlAlternatif', 'jmlKriteria', 'nilai', 'pv_kriteria', 'pv_alternatif', 'results' ));
    }


    public function getKriteriaPV($id_kriteria)
    {
        // mencari priority vector kriteria
        $pvKriteria = PVKriteria::where('id_kriteria', $id_kriteria)->value('nilai');

        return $pvKriteria;
    }

    public function getAlternatifPV($id_alternatif, $id_kriteria)
    {
        $pvAlternatif = PVAlternatif::where([
            'id_alternatif' => $id_alternatif,
            'id_kriteria'   => $id_kriteria,
        ])->value('nilai');

        return $pvAlternatif;
    }

    public function getKriteriaID($no_urut) {
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

    public function getAlternatifID($no_urut) {
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

    public function getNilaiPerbandinganAlternatif($alternatif1, $alternatif2, $pembanding)
    {
        $id_alternatif1 = $this->getAlternatifID($alternatif1);
        $id_alternatif2 = $this->getAlternatifID($alternatif2);
        $id_pembanding = $this->getKriteriaID($pembanding);

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

    public function inputDataPerbandinganKriteria($kriteria1, $kriteria2, $nilai)
    {
        $id_kriteria1 = $this->getKriteriaID($kriteria1);
        $id_kriteria2 = $this->getKriteriaID($kriteria2);

        $existingRecord = DB::table('perbandingan_kriteria')
            ->where('kriteria1', $id_kriteria1)
            ->where('kriteria2', $id_kriteria2)
            ->first();

        if (!$existingRecord) {
            DB::table('perbandingan_kriteria')->insert([
                'kriteria1' => $id_kriteria1,
                'kriteria2' => $id_kriteria2,
                'nilai' => $nilai,
            ]);
        } else {
            DB::table('perbandingan_kriteria')
                ->where('kriteria1', $id_kriteria1)
                ->where('kriteria2', $id_kriteria2)
                ->update(['nilai' => $nilai]);
        }
    }

    public function inputKriteriaPV($id_kriteria, $pv)
    {
        $existingRecord = DB::table('pv_kriteria')
            ->where('id_kriteria', $id_kriteria)
            ->first();

        if (!$existingRecord) {
            DB::table('pv_kriteria')->insert([
                'id_kriteria' => $id_kriteria,
                'nilai' => $pv,
            ]);
        } else {
            DB::table('pv_kriteria')
                ->where('id_kriteria', $id_kriteria)
                ->update(['nilai' => $pv]);
        }
    }

    public function getEigenVector($matrik_a, $matrik_b, $n)
    {
        $eigenvektor = 0;

        for ($i = 0; $i <= ($n - 1); $i++) {
            $eigenvektor += ($matrik_a[$i] * (($matrik_b[$i]) / $n));
        }

        return $eigenvektor;
    }

    public function getConsIndex($matrik_a, $matrik_b, $n)
    {
        $eigenvektor = $this->getEigenVector($matrik_a, $matrik_b, $n);
        $consindex = ($eigenvektor - $n) / ($n - 1);

        return $consindex;
    }

    public function getNilaiIR($jmlKriteria)
    {
        try {
            $result = DB::table('ir')
                ->select('nilai')
                ->where('jumlah', $jmlKriteria)
                ->first();

            if ($result) {
                $nilaiIR = $result->nilai;
            } else {
                // Nilai default jika data tidak ditemukan
                $nilaiIR = 0; // Gantilah dengan nilai default yang sesuai
            }

            return $nilaiIR;
        } catch (\Exception $e) {
            // Handle error jika terjadi
            return 0; // Gantilah dengan nilai default yang sesuai
        }
    }

    public function getConsRatio($matrik_a, $matrik_b, $n)
    {
        $consindex = $this->getConsIndex($matrik_a, $matrik_b, $n);
        $consratio = $consindex / $this->getNilaiIR($n);

        return $consratio;
    }

    public function prosesKriteria(Request $request)
    {
        $nama = $this->getListNamaPilihan('kriteria');
        $n = $this->getJumlahKriteria();

        // memetakan nilai ke dalam bentuk matrik
        // x = baris
        // y = kolom
        $matrik = array();
        $urut = 0;

        for ($x = 0; $x <= ($n - 2); $x++) {
            for ($y = ($x + 1); $y <= ($n - 1); $y++) {
                $urut++;
                $pilih = "pilih" . $urut;
                $bobot = "bobot" . $urut;

                if ($request->input($pilih) == 1) {
                    $matrik[$x][$y] = $request->input($bobot);
                    $matrik[$y][$x] = 1 / $request->input($bobot);
                } else {
                    $matrik[$x][$y] = 1 / $request->input($bobot);
                    $matrik[$y][$x] = $request->input($bobot);
                }

                $this->inputDataPerbandinganKriteria($x, $y, $matrik[$x][$y]);
                
            }
        }

        for ($i = 0; $i <= ($n - 1); $i++) {
            $matrik[$i][$i] = 1;
        }

        // inisialisasi jumlah tiap kolom dan baris kriteria
        $jmlmpb = array();
        $jmlmnk = array();

        for ($i = 0; $i <= ($n - 1); $i++) {
            $jmlmpb[$i] = 0;
            $jmlmnk[$i] = 0;
        }

        // menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
        for ($x = 0; $x <= ($n - 1); $x++) {
            for ($y = 0; $y <= ($n - 1); $y++) {
                $value = $matrik[$x][$y];
                $jmlmpb[$y] += $value;
            }
        }

        // menghitung jumlah pada baris kriteria tabel nilai kriteria
	    // matrikb merupakan matrik yang telah dinormalisasi
        for ($x = 0; $x <= ($n - 1); $x++) {
            for ($y = 0; $y <= ($n - 1); $y++) {
                $matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
                $value = $matrikb[$x][$y];
                $jmlmnk[$x] += $value;
            }

            // nilai priority vektor
            $pv[$x] = $jmlmnk[$x] / $n;

            $id_kriteria = $this->getKriteriaID($x);
            $this->inputKriteriaPV($id_kriteria, $pv[$x]);

        }

        // cek konsistensi
        $eigenvektor = $this->getEigenVector($jmlmpb, $jmlmnk, $n);
        $consIndex = $this->getConsIndex($jmlmpb, $jmlmnk, $n);
        $consRatio = $this->getConsRatio($jmlmpb, $jmlmnk, $n);

        return view('admin.kriteria.output', 
                    compact('eigenvektor', 'consIndex', 'consRatio', 'n', 'nama', 'matrik', 'jmlmpb', 'matrikb', 'jmlmnk', 'pv'));   
        

    }

    public function inputAlternatifPV($id_alternatif, $id_kriteria, $pv)
    {
        $existingRecord = DB::table('pv_alternatif')
            ->where('id_alternatif', $id_alternatif)
            ->where('id_kriteria', $id_kriteria)
            ->first();

        if (!$existingRecord) {
            DB::table('pv_alternatif')->insert([
                'id_alternatif' => $id_alternatif,
                'id_kriteria' => $id_kriteria,
                'nilai' => $pv,
            ]);
        } else {
            DB::table('pv_alternatif')
                ->where('id_alternatif', $id_alternatif)
                ->where('id_kriteria', $id_kriteria)
                ->update(['nilai' => $pv]);
        }
    }

    public function inputDataPerbandinganAlternatif($alternatif1, $alternatif2, $pembanding, $nilai)
    {
        $id_alternatif1 = $this->getAlternatifID($alternatif1);
        $id_alternatif2 = $this->getAlternatifID($alternatif2);
        $id_pembanding  = $this->getKriteriaID($pembanding);

        $existingRecord = DB::table('perbandingan_alternatif')
            ->where('alternatif1', $id_alternatif1)
            ->where('alternatif2', $id_alternatif2)
            ->where('pembanding', $id_pembanding)
            ->first();

        if (!$existingRecord) {
            DB::table('perbandingan_alternatif')->insert([
                'alternatif1' => $id_alternatif1,
                'alternatif2' => $id_alternatif2,
                'pembanding' => $id_pembanding,
                'nilai' => $nilai,
            ]);
        } else {
            DB::table('perbandingan_alternatif')
                ->where('alternatif1', $id_alternatif1)
                ->where('alternatif2', $id_alternatif2)
                ->where('pembanding', $id_pembanding)
                ->update(['nilai' => $nilai]);
        }
    }



    public function prosesAlternatif(Request $request)
    {
        $namaA = $this->getListNamaPilihan('alternatif');
        $n = $this->getJumlahAlternatif();
        $matrik = array();
        $urut = 0;
        $jenis = request('jenis');

        for ($x = 0; $x <= ($n - 2); $x++) {
            for ($y = ($x + 1); $y <= ($n - 1); $y++) {
                $urut++;
                $pilih = "pilih" . $urut;
                $bobot = "bobot" . $urut;

                if ($request->input($pilih) == 1) {
                    $matrik[$x][$y] = $request->input($bobot);
                    $matrik[$y][$x] = 1 / $request->input($bobot);
                } else {
                    $matrik[$x][$y] = 1 / $request->input($bobot);
                    $matrik[$y][$x] = $request->input($bobot);
                }

                $this->inputDataPerbandinganAlternatif($x, $y, ($jenis - 1), $matrik[$x][$y]);
                
            }
        }

        for ($i = 0; $i <= ($n - 1); $i++) {
            $matrik[$i][$i] = 1;
        }

        $jmlmpb = array();
        $jmlmnk = array();

        for ($i = 0; $i <= ($n - 1); $i++) {
            $jmlmpb[$i] = 0;
            $jmlmnk[$i] = 0;
        }

        for ($x = 0; $x <= ($n - 1); $x++) {
            for ($y = 0; $y <= ($n - 1); $y++) {
                $value = $matrik[$x][$y];
                $jmlmpb[$y] += $value;
            }
        }

        for ($x = 0; $x <= ($n - 1); $x++) {
            for ($y = 0; $y <= ($n - 1); $y++) {
                $matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
                $value = $matrikb[$x][$y];
                $jmlmnk[$x] += $value;
            }

            $pv[$x] = $jmlmnk[$x] / $n;

            $id_kriteria = $this->getKriteriaID($jenis - 1);
            $id_alternatif = $this->getAlternatifID($x);
            $this->inputAlternatifPV($id_alternatif, $id_kriteria, $pv[$x]);

        }

        $eigenvektor = $this->getEigenVector($jmlmpb, $jmlmnk, $n);
        $consIndex = $this->getConsIndex($jmlmpb, $jmlmnk, $n);
        $consRatio = $this->getConsRatio($jmlmpb, $jmlmnk, $n);

        // Check if $jenis is the last index
        $lastIndex = $this->getJumlahAlternatif(); 

        return view('admin.alternatif.output', 
                    compact('eigenvektor', 'consIndex', 'consRatio', 'n', 'namaA', 'matrik', 'jmlmpb', 'matrikb', 'jmlmnk', 'pv','jenis', 'lastIndex'));  
        

    }
}





