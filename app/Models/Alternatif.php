<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    //use HasFactory;
    protected $table = 'alternatif';
    protected $fillable = ['id', 'nama', 'layar', 'prosesor', 'RAM', 'penyimpanan', 'baterai', 'harga']; 
    public $timestamps = false;
}
