<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    // public 
    public function index(){

        $profils = 'Riza Afif';
        $nohp = 81232434;
        $hobi = ['mancing','padu', 'godani rendy'];
        return view('hello',[
            'profils' => $profils,
            'nohp' => $nohp,
            'hobies' => $hobi 
        ]);
    }
    public function edit(){
        dd('ini halaman hello di function edit');
    }
}
