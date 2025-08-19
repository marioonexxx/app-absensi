<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Absensi Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-light">

    <div class="container py-5">
        <h2 class="text-center mb-4">Form Tap-In Absensi SMA N 1 Ambon</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('absen.read') }}" method="GET" id="rfidForm">
                    <input type="text" name="nisn" id="nisnInput" class="form-control form-control-lg text-center"
                        placeholder="Tap kartu di sini..." autofocus autocomplete="off">
                </form>
            </div>
        </div>
    </div>

    {{-- Modal tampil data --}}
    @if (session('siswa'))
        @php $siswa = session('siswa'); @endphp
        <div class="modal fade" id="siswaModal" tabindex="-1" aria-labelledby="siswaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Data Siswa</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>NISN</th>
                                <td>{{ $siswa->nisn }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>{{ $siswa->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td>{{ $siswa->kelas }}</td>
                            </tr>
                            <tr>
                                <th>Jam Tap-In</th>
                                <td>{{ now()->format('H:i:s') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- SweetAlert jika error --}}
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Data tidak ditemukan',
                text: '{{ session('error') }}',
                showConfirmButton: false, // Jangan tampilkan tombol
                timer: 2000, // Tutup otomatis setelah 2 detik
                timerProgressBar: true
            });
        </script>
    @endif


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('nisnInput');
            const form = document.getElementById('rfidForm');

            // Otomatis submit jika panjang input cukup
            input.addEventListener('input', function() {
                if (this.value.length >= 2) {
                    form.submit();
                }
            });

            // Tampilkan modal jika data ditemukan
            @if (session('siswa'))
                const modal = new bootstrap.Modal(document.getElementById('siswaModal'));
                modal.show();

                setTimeout(() => {
                    modal.hide();
                    input.value = '';
                    input.focus();
                }, 3000);
            @elseif (session('error'))
                setTimeout(() => {
                    input.value = '';
                    input.focus();
                }, 500);
            @endif
        });
    </script>

</body>

</html>
