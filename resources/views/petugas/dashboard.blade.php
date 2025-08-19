@extends('layouts.navbar')
@section('title', 'Dashboard Petugas Absen')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Dashboard Sistem Absensi - SMA Negeri 1 Ambon</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Dashboard Petugas Absen</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row starter-main">
                <div class="col-xl-3">
                    <div class="card text-center"> <!-- ini bikin header & body text rata tengah -->
                        <div class="card-header">
                            <h1 class="mb-0">Server Absen 1</h1>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-lg btn-success d-flex align-items-center mx-auto">
                                <i data-feather="power" class="me-2"></i>
                                <span class="fw-bold">AMBIL ABSEN</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card text-center"> <!-- ini bikin header & body text rata tengah -->
                        <div class="card-header">
                            <h1 class="mb-0">Server Absen 1</h1>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-lg btn-success d-flex align-items-center mx-auto">
                                <i data-feather="power" class="me-2"></i>
                                <span class="fw-bold">AMBIL ABSEN</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card text-center"> <!-- ini bikin header & body text rata tengah -->
                        <div class="card-header">
                            <h1 class="mb-0">Server Absen 1</h1>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-lg btn-success d-flex align-items-center mx-auto">
                                <i data-feather="power" class="me-2"></i>
                                <span class="fw-bold">AMBIL ABSEN</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card text-center"> <!-- ini bikin header & body text rata tengah -->
                        <div class="card-header">
                            <h1 class="mb-0">Server Absen 1</h1>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-lg btn-success d-flex align-items-center mx-auto">
                                <i data-feather="power" class="me-2"></i>
                                <span class="fw-bold">AMBIL ABSEN</span>
                            </button>
                        </div>
                    </div>
                </div>


            </div>
            <!-- Container-fluid Ends-->
        </div>
    </div>

@endsection
