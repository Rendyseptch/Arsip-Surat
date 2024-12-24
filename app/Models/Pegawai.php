<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    /** @use HasFactory<\Database\Factories\PegawaiFactory> */
    use HasFactory;
    protected $fillable = [
        'nama',
        'nip',
        'no_hp',
        'pangkat_id',
        'jabatan_id',
        'user_id',
    ];
    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class, 'pangkat_id', 'id');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
