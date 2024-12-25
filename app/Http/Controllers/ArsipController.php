<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Surat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArsipController extends Controller
{
    //
    function index()
    {
        $user = Auth::user();
        $arsips = [];
        if ($user->role) {
            $arsips = Surat::with('users')->get();
        } else {
            $arsips = Surat::with('users')->whereHas('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();
            // berdasarkan user_id yang bukan admin
        }
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
        // $validate = $request->validate([
        //     'nama' => 'required',
        //     'nomor' => 'required',
        //     'jenis' => 'required',
        //     'tanggal' => 'required',
        //     'alamat' => 'required',
        //     'waktu' => 'required',
        //     'dokumen' => 'required',
        //     'keterangan' => 'nullable',

        // ]);
        // if ($request->file('dokumen')) {
        //     $file = $request->dokumen;
        //     $ext   = $file->getClientOriginalExtension();
        //     $randomString = Str::random(5);
        //     $fileName = $request->nama . '-' . $randomString . '.' . $ext;
        //     $file->move(public_path('dokumen-surat'), $fileName);
        //     $validate['dokumen'] = $fileName;
        // }
        $validate = [
            'nama' => ' Surat Kunjungan kerja Surabaya',
            'nomor' => ' SDL0012731',
            'jenis' => ' dinas luar',
            'tanggal' => now()->format('Y-m-d'),
            'waktu' => now()->format('H:i:s'),
            'alamat' => 'Kota Malang',
            'dokumen' => 'surat_kota_malang',
            'keterangan' => 'keterangan semua',
        ];
        $surat = Surat::create($validate);
        $surat->refresh();
        return redirect('/edit-arsip/' . $surat->id)->with("success", "Surat Berhasil ditambahkan! Silahkan pilih pegawai");
    }

    public function edit($id)
    {
        $arsip = Surat::findOrFail($id);
        $pegawai = \App\Models\User::with('pegawai')->get();
        return view('arsip.edit', [
            'arsip' => $arsip,
            'pegawais' => $pegawai
        ]);
    }
    public function attach(Request $request)
    {
        $surat = Surat::where('id', $request->surat)->first();
        $surat->users()->attach($request->user);
        return redirect('/edit-arsip/' . $request->surat)->with("success", "Surat Berhasil Menambahkan pegawai");
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'nomor' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required',
            'waktu' => 'required',
            'keterangan' => 'nullable',
        ]);
        if ($request->file('dokumen')) {
            // menghapus data sebelumnya
            if ($request->oldDokumen) {
                $filePath = public_path('dokumen-surat/' . $request->oldDokumen);
                if (file_exists($filePath)) {
                    unlink($filePath); // Menghapus file
                }
            }
            $image = $request->dokumen;
            $ext   = $image->getClientOriginalExtension();
            $randomString = Str::random(5);
            $imageName = $request->nama . '-' . $randomString . '.' . $ext;
            $image->move(public_path('dokumen-surat'), $imageName);
            $validate['dokumen'] = $imageName;
        }
        // mencari data berdasarkan id
        $arsip = Surat::findOrFail($request->id);
        $arsip->update($validate);
        return redirect('/arsip')->with("success", "Surat Berhasil diUpdate!");
    }
    public function destroy(Request $request)
    {

        $arsip = Surat::findOrFail($request->id);
        $filePath = public_path('dokumen-surat/' . $arsip->dokumen);
        if (file_exists($filePath)) {
            unlink($filePath); // Menghapus file
        }
        $arsip->delete();
        return redirect('/arsip')->with("success", "Surat Berhasil dihapus!");
    }
}
