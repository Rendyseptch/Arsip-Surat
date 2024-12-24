<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    /** @use HasFactory<\Database\Factories\PangkatFactory> */
    use HasFactory;
    protected $fillable = [
        'nama',
    ];
    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'pangkat_id', 'id');
    }
}
