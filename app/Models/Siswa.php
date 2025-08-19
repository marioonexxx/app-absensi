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
        'nama_lengkap',
        'kelas_id',
        'wa_ortu',
        'foto_url',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

}
