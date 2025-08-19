<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    public function index()
    {
        $data = Sesi::all();
        return view('data-sesi.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sesi' => 'required|string|max:100',
            'jamdatang_mulai' => 'required|date_format:H:i',
            'jamdatang_selesai' => 'required|date_format:H:i',
            'jampulang_mulai' => 'required|date_format:H:i',
            'jampulang_selesai' => 'required|date_format:H:i',
            'batas_telat' => 'required|date_format:H:i',
        ]);

        Sesi::create([
            'nama_sesi' => $request->nama_sesi,
            'jamdatang_mulai' => Carbon::createFromFormat('H:i', $request->jamdatang_mulai)->format('H:i:s'),
            'jamdatang_selesai' => Carbon::createFromFormat('H:i', $request->jamdatang_selesai)->format('H:i:s'),
            'jampulang_mulai' => Carbon::createFromFormat('H:i', $request->jampulang_mulai)->format('H:i:s'),
            'jampulang_selesai' => Carbon::createFromFormat('H:i', $request->jampulang_selesai)->format('H:i:s'),
            'batas_telat' => Carbon::createFromFormat('H:i', $request->batas_telat)->format('H:i:s'),
        ]);

        return back()->with('success', 'Data sesi berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sesi' => 'required|string|max:100',
            'jamdatang_mulai' => 'required|date_format:H:i',
            'jamdatang_selesai' => 'required|date_format:H:i',
            'jampulang_mulai' => 'required|date_format:H:i',
            'jampulang_selesai' => 'required|date_format:H:i',
            'batas_telat' => 'required|date_format:H:i',
        ]);

        $sesi = Sesi::findOrFail($id);

        $sesi->update([
            'nama_sesi' => $request->nama_sesi,
            'jamdatang_mulai' => Carbon::createFromFormat('H:i', $request->jamdatang_mulai)->format('H:i:s'),
            'jamdatang_selesai' => Carbon::createFromFormat('H:i', $request->jamdatang_selesai)->format('H:i:s'),
            'jampulang_mulai' => Carbon::createFromFormat('H:i', $request->jampulang_mulai)->format('H:i:s'),
            'jampulang_selesai' => Carbon::createFromFormat('H:i', $request->jampulang_selesai)->format('H:i:s'),
            'batas_telat' => Carbon::createFromFormat('H:i', $request->batas_telat)->format('H:i:s'),
        ]);

        return back()->with('success', 'Data sesi berhasil diperbarui');
    }


    public function destroy($id)
    {
        $sesi = Sesi::findOrFail($id);
        $sesi->delete();

        return redirect()->back()->with('success', 'Data sesi berhasil dihapus.');
    }
}
