<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //menampilkan halaman home
    public function index()
    {
        return view('home');
    }
}