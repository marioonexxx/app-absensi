@extends('layouts.navbar')
@section('title', 'Dashboard Administrator - Manajemen Data Kelas')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Manajemen Data Kelas</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Manajemen Data Kelas</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row starter-main">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Dashboard</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa-solid fa-gear fa-spin"></i></li>
                                    <li><i class="view-html fa-solid fa-code"></i></li>
                                    <li><i class="icofont icofont-maximize full-card"></i></li>
                                    <li><i class="icofont icofont-minus minimize-card"></i></li>
                                    <li><i class="icofont icofont-refresh reload-card"></i></li>
                                    <li><i class="icofont icofont-error close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Tombol Tambah -->
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
                                <i class="fa fa-plus"></i>
                            </button>
                            <!-- Tabel Data -->
                            <table class="table table-bordered" id="sesiTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Sesi</th>
                                        <th>Jam Datang Mulai</th>
                                        <th>Jam Datang Selesai</th>
                                        <th>Jam Pulang Mulai</th>
                                        <th>Jam Pulang Selesai</th>
                                        <th>Batas Telat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->nama_sesi }}</td>
                                            <td>{{ $item->jamdatang_mulai }}</td>
                                            <td>{{ $item->jamdatang_selesai }}</td>
                                            <td>{{ $item->jampulang_mulai }}</td>
                                            <td>{{ $item->jampulang_selesai }}</td>
                                            <td>{{ $item->batas_telat }}</td>

                                            <td>
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modalEdit{{ $item->id }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('sesi.destroy', $item->id) }}" method="POST"
                                                    style="display:inline;" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <form action="{{ route('sesi.update', $item->id) }}" method="POST">
                                                    @csrf @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5>Edit Sesi</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Nama Sesi -->
                                                            <div class="mb-3">
                                                                <label for="nama_sesi" class="form-label">Nama Sesi</label>
                                                                <input type="text" name="nama_sesi" id="nama_sesi"
                                                                    value="{{ old('nama_sesi', $item->nama_sesi) }}"
                                                                    class="form-control" required maxlength="100">
                                                            </div>

                                                            <!-- Jam Datang Mulai -->
                                                            <div class="mb-3">
                                                                <label for="jamdatang_mulai" class="form-label">Jam Datang
                                                                    Mulai</label>
                                                                <input type="time" name="jamdatang_mulai"
                                                                    id="jamdatang_mulai"
                                                                    value="{{ old('jamdatang_mulai', \Carbon\Carbon::parse($item->jamdatang_mulai)->format('H:i')) }}"
                                                                    class="form-control" required>
                                                            </div>

                                                            <!-- Jam Datang Selesai -->
                                                            <div class="mb-3">
                                                                <label for="jamdatang_selesai" class="form-label">Jam Datang
                                                                    Selesai</label>
                                                                <input type="time" name="jamdatang_selesai"
                                                                    id="jamdatang_selesai"
                                                                    value="{{ old('jamdatang_selesai', \Carbon\Carbon::parse($item->jamdatang_selesai)->format('H:i')) }}"
                                                                    class="form-control" required>
                                                            </div>

                                                            <!-- Jam Pulang Mulai -->
                                                            <div class="mb-3">
                                                                <label for="jampulang_mulai" class="form-label">Jam Pulang
                                                                    Mulai</label>
                                                                <input type="time" name="jampulang_mulai"
                                                                    id="jampulang_mulai"
                                                                    value="{{ old('jampulang_mulai', \Carbon\Carbon::parse($item->jampulang_mulai)->format('H:i')) }}"
                                                                    class="form-control" required>
                                                            </div>

                                                            <!-- Jam Pulang Selesai -->
                                                            <div class="mb-3">
                                                                <label for="jampulang_selesai" class="form-label">Jam Pulang
                                                                    Selesai</label>
                                                                <input type="time" name="jampulang_selesai"
                                                                    id="jampulang_selesai"
                                                                    value="{{ old('jampulang_selesai', \Carbon\Carbon::parse($item->jampulang_selesai)->format('H:i')) }}"
                                                                    class="form-control" required>
                                                            </div>

                                                            <!-- Batas Telat -->
                                                            <div class="mb-3">
                                                                <label for="batas_telat" class="form-label">Batas
                                                                    Telat</label>
                                                                <input type="time" name="batas_telat" id="batas_telat"
                                                                    value="{{ old('batas_telat', \Carbon\Carbon::parse($item->batas_telat)->format('H:i')) }}"
                                                                    class="form-control" required>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>


                            <!-- Modal Tambah -->

                            <div class="modal fade" id="modalCreate" tabindex="-1">
                                <div class="modal-dialog">
                                    <form action="{{ route('sesi.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5>Tambah Sesi</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label>Nama Sesi</label>
                                                    <input type="text" name="nama_sesi" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <label>Jam Datang Mulai</label>
                                                    <input type="time" name="jamdatang_mulai" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <label>Jam Datang Selesai</label>
                                                    <input type="time" name="jamdatang_selesai" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <label>Jam Pulang Mulai</label>
                                                    <input type="time" name="jampulang_mulai" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <label>Jam Pulang Selesai</label>
                                                    <input type="time" name="jampulang_selesai" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <label>Batas Telat</label>
                                                    <input type="time" name="batas_telat" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-success">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- Container-fluid Ends-->
        </div>
    </div>

@endsection

@push('scripts')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6',
                customClass: {
                    confirmButton: 'swal2-confirm-custom'
                }
            });
        </script>

        <style>
            .swal2-confirm-custom {
                color: white !important;
                /* warna teks putih */
            }
        </style>
    @endif


    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK' // ✅ Tambahkan tombol OK
            });
        </script>
    @endif
@endpush
