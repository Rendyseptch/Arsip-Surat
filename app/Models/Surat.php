<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    /** @use HasFactory<\Database\Factories\SuratFactory> */
    use HasFactory;
    protected $fillable = [
        'nama',
        'nomor',
        'tanggal',
        'waktu',
        'alamat',
        'dokumen',
        'keterangan'
    ];
}
