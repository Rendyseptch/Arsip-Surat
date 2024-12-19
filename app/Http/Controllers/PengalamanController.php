<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengalamanController extends Controller
{
   public function Pengalaman(){

    $nama= 'kuli tombol';
    $posisi = 'Frontend Developer';
    $tahun = 2020;
    $pengalamans =['buat tombol', 'gpt expert', 'membully marit'];
    return view('pengalaman', [

        'nama'=> $nama,
        'posisi'=> $posisi,
        'tahun'=> $tahun,
        'pengalamans'=> $pengalamans,
    ]);
   }
}
