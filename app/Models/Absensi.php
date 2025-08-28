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
        'bukti_id',
        'absen_tgl',
        'absen_datang',
        'absen_pulang',
        'absen_terlambat',
        'absen_keterangan',        
        'absen_validasi',
    ];

        // Relasi ke siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function bukti()
    {
        return $this->belongsTo(Bukti::class);
    }

    

   
}
