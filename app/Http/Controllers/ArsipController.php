<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArsipController extends Controller
{
    //
    function index(){
        return view('arsip.index', ['title'=> 'Arsip Surat']);
    }
    function create(){
        return view('arsip.create', ['title' => 'Form Arsip']);
    }
    function store(Request $dila){
        $arsip = [
            'nama' => $dila->nama,
            'nomor' => $dila->nomor
        ];
        
        return view('arsip.contoh',[
            'title' => 'iki contoh',
            'nama' => $arsip['nama'],
            'nomor' => $arsip['nomor']
        ]);
    }
}
