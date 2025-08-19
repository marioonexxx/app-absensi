<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    use HasFactory;
    protected $table = 'sesi';
    protected $fillable = [
        'nama_sesi',
        'jamdatang_mulai',
        'jamdatang_selesai',
        'jampulang_mulai',
        'jampulang_selesai',
        'batas_telat',        
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
