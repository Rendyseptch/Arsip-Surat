<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    //
    public function index()
    {
        $pegawai = User::with('pegawai')->get();
        return view('users.index', [
            'title' => 'Detail Arsip Surat',
            'pegawais' => $pegawai
        ]);
    }

    function detail($id)
    {
        $pegawai = User::where('id', $id)->with('pegawai')->first();
        return view(
            'users.detail',
            [
                'title' => 'Detail pegawai',
                'pegawai' => $pegawai,
            ]
        );
    }
    function create()
    {
        $jabatans = Jabatan::all();
        $pangkats = Pangkat::all();
        return view('users.create', [
            'title' => 'Form Pegawai',
            'jabatans' => $jabatans,
            'pangkats' => $pangkats,
        ]);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'no_hp' => 'required',
            'jabatan_id' => 'required',
            'pangkat_id' => 'required',
        ]);
        $role = 0;
        if ($request->role) {
            $role = 1;
        }
        $newAkun = [
            'username' => $validate['nip'],
            'password' => Hash::make($validate['nip']),
            'role' => $role
        ];
        $newUser = User::create($newAkun);
        $validate['user_id'] = $newUser->id;
        Pegawai::create($validate);
        return redirect('user-managements')->with("success", "Pegawai Baru Berhasil ditambahkan!");
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $jabatans = Jabatan::all();
        $pangkats = Pangkat::all();
        return view('users.edit', [
            'pegawai' => $pegawai,
            'jabatans' => $jabatans,
            'pangkats' => $pangkats,
        ]);
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'no_hp' => 'required',
            'jabatan_id' => 'required',
            'pangkat_id' => 'required',
        ]);
        // mencari data berdasarkan id
        $arsip = Pegawai::findOrFail($request->id);
        $arsip->update($validate);
        return redirect('/user-managements')->with("success", "Pegawai Berhasil diUpdate!");
    }
    public function destroy(Request $request)
    {
        $pegawai = User::findOrFail($request->id);
        $pegawai->delete();
        return redirect('/user-managements')->with("success", "Pegawai Berhasil dihapus!");
    }
}
