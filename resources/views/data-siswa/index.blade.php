@extends('layouts.navbar')
@section('title', 'Dashboard Administrator')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Manajemen Data Siswa</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Manajemen Data Siswa</li>
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
                                        <th>Foto</th>
                                        <th>NISN</th>
                                        <th>Nomor Kartu</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kelas</th>
                                        <th>No. WA Ortu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                @if ($item->foto_url)
                                                    <img src="{{ asset('storage/' . $item->foto_url) }}" width="50"
                                                        height="50" alt="Foto Siswa">
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $item->nisn }}</td>
                                            <td>{{ $item->rfid }}</td>
                                            <td>{{ $item->nama_lengkap }}</td>
                                            <td>{{ $item->kelas->nama_kelas }}</td>
                                            <td>{{ $item->wa_ortu }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modalEdit{{ $item->id }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('siswa.destroy', $item->id) }}" method="POST"
                                                    style="display:inline;">
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
                                                <form action="{{ route('siswa.update', $item->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5>Edit Siswa</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-2">
                                                                <label>NISN</label>
                                                                <input type="text" name="nisn" class="form-control"
                                                                    value="{{ $item->nisn }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Nomor Kartu (RFID)</label>
                                                                <input type="text" name="rfid" class="form-control"
                                                                    value="{{ $item->rfid }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Upload Foto (Maks 1MB)</label>
                                                                <input type="file" name="foto_url" class="form-control">
                                                                @if ($item->foto_url)
                                                                    <small>Foto saat ini: <a
                                                                            href="{{ asset('storage/' . $item->foto_url) }}"
                                                                            target="_blank">Lihat</a></small>
                                                                @endif
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Nama Lengkap</label>
                                                                <input type="text" name="nama_lengkap"
                                                                    class="form-control" value="{{ $item->nama_lengkap }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Kelas</label>
                                                                <select name="kelas_id" class="form-control">
                                                                    <option value="">-- Pilih Kelas --</option>
                                                                    @foreach ($kelas as $asItem)
                                                                        <option value="{{ $asItem->id }}"
                                                                            {{ $item->kelas_id == $asItem->id ? 'selected' : '' }}>
                                                                            {{ $asItem->nama_kelas }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>No. WA Ortu</label>
                                                                <input type="text" name="wa_ortu" class="form-control"
                                                                    value="{{ $item->wa_ortu }}">
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
                                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5>Tambah Siswa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label>NISN</label>
                                                    <input type="text" name="nisn" class="form-control"
                                                        value="{{ old('nisn') }}">
                                                </div>
                                                <div class="mb-2">
                                                    <label>ID Kartu (RFID)</label>
                                                    <input type="text" name="rfid" class="form-control"
                                                        value="{{ old('rfid') }}">
                                                </div>
                                                <div class="mb-2">
                                                    <label>Upload Foto (Maks 1MB)</label>
                                                    <input type="file" name="foto_url" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap" class="form-control"
                                                        value="{{ old('nama_lengkap') }}">
                                                </div>
                                                <div class="mb-2">
                                                    <label>Kelas</label>
                                                    <select name="kelas_id" class="form-control">
                                                        <option value="">-- Pilih Kelas --</option>
                                                        @foreach ($kelas as $asItem)
                                                            <option value="{{ $asItem->id }}">{{ $asItem->nama_kelas }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <label>No. WA Ortu</label>
                                                    <input type="text" name="wa_ortu" class="form-control"
                                                        value="{{ old('wa_ortu') }}">
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

    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#siswaTable')) {
                $('#siswaTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true
                });
            }
        });
    </script>


@endpush
