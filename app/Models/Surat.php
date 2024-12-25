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
        'jenis',
        'tanggal',
        'waktu',
        'alamat',
        'dokumen',
        'keterangan'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'surat_user', 'surat_id', 'user_id');
    }
}
