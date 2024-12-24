<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Surat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ArsipController extends Controller
{
    //
    function index()
    {
        $arsips = Surat::all();
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
        $arsip = Surat::where('id', $id)->first();
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
        $validate = $request->validate([
            'nama' => 'required',
            'nomor' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required',
            'waktu' => 'required',
            'dokumen' => 'required',
            'keterangan' => 'nullable',

        ]);
        if ($request->file('dokumen')) {
            $file = $request->dokumen;
            $ext   = $file->getClientOriginalExtension();
            $randomString = Str::random(5);
            $fileName = $request->nama . '-' . $randomString . '.' . $ext;
            $file->move(public_path('dokumen-surat'), $fileName);
            $validate['dokumen'] = $fileName;
        }
        Surat::create($validate);
        return redirect('/arsip');
    }

    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);
        return view('arsip.edit', [
            'arsip' => $arsip
        ]);
    }

    public function update(Request $request)
    {
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
