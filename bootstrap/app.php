<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Kepsek;
use App\Http\Middleware\Petugas;
use App\Http\Middleware\Siswa;
use App\Http\Middleware\Wakasek;
use App\Http\Middleware\Walikelas;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'Admin' => Admin::class,
            'Kepsek' => Kepsek::class,
            'Wakasek' => Wakasek::class,
            'Walikelas' => Walikelas::class,
            'Siswa' => Siswa::class,
            'Petugas' => Petugas::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
