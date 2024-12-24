<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use App\Models\Arsip;
use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\Pegawai;
use App\Models\Surat;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory()->create([
        //     'username' => 'admin',
        //     'password' => Hash::make('admin'),
        //     'role' => true,
        // ]);
        // Jabatan::factory()->create([
        //     'nama' => ' Ketua KPU Kota Batu',
        // ]);
        // Pangkat::factory()->create([
        //     'nama' => ' Penata (III/c)',
        // ]);
        // Pegawai::factory()->create([
        //     'nama' => ' Admin KPU',
        //     'nip' => ' 122348KPU',
        //     'no_hp' => '0812374366',
        //     'jabatan_id' => 1,
        //     'pangkat_id' => 1,
        //     'user_id' => 1,
        // ]);
        Surat::factory()->create([
            'nama' => ' Surat Dinas Luar',
            'nomor' => ' SDL001273',
            'tanggal' => now()->format('Y-m-d'),
            'waktu' => now()->format('H:i:s'),
            'alamat' => 'Kota Malang',
            'dokumen' => 'surat_kota_malang',
            'keterangan' => 'keterangan semua',
        ]);
    }
}
