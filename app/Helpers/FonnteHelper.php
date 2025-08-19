<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class FonnteHelper
{
    public static function kirimWa($tujuan, $pesan)
    {
        return Http::withHeaders([
            'Authorization' => env('FONNTE_TOKEN')
        ])->asForm()->post('https://api.fonnte.com/send', [
            'target' => $tujuan,
            'message' => $pesan,
            'countryCode' => '62', // Optional, default Indonesia
            'delay' => 1,
        ])->json();
    }
}
