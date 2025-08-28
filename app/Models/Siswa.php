<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    
    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'rfid',
        'nama_lengkap',
        'kelas_id',
        'wa_ortu',
        'foto_url',
    ];

    // Relasi ke user (jika ada akun login per siswa)
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // Relasi ke kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
