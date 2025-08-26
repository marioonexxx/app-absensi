<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaOrtuController extends Controller
{
    public function index()
    {
       return view('siswa.dashboard');
    }

    
}
