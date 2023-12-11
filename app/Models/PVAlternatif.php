<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PVAlternatif extends Model
{
    //use HasFactory;
    protected $table = 'pv_alternatif';
    protected $fillable = ['id', 'id_alternatif', 'id_kriteria', 'nilai']; 
    public $timestamps = false;
}
