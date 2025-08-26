<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratIjinController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $data = Absensi::where('siswa_id', $id)->get();

        return view('siswa.upload', compact('data'));

    }

    public function store()
    {


    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
