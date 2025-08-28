<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        return view('data-absensi.index');
    }

    public function rekap()
    {

        // $data = Absensi::with(['siswa', 'kelas', 'sesi'])
        //     ->whereDate('created_at', Carbon::today())
        //     ->get();

        // $data = Absensi::with(['siswa.kelas', 'siswa.sesi'])
        //     ->whereDate('absen_tgl', Carbon::today())
        //     ->get();

        // $data = Absensi::with(['siswa.kelas.sesi'])
        //     ->whereDate('absen_tgl', Carbon::today())
        //     ->get();

        $data = Absensi::with('siswa.kelas.sesi')->get();
        return view('data-absensi.rekap', compact('data'));
    }

    public function store(Request $request)
    {
        $nisn = $request->nisn;

        $siswa = Siswa::with('kelas.sesi')->where('nisn', $nisn)->first();

        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan!');
        }

        $kelas = $siswa->kelas;
        $sesi  = $kelas->sesi;

        $now   = Carbon::now();
        $today = Carbon::today();

        $absensi = Absensi::where('siswa_id', $siswa->id)
            ->whereDate('absen_tgl', $today)
            ->first();

        if (!$absensi) {
            // Tap pertama (Datang)

            // Ambil jam batas telat dari kolom sesi
            $jamMulai   = Carbon::today()->setTimeFromTimeString($sesi->jamdatang_mulai);
            $jamSelesai = Carbon::today()->setTimeFromTimeString($sesi->jamdatang_selesai);
            $batasTelat = Carbon::today()->setTimeFromTimeString($sesi->batas_telat);




            if ($now->gte($jamMulai) && $now->lte($batasTelat)) {
                $terlambat = null;
                if ($now->greaterThan($jamSelesai)) {
                    $terlambat = (int) abs($now->diffInMinutes($jamSelesai, false));
                }

                Absensi::create([
                    'siswa_id'         => $siswa->id,
                    'kelas_id'         => $kelas->id,
                    'sesi_id'          => $sesi->id,
                    'absen_tgl'        => $today,
                    'absen_datang'     => $now,
                    'absen_terlambat'  => $terlambat,
                    'absen_keterangan' => $terlambat ? 'Terlambat' : 'Tepat Waktu',
                    'absen_validasi'   => '1',
                ]);

                return redirect()->back()->with('siswa', $siswa);
            } else {
                return redirect()->back()->with('error', 'Anda tidak bisa melakukan absen di luar jam yang telah ditentukan!');
            }
        } else {
            // Tap kedua (Pulang)
            if ($now->between(Carbon::parse($sesi->jampulang_mulai), Carbon::parse($sesi->jampulang_selesai))) {
                $absensi->update([
                    'absen_pulang' => $now
                ]);
                return redirect()->back()->with('success', 'Absen pulang tercatat');
            } else {
                return redirect()->back()->with('error', 'Bukan waktu absen pulang');
            }
        }
    }
}
