<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::all();
        $kelas = Kelas::all();
        return view('data-siswa.index', compact('data', 'kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn'         => 'nullable|unique:siswa,nisn',
            'rfid'         => 'nullable|string',
            'nama_lengkap' => 'nullable|string',
            'kelas'        => 'nullable|string',
            'wa_ortu'      => 'nullable|string',
            'foto_url'     => 'nullable|image|max:1024', // 1MB
        ]);

        $data = $request->except('foto_url');

        if ($request->hasFile('foto_url')) {
            $data['foto_url'] = $request->file('foto_url')->store('foto_siswa', 'public');
        }

        // Insert ke tabel siswa dulu
        $siswa = Siswa::create($data);

        // Insert ke tabel users
        User::create([
            'name'      => $siswa->nama_lengkap,
            'username'  => $siswa->nisn,       // ambil dari nisn
            'email'     => null,               // boleh null
            'role'      => 4,                  // role = 4 untuk siswa
            'password'  => Hash::make($siswa->nisn), // password = nisn (di-hash)
            'siswa_id'  => $siswa->id          // relasi ke siswa
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nisn'         => 'nullable|unique:siswa,nisn,' . $id,
            'rfid'         => 'nullable|string|max:255',
            'nama_lengkap' => 'nullable|string|max:255',
            'kelas'        => 'nullable|string|max:50',
            'wa_ortu'      => 'nullable|string|max:20',
            'foto_url'     => 'nullable|image|max:1024', // 1MB
        ]);

        $data = $request->except('foto_url');

        // Jika ada upload foto baru
        if ($request->hasFile('foto_url')) {
            // Hapus foto lama jika ada
            if ($siswa->foto_url && Storage::disk('public')->exists($siswa->foto_url)) {
                Storage::disk('public')->delete($siswa->foto_url);
            }
            // Simpan foto baru
            $data['foto_url'] = $request->file('foto_url')->store('foto_siswa', 'public');
        }

        $siswa->update($data);

        return redirect()->back()->with('success', 'Data siswa berhasil diperbarui.');
    }


    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();
        return back()->with('success', 'Data siswa berhasil dihapus.');
    }
}
