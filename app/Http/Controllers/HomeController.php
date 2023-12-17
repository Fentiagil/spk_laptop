<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;

class HomeController extends Controller
{
    //menampilkan halaman home
    public function index()
    {
        $data = Alternatif::orderBy('id', 'asc')->get();

        $results = Alternatif::join('ranking', 'alternatif.id', '=', 'ranking.id_alternatif')
                ->orderBy('ranking.nilai', 'DESC')
                ->select('alternatif.id', 'alternatif.nama', 'ranking.nilai')
                ->get();


        return view('layout.main', ['data' => $data], compact('results' ));
    }
}
