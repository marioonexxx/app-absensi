<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Sistem Absensi Online SMA Negeri 1 Ambon - Login untuk mengelola dan memantau kehadiran siswa secara real-time. Mudah, cepat, dan akurat dengan teknologi berbasis web.">
    <meta name="keywords"
        content="Absensi Online, SMA Negeri 1 Ambon, Sistem Absensi Siswa, Kehadiran Siswa, Absensi Digital, Sekolah Ambon">
    <meta name="author" content="SMA Negeri 1 Ambon">

    <link rel="icon" href="{{ asset('cuba/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('cuba/assets/images/favicon.png') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet"><!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/themify.css') }}"><!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start--><!-- Plugins css Ends--><!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/bootstrap.css') }}"><!-- App css-->
    <link id="color" rel="stylesheet" href="{{ asset('cuba/assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/responsive.css') }}">
    <script defer src="{{ asset('cuba/assets/css/color-1.js') }}"></script>
    <script defer src="{{ asset('cuba/assets/css/color-2.js') }}"></script>
    <script defer src="{{ asset('cuba/assets/css/color-3.js') }}"></script>
    <script defer src="{{ asset('cuba/assets/css/color-4.js') }}"></script>
    <script defer src="{{ asset('cuba/assets/css/color-5.js') }}"></script>
    <script defer src="{{ asset('cuba/assets/css/color-6.js') }}"></script>
    <script defer src="{{ asset('cuba/assets/css/responsive.js') }}"></script>
    <script defer src="{{ asset('cuba/assets/css/style.js') }}"></script>
    <link href="{{ asset('cuba/assets/css/color-1.css') }}" rel="stylesheet">
    <link href="{{ asset('cuba/assets/css/color-2.css') }}" rel="stylesheet">
    <link href="{{ asset('cuba/assets/css/color-3.css') }}" rel="stylesheet">
    <link href="{{ asset('cuba/assets/css/color-4.css') }}" rel="stylesheet">
    <link href="{{ asset('cuba/assets/css/color-5.css') }}" rel="stylesheet">
    <link href="{{ asset('cuba/assets/css/color-6.css') }}" rel="stylesheet">
    <link href="{{ asset('cuba/assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('cuba/assets/css/style.css') }}" rel="stylesheet">
</head>

<body><!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7"><img class="bg-img-cover bg-center"
                    src="{{ asset('cuba/assets/images/login/SampleImage1.jpeg') }}" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div class="text-center">
                            <a class="logo d-block mb-2" href="index.html">
                                <img class="img-fluid for-light" width="128px"
                                    src="{{ asset('cuba/assets/images/logo/logo-smansa.png') }}" alt="Login Page">

                            </a>
                            <h1 class="fw-bold mt-2">Sistem Absen Digital</h1>
                            <p class="mb-4">SMA Negeri 1 Ambon</p>
                        </div>

                        <div class="login-main">
                            <form method="POST" action="{{ route('login') }}" class="theme-form">
                                @csrf
                                {{-- <h4>Silahkan login</h4>
                                <p>Masukan NISN Siswa</p> --}}

                                <div class="form-group">
                                    <label class="col-form-label">NISN</label>
                                    <input name="username" class="form-control" type="text" required
                                        placeholder="Masukkan NISN">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input name="password" class="form-control" type="password"
                                            name="login[password]" required placeholder="*********">
                                        <div class="show-hide"><span class="show"></span></div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="form-check mb-3">
                                        <input class="checkbox-primary form-check-input" id="checkbox1"
                                            type="checkbox">
                                        <label class="text-muted form-check-label" for="checkbox1">Remember
                                            password</label>
                                    </div>

                                    <div class="d-flex gap-2">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary w-100">Kembali</a>
                                    </div>
                                </div>


                                <p class="mt-4 mb-0 text-center">
                                    Jika terdapat permasalahan login?
                                    <a class="ms-2" href="sign-up.html">Hubungi Operator Sekolah</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!-- latest jquery-->
    <script src="{{ asset('cuba/assets/js/jquery.min.js') }}"></script><!-- Bootstrap js-->
    <script src="{{ asset('cuba/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script><!-- feather icon js-->
    <script src="{{ asset('cuba/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js--><!-- Sidebar jquery-->
    <script src="{{ asset('cuba/assets/js/config.js') }}"></script><!-- Plugins JS start--><!-- Plugins JS Ends--><!-- Theme js-->
    <script src="{{ asset('cuba/assets/js/script.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/script1.js') }}"></script>
    </div>
</body>

</html>
