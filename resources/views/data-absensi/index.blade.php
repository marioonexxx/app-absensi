<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Siswa - SMA Negeri 1 Ambon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #ff0000, #ffffff);
        }

        .card-custom {
            max-width: 700px;
            width: 100%;
            border-radius: 1.5rem;
            border: 5px solid #b30000;
            /* border merah */
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        h1 {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 50px;
            color: #670000;
        }

        h3 {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 26px;
        }

        .modal-xxl {
            max-width: 60% !important;
        }

        .sukses 
        {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 50px;
            color: #006616;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="card card-custom">
        <div class="card-header bg-transparent text-center py-4">
            <img src="{{ asset('cuba/assets/images/logo/logo-smansa.png') }}" alt="Logo SMA 1 Ambon" height="140">
            <h3 class="mt-3">Sistem Absensi Siswa</h3>
            <h1>SMA NEGERI 1 AMBON</h1>
        </div>
        <div class="card-body p-5">
            <form id="formAbsensi" action="{{ route('absensi.store') }}" method="POST">
                @csrf
                <div class="mb-3 text-center">
                    <label for="nisn" class="form-label fw-bold fs-4 d-block">Silahkan Scan Kartu Siswa Anda</label>
                    <input type="text" name="nisn" id="nisn" class="form-control form-control-lg text-center"
                        placeholder="tap kartu disini..." required autofocus>
                </div>
            </form>
        </div>
    </div>

    @if (session('siswa'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var modalEl = document.getElementById('modalDetailSiswa');
                var modal = new bootstrap.Modal(modalEl);
                modal.show();

                // auto close modal setelah 2 detik
                setTimeout(function() {
                    modal.hide();
                }, 2000);

                // balikin fokus ke input setelah modal ditutup
                modalEl.addEventListener('hidden.bs.modal', function() {
                    document.getElementById("nisn").value = "";
                    document.getElementById("nisn").focus();
                });
            });
        </script>
    @endif


    <!-- Modal Detail Siswa -->
    <div class="modal fade" id="modalDetailSiswa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xxl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header  text-dark">
                    <h5 class="modal-title">Detail Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h1 class="sukses">Berhasil melakukan absen!</h1>
                    @if (session('siswa'))
                        @php $siswa = session('siswa'); @endphp
                        <div class="row align-items-center">
                            <div class="col-md-4 text-center">
                                <img src="{{ asset('storage/' . $siswa->foto_url) }}" alt="{{ $siswa->nama_lengkap }}"
                                    class="img-fluid rounded border" width="350">

                            </div>
                            <div class="col-md-8">
                                <table class="table table-borderless">
                                    <tr>
                                        <th class="h1">ID</th>
                                        <td class="h1">{{ $siswa->id }}</td>
                                    </tr>
                                    <tr>
                                        <th class="h1">NISN</th>
                                        <td class="h1">{{ $siswa->nisn }}</td>
                                    </tr>
                                    <tr>
                                        <th class="h1">Nama Lengkap</th>
                                        <td class="h1">{{ $siswa->nama_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <th class="h1">Kelas</th>
                                        <td class="h1">{{ $siswa->kelas->nama ?? '-' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button> --}}
                </div>
            </div>
        </div>
    </div>


    <script>
        // submit otomatis saat siswa scan (enter)
        document.getElementById("nisn").addEventListener("change", function() {
            document.getElementById("formAbsensi").submit();
        });

        // fungsi buat balik fokus
        function focusInput() {
            document.getElementById("nisn").value = "";
            document.getElementById("nisn").focus();
        }

        // tampilkan notifikasi setelah redirect
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false,
                didClose: focusInput
            })
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ session('error') }}",
                timer: 2000,
                showConfirmButton: false,
                didClose: focusInput
            })
        @endif

        // fokus awal
        focusInput();
    </script>

</body>

</html>
