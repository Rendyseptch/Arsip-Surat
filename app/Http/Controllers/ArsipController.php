<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ArsipController extends Controller
{
    //
    function index()
    {
        $arsips = Arsip::all();
        // dd($arsips);
        return view(
            'arsip.index',
            [
                'title' => 'Arsip Surat',
                'arsips' => $arsips,
            ]
        );
    }

    function detail($id)
    {
        $arsip = Arsip::where('id', $id)->first();
        return view(
            'arsip.detail',
            [
                'title' => 'Detail Arsip Surat',
                'arsip' => $arsip,
            ]
        );
    }

    function create()
    {
        return view('arsip.create', ['title' => 'Form Arsip']);
    }
    function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'nama' => 'required',
            'nomor' => 'required',
            'tanggal' => 'required',
            'kategori' => 'required',

        ]);
        Arsip::create($validate);
        return redirect('/arsip');
    }

    public function edit( $id)
    {
        $arsip = Arsip::findOrFail($id);
        return view('arsip.edit',[
            'arsip' => $arsip
        ]);
    }

    public function update(Request $request){
        $validate = $request->validate([
            'nama' => 'required',
            'nomor' => 'required',
            'tanggal' => 'required',
            'kategori' => 'required',
        ]);
        // mencari data berdasarkan id 
        $arsip = Arsip::findOrFail($request->id);
        $arsip->update($validate);
        return redirect('/arsip');
    }
    public function destroy(Request $request)
    {

        $arsip = Arsip::findOrFail($request->id);
        $arsip->delete();  
    
        return redirect('/arsip');
    }
    




}

