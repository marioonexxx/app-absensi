<?php

namespace App\Http\Controllers;

use App\Helpers\FonnteHelper;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    // Untuk tampilkan form kosong
    public function index()
    {
        return view('absen.index'); // ganti dengan nama file blade kamu
    }

    // Untuk cari data siswa
    public function read(Request $request)
    {
        $nisn = $request->nisn;
        $siswa = Siswa::where('nisn', $nisn)->first();

        if ($siswa) {
            $jam = now()->format('H:i:s');

            // Kirim WA ke nomor orang tua
            $pesan = "Halo, orang tua dari *{$siswa->nama_lengkap}*. Anak anda telah tiba :  *$jam*.";
            FonnteHelper::kirimWa($siswa->wa_ortu, $pesan);

            return redirect()->back()->with('siswa', $siswa)->with('success', 'Absensi berhasil dan WA telah dikirim.');
        } 
        else {
            return redirect()->back()->with('error', 'NISN tidak ditemukan.');
        }
    }
}
