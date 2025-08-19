<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sistem Absensi Siswa SMA Negeri 1 Ambon</title>
    <meta name="Sistem Absensi Siswa SMA Negeri 1 Ambon" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('bootslander/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('bootslander/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('bootslander/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootslander/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('bootslander/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('bootslander/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootslander/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('bootslander/assets/css/main.css') }}" rel="stylesheet">


</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="#" class="logo d-flex align-items-center">
                <img src="{{ asset('bootslander/assets/img/logo-smansa.png') }}" alt="Logo"
                    style="height: 40px; margin-right: 8px;">
                <h1 class="sitename mb-0">SMAN 1 AMBON</h1>
            </a>


            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    {{-- <li><a href="#features">Features</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#pricing">Pricing</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul> --}}
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <img src="{{ asset('bootslander/assets/img/hero-bg-2.jpg') }}" alt="" class="hero-bg">

            <div class="container">
                <div class="row gy-4 justify-content-between">
                    <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
                        <img src="{{ asset('bootslander/assets/img/hero-img.png') }}" class="img-fluid animated"
                            alt="">
                    </div>

                    <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
                        <h1><span>SISTEM ABSEN ONLINE SMA NEGERI 1 AMBON</span></h1>
                        <p>Absen Online dengan Fitur Reporting dan Notifikasi Kepada Orang Tua</p>
                        <div class="d-flex">
                            <a href="{{ route('login') }}" class="btn-get-started">Silahkan Login</a>
                            {{-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
                        </div>
                    </div>

                </div>
            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28 " preserveAspectRatio="none">
                <defs>
                    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                    </path>
                </defs>
                <g class="wave1">
                    <use xlink:href="#wave-path" x="50" y="3"></use>
                </g>
                <g class="wave2">
                    <use xlink:href="#wave-path" x="50" y="0"></use>
                </g>
                <g class="wave3">
                    <use xlink:href="#wave-path" x="50" y="9"></use>
                </g>
            </svg>

        </section><!-- /Hero Section -->
        <!-- Stats Section -->
        <section id="stats" class="stats section light-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-emoji-smile"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Jumlah Siswa</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-journal-richtext"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Jumlah Siswa Kehadiran Hari Ini</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-headset"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="1463"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Jumlah Siswa Terlambat Hari Ini</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-people"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Jumlah Siswa Tidak Hadir Hari Ini</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->


        <!-- Panduan Section -->
        <section id="panduan" class="panduan section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Panduan</h2>
                <div><span>UPLOAD SURAT SAKIT/IJIN</span> <span class="description-title">Panduan</span></div>
            </div>
            <!-- End Section Title -->

            <div class="container">   

                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
                        <img src="{{ asset('bootslander/assets/img/details-3.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7" data-aos="fade-up">
                        <h3>Langkah-langkah upload surat sakit/ijin bagi orang tua siswa : </h3>
                        
                        <ul>
                            <li><i class="bi bi-check"></i> <span>Silahkan login menggunakan NISN.</span></li>
                            <li><i class="bi bi-check"></i><span> Pilih Menu Upload Surat Sakit/Ijin.</span></li>
                            <li><i class="bi bi-check"></i> <span>Upload Surat Sakit/Ijin</span>.</li>
                            <li><i class="bi bi-check"></i> <span>Berhasil!</span>.</li>
                        </ul>
                    </div>
                </div><!-- Features Item -->

               
            </div>

        </section>
        <!-- /Panduan Section -->






    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">SMA Negeri 1 Ambon</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Jl. Pattimura No.28, Uritetu, Kec. Sirimau, Kota Ambon, Maluku</p>
                        <p>Kota Ambon, Maluku 97124</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+62 812 25052300</span></p>
                        <p><strong>Email:</strong> <span>terataismansa@gmail.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Link terkait</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a target="_blank" href="#">Tutorial</a></li>

                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Layanan Sekolah</h4>
                    <ul>
                        <li><a target="_blank" href="#">Website Sekolah</a></li>
                        <li><a target="_blank" href="#">Sistem Absen</a></li>
                        <li><a target="_blank" href="#">Sistem Akademik</a></li>
                        <li><a target="_blank"
                                href="https://sites.google.com/guru.sma.belajar.id/simaksman1ambon/dashboard-pantau-pembelajaran?authuser=0">Dashboard
                                Pembelajaran</a></li>

                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <h4>Lokasi Sekolah</h4>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6589.199205423083!2d128.18269837497382!3d-3.69721029627675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6ce90041f05151%3A0xcfa423a32f5a134a!2sSMA%20Negeri%201%20Ambon!5e1!3m2!1sen!2sid!4v1755097881842!5m2!1sen!2sid"
                        width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">SMAN 1 Ambon</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">SMANSA IT Team</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('bootslander/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootslander/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('bootslander/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('bootslander/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('bootslander/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('bootslander/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('bootslander/assets/js/main.js') }}"></script>

</body>

</html>
