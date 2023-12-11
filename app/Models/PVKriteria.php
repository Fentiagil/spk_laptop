<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PVKriteria extends Model
{
    //use HasFactory;
    protected $table = 'pv_kriteria';
    protected $fillable = ['id_kriteria', 'nilai']; 
    public $timestamps = false;
}
