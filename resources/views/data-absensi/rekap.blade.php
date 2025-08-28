@extends('layouts.navbar')
@section('title', 'Rekapan Absensi Harian')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Rekapan Absensi Harian</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Rekapan Absensi Harian</li>
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
                            <h5>Tabel Data</h5>
                        </div>
                        <div class="card-body">

                            <!-- Tabel -->
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Siswa ID</th>
                                        <th>Kelas ID</th>
                                        <th>Sesi ID</th>
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
                                            <td>{{ $item->siswa->nama_lengkap }}</td>
                                            <td>{{ $item->siswa->kelas->nama_kelas }}</td>
                                            <td>{{ $item->siswa->kelas->sesi->nama_sesi }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->absen_tgl)->translatedFormat('j F Y') }}
                                            </td>
                                            <td>{{ $item->absen_datang }}</td>
                                            <td>{{ $item->absen_pulang }}</td>
                                            <td>
                                                @if (is_null($item->absen_terlambat))
                                                    <span class="badge bg-success">Tidak Terlambat</span>
                                                @else
                                                    <span class="badge bg-danger">{{ $item->absen_terlambat }} Menit</span>
                                                @endif
                                            </td>

                                            <td>{{ $item->absen_keterangan }}</td>
                                            <td>{{ $item->absen_bukti }}</td>
                                            <td>
                                                @switch($item->absen_validasi)
                                                    @case(1)
                                                        <span class="badge bg-success">Valid</span>
                                                    @break

                                                    @case(2)
                                                        <span class="badge bg-danger">Ijin/Sakit Ditolak</span>
                                                    @break

                                                    @case(3)
                                                        <span class="badge bg-info">Validasi Wali Kelas</span>
                                                    @break

                                                    @case(4)
                                                        <span class="badge bg-warning">Validasi Guru Piket</span>
                                                    @break

                                                    @default
                                                        <span class="badge bg-secondary">Belum Divalidasi</span>
                                                @endswitch
                                            </td>

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
