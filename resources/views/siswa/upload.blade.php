@extends('layouts.navbar')
@section('title', 'Dashboard Orang tua dan Siswa - Upload Surat Sakit/Ijin')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Upload Surat Sakit/Ijin</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Upload Surat Sakit/Ijin</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row starter-main">
                {{-- <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-table me-2"></i> Silahkan Upload Surat Sakit/Ijin
                            </h5>

                        </div>

                        <div class="card-body">

                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="absen_keterangan" class="form-label">Keterangan</label>
                                    <select name="absen_keterangan" id="absen_keterangan" class="form-control" required>
                                        <option value="">-- Pilih Keterangan --</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Ijin">Ijin</option>
                                    </select>
                                </div>


                                <!-- Rentang Tanggal Sakit/Ijin -->
                                <div class="mb-3">
                                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai Sakit/Ijin</label>
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai Sakit/Ijin</label>
                                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                                        required>
                                </div>

                                <!-- Upload Surat -->
                                <div class="mb-3">
                                    <label for="absen_bukti" class="form-label">Upload Surat Sakit (PDF/JPG/PNG)</label>
                                    <input type="file" name="absen_bukti" id="absen_bukti" class="form-control"
                                        accept=".pdf,.jpg,.jpeg,.png" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>

                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-table me-2"></i> Tabel Data
                            </h5>

                        </div>

                        <div class="card-body">

                            <!-- Tabel -->
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bukti</th>
                                        <th>Tanggal Mulai Ijin/Sakit</th>
                                        <th>Tanggal Selesai Ijin/Sakit</th>
                                        <th>Tgl Absen</th>
                                        <th>Jam Datang</th>
                                        <th>Jam Pulang</th>
                                        <th>Terlambat</th>
                                        <th>Keterangan</th>
                                        <th>Bukti</th>
                                        <th>Status Validasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->siswa_id }}</td>
                                            <td>{{ $item->kelas_id }}</td>
                                            <td>{{ $item->sesi_id }}</td>
                                            <td>{{ $item->absen_tgl }}</td>
                                            <td>{{ $item->absen_datang }}</td>
                                            <td>{{ $item->absen_pulang }}</td>
                                            <td>
                                                {{ $item->absen_terlambat ? $item->absen_terlambat . ' Menit' : '-' }}
                                            </td>
                                            <td>{{ $item->absen_keterangan }}</td>
                                            <td>{{ $item->absen_bukti }}</td>
                                            <td>{{ $item->validasi }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                {{-- <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modalEdit{{ $item->id }}">
                                                    <i class="fa fa-edit"></i>
                                                </button> --}}
                                                <!-- Tombol Hapus -->
                                                {{-- <form action="{{ route('siswa.destroy', $item->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form> --}}
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        {{-- <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1">
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
                                        </div> --}}
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Modal Tambah -->
                            {{-- <div class="modal fade" id="modalCreate" tabindex="-1">
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
                            </div> --}}

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
            if (!$.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true
                });
            }
        });
    </script>


@endpush
