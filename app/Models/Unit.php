<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tipe',
        'lokasi',
        'status',
        'kapasitas',
        'harga',
        'deskripsi',
        'tanggal',
    ];

    // Optionally, you can add casts for proper data types
    protected $casts = [
        'tanggal' => 'date',
        'harga' => 'decimal:2',
    ];

    // Optionally, you can add constants for enum-like values
    const TIPE_STANDARD = 'Standard';
    const TIPE_DELUXE = 'Deluxe';
    const TIPE_SUITE = 'Suite';
    const TIPE_EXECUTIVE = 'Executive';
    const TIPE_PRESIDENTIAL = 'Presidential';

    const STATUS_TERSEDIA = 'Tersedia';
    const STATUS_DIPESAN = 'Dipesan';
    const STATUS_PERAWATAN = 'Dalam Perawatan';
    const STATUS_TIDAK_TERSEDIA = 'Tidak Tersedia';

    // Helper methods to get available options
    public static function getTipeOptions()
    {
        return [
            self::TIPE_STANDARD => 'Standard',
            self::TIPE_DELUXE => 'Deluxe',
            self::TIPE_SUITE => 'Suite',
            self::TIPE_EXECUTIVE => 'Executive',
            self::TIPE_PRESIDENTIAL => 'Presidential',
        ];
    }

    public static function getStatusOptions()
    {
        return [
            self::STATUS_TERSEDIA => 'Tersedia',
            self::STATUS_DIPESAN => 'Dipesan',
            self::STATUS_PERAWATAN => 'Dalam Perawatan',
            self::STATUS_TIDAK_TERSEDIA => 'Tidak Tersedia',
        ];
    }

    public static function getLokasiOptions()
    {
        return [
            'Lantai 1 - Sayap Barat',
            'Lantai 1 - Sayap Timur',
            'Lantai 2 - Sayap Barat',
            'Lantai 2 - Sayap Timur',
            'Lantai 3 - Sayap Barat',
            'Lantai 3 - Sayap Timur',
        ];
    }

}
