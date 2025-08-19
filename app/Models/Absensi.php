<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $fillable = [
        'siswa_id',       
        'kelas_id',
        'sesi_id',
        'absen_tgl',
        'absen_datang',
        'absen_pulang',
        'absen_terlambat',
        'absen_keterangan',
        'absen_bukti',
        'absen_validasi',
    ];

        // Relasi ke siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    // Relasi ke kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // Relasi ke sesi
    public function sesi()
    {
        return $this->belongsTo(Sesi::class);
    }

   
}
