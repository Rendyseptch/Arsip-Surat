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
        Jabatan::factory()->create([
            'nama' => ' Ketua KPU Kota Batu',
        ]);
        Pangkat::factory()->create([
            'nama' => ' Penata (III/c)',
        ]);
        User::factory()->create([
            'username' => 'admin123',
            'password' => Hash::make('admin123'),
            'role' => true,
        ]);

        Pegawai::factory()->create([
            'nama' => ' Admin KPU',
            'nip' => ' admin123',
            'no_hp' => '0812374366',
            'jabatan_id' => 1,
            'pangkat_id' => 1,
            'user_id' => 1,
        ]);
        User::factory()->create([
            'username' => 'user123',
            'password' => Hash::make('user123'),
            'role' => false,
        ]);

        Pegawai::factory()->create([
            'nama' => ' Pegawai KPU',
            'nip' => ' user123',
            'no_hp' => '0812374366',
            'jabatan_id' => 1,
            'pangkat_id' => 1,
            'user_id' => 2,
        ]);
        Surat::factory()->create([
            'nama' => ' Surat Kunjungan kerja Surabaya',
            'nomor' => ' SDL0012731',
            'jenis' => ' dinas luar',
            'tanggal' => now()->format('Y-m-d'),
            'waktu' => now()->format('H:i:s'),
            'alamat' => 'Kota Malang',
            'dokumen' => 'surat_kota_malang',
            'keterangan' => 'keterangan semua',
        ]);
        Surat::factory()->create([
            'nama' => ' Seminar Pemilu kota batu',
            'nomor' => ' SDL0012732',
            'jenis' => ' dinas dalam',
            'tanggal' => now()->format('Y-m-d'),
            'waktu' => now()->format('H:i:s'),
            'alamat' => 'Kota Malang',
            'dokumen' => 'surat_kota_malang',
            'keterangan' => 'keterangan semua',
        ]);

        User::factory()->create([
            'username' => 'user12',
            'password' => Hash::make('user12'),
            'role' => false,
        ]);

        Pegawai::factory()->create([
            'nama' => ' Pegawai KPU 2',
            'nip' => ' user12',
            'no_hp' => '0812374366',
            'jabatan_id' => 1,
            'pangkat_id' => 1,
            'user_id' => 3,
        ]);
    }
}
