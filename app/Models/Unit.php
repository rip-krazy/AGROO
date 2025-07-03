<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'lokasi',
        'tanggal', // atau datetime jika diperlukan
    ];

}
