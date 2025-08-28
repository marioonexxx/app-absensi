<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    use HasFactory;

    protected $table = 'bukti';
    protected $fillable = [
        'bukti_upload',
        'tgl_mulai',
        'tgl_selesai',
    ];

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

}
