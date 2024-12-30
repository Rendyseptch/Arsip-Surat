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
    function index(Request $request)
    {
        $jenis = $request->input('jenis');
        $user = Auth::user();
        $arsips = [];
        if ($user->role) {
            if ($jenis) {
                $arsips = Surat::with('users')->where('jenis', $jenis)->get();
            } else {
                $arsips = Surat::with('users')->get();
            }
        } else {
            if ($jenis) {
                $arsips = Surat::with('users')
                    ->whereHas('users', function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    })
                    ->where('jenis', $jenis) // Menambahkan kondisi untuk kolom 'jenis'
                    ->get();
            } else {

                $arsips = Surat::with('users')->whereHas('users', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->get();
            }
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
        $validate = $request->validate([
            'nama' => 'required',
            'nomor' => 'required',
            'jenis' => 'required',
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
    public function toggle(Request $request)
    {
        $surat = Surat::where('id', $request->surat)->first();
        $surat->users()->toggle($request->user);
        return redirect('/edit-arsip/' . $request->surat)->with("success", "Surat Berhasil Menambahkan pegawai");
    }
    // public function dettach(Request $request)
    // {
    //     $surat = Surat::where('id', $request->surat)->first();
    //     $surat->users()->detach($request->user);
    //     return redirect('/edit-arsip/' . $request->surat)->with("success", "Surat Berhasil Delete pegawai");
    // }

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
