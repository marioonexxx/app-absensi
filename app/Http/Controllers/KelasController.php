<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Sesi;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::all();
        $sesi = Sesi::all();

        return view('data-kelas.index', compact('data', 'sesi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'sesi_id'    => 'required|exists:sesi,id',
            'grade'      => 'required|in:X,XI,XII',
        ]);

        $data = $request->only(['nama_kelas', 'sesi_id', 'grade']);
        Kelas::create($data);


        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'sesi_id'    => 'required|exists:sesi,id',
            'grade'      => 'required|in:X,XI,XII',
        ]);

        // Cari data kelas berdasarkan ID
        $kelas = Kelas::findOrFail($id);

        // Update data
        $kelas->update($validated);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data kelas berhasil diperbarui.');
    }


    public function destroy($id) {

        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->back()->with('success', 'Data kelas berhasil dihapus.');
    }
}
