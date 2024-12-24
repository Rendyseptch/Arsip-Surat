<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    /** @use HasFactory<\Database\Factories\JabatanFactory> */
    use HasFactory;
    protected $fillable = [
        'nama',
    ];
    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'pangkat_id', 'id');
    }
}
