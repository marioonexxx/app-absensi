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

                            <!-- Tabel -->
                            <table class="table table-bordered" id="siswaTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kelas</th>
                                        <th>Sesi</th>
                                        <th>Grade</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->nama_kelas }}</td>
                                            <td>{{ $item->sesi_id }}</td>
                                            <td>{{ $item->grade }}</td>

                                            <td>
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modalEdit{{ $item->id }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('kelas.destroy', $item->id) }}" method="POST"
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
                                                <form action="{{ route('kelas.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5>Edit Kelas</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-2">
                                                                <label>Nama Kelas</label>
                                                                <input type="text" name="nama_kelas" class="form-control"
                                                                    value="{{ $item->nama_kelas }}">
                                                            </div>

                                                            <div class="mb-2">
                                                                <label for="sesi_id_{{ $item->id }}">Sesi</label>
                                                                <select name="sesi_id" id="sesi_id_{{ $item->id }}"
                                                                    class="form-control">
                                                                    <option value="">-- Pilih Sesi --</option>
                                                                    @foreach ($sesi as $s)
                                                                        <option value="{{ $s->id }}"
                                                                            {{ $item->sesi_id == $s->id ? 'selected' : '' }}>
                                                                            {{ $s->nama_sesi }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-2">
                                                                <label>Grade</label>
                                                                <select name="grade" class="form-control">
                                                                    <option value="">-- Pilih Kelas --</option>
                                                                    <option value="X"
                                                                        {{ $item->grade == 'X' ? 'selected' : '' }}>X
                                                                    </option>
                                                                    <option value="XI"
                                                                        {{ $item->grade == 'XI' ? 'selected' : '' }}>XI
                                                                    </option>
                                                                    <option value="XII"
                                                                        {{ $item->grade == 'XII' ? 'selected' : '' }}>XII
                                                                    </option>
                                                                </select>
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
                                    <form action="{{ route('kelas.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5>Tambah Kelas</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label>Nama Kelas</label>
                                                    <input type="text" name="nama_kelas" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="sesi_id">Sesi</label>
                                                    <select name="sesi_id" id="sesi_id" class="form-control">
                                                        <option value="">-- Pilih Sesi --</option>
                                                        @foreach ($sesi as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama_sesi }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-2">
                                                    <label>Grade</label>
                                                    <select name="grade" class="form-control">
                                                        <option value="">-- Pilih Kelas --</option>
                                                        <option value="X">X</option>
                                                        <option value="XI">XI</option>
                                                        <option value="XII">XII</option>
                                                    </select>
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
