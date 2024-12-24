<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use App\Models\Pangkat;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jabatans = Jabatan::all();
        $pangkats = Pangkat::all();
        // dd($jabatans);
        return view(
            'jabatan.index',
            [
                'title' => 'Jabatan dan Pangkat',
                'jabatans' => $jabatans,
                'pangkats' => $pangkats,
            ]
        );
    }
    public function createJabatan(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);
        Jabatan::create($validate);
        return redirect('/jabatan')->with("success", "Jabatan Baru Berhasil ditambahkan!");
    }
    public function deleteJabatan(Request $request)
    {
        $arsip = Jabatan::findOrFail($request->id);
        $arsip->delete();
        return redirect('/jabatan')->with("success", "Jabatan Berhasil dihapus!");
    }
    public function createPangkat(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);
        Pangkat::create($validate);
        return redirect('/jabatan')->with("success", "Pangkat Baru Berhasil ditambahkan!");
    }
    public function deletePangkat(Request $request)
    {
        $arsip = Pangkat::findOrFail($request->id);
        $arsip->delete();
        return redirect('/jabatan')->with("success", "Pangkat Berhasil dihapus!");
    }
}
