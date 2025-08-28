<div class="sidebar-wrapper" data-sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="#"><img class="img-fluid for-light"
                    src="{{ asset('cuba/assets/images/logo/logo.png') }}" alt=""><img class="img-fluid for-dark"
                    src="{{ asset('cuba/assets/images/logo/logo_dark.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa-solid fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                    src="{{ asset('cuba/assets/images/logo/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                {{-- ROLE ADMINISTRATOR --}}
                @if (Auth::check() && Auth::user()->role == '0')
                    <ul class="sidebar-links" id="simple-bar">
                        <li class="back-btn">
                            <div class="mobile-back text-end"><span>Back</span><i class="fa-solid fa-angle-right ps-2"
                                    aria-hidden="true"></i></div>
                        </li>
                        <li class="pin-title sidebar-main-title">
                            <div>
                                <h6>Pinned</h6>
                            </div>
                        </li>
                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title link-nav" href="#" target="_blank">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Dashboard</span></a>
                        </li>
                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title link-nav" href="{{ route('siswa.index') }}"
                                target="_self">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-user') }}"></use>
                                </svg><span>Data Siswa</span></a>
                        </li>
                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title link-nav" href="{{ route('kelas.index') }}"
                                target="_self">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-reports') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-reports') }}"></use>
                                </svg><span>Data Kelas</span></a>
                        </li>
                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title link-nav" href="{{ route('absensi.rekap') }}"
                                target="_self">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-reports') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-reports') }}"></use>
                                </svg><span>Rekap Absen</span></a>
                        </li>
                        {{-- <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title link-nav" href="{{ route('absen.index') }}"
                                target="_self">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-reports') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-reports') }}"></use>
                                </svg><span>Ambil Absen</span></a>
                        </li> --}}

                        

                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-api') }}">
                                    </use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-api') }}">
                                    </use>
                                </svg><span>Pengaturan</span></a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="#">Waktu Absen
                                    </a>
                                    <a href="{{ route('sesi.index') }}">Sesi Sekolah
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title link-nav" href="#" target="_self">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-user') }}"></use>
                                </svg><span>Akun Anda</span></a>
                        </li>

                    </ul>
                @endif
                {{-- ROLEKEPSEK --}}
                @if (Auth::check() && Auth::user()->role == '1')
                    <ul class="sidebar-links" id="simple-bar">
                        <li class="back-btn">
                            <div class="mobile-back text-end"><span>Back</span><i class="fa-solid fa-angle-right ps-2"
                                    aria-hidden="true"></i></div>
                        </li>
                        <li class="pin-title sidebar-main-title">
                            <div>
                                <h6>Pinned</h6>
                            </div>
                        </li>
                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title link-nav" href="#" target="_blank">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Dashboard</span></a>
                        </li>
                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title link-nav" href="{{ route('siswa.index') }}"
                                target="_self">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-reports') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-reports') }}"></use>
                                </svg><span>Laporan Absensi</span></a>
                        </li>
                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title link-nav" href="#" target="_self">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-user') }}"></use>
                                </svg><span>Akun Anda</span></a>
                        </li>

                    </ul>
                @endif
                {{-- ROLE PETUGAS ABSEN --}}
                @if (Auth::check() && Auth::user()->role == '5')
                    <ul class="sidebar-links" id="simple-bar">
                        <li class="back-btn">
                            <div class="mobile-back text-end"><span>Back</span><i class="fa-solid fa-angle-right ps-2"
                                    aria-hidden="true"></i></div>
                        </li>
                        <li class="pin-title sidebar-main-title">
                            <div>
                                <h6>Pinned</h6>
                            </div>
                        </li>
                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title link-nav" href="#" target="">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Dashboard</span></a>
                        </li>
                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-internationalization') }}">
                                    </use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-internationalization') }}">
                                    </use>
                                </svg><span>Server Absen</span></a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a target="_blank" href="{{ route('absensi.index') }}">Server 1
                                    </a>
                                    <a href="#">Server 2
                                    </a>
                                    <a href="#">Server 3
                                    </a>
                                    <a href="#">Server 4
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title link-nav" href="#" target="">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-to-do') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-to-do') }}"></use>
                                </svg><span>Validasi Absen</span></a>
                        </li>

                    </ul>
                @endif

                {{-- ROLE SISWA DAN ORANG TUA --}}
                @if (Auth::check() && Auth::user()->role == '4')
                    <ul class="sidebar-links" id="simple-bar">
                        <li class="back-btn">
                            <div class="mobile-back text-end"><span>Back</span><i class="fa-solid fa-angle-right ps-2"
                                    aria-hidden="true"></i></div>
                        </li>
                        <li class="pin-title sidebar-main-title">
                            <div>
                                <h6>Pinned</h6>
                            </div>
                        </li>
                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title link-nav" href="{{ route('siswa.dashboard') }}" >
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Dashboard</span></a>
                        </li>
                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title link-nav" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Rekapan Absen</span></a>
                        </li>
                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                class="sidebar-link sidebar-title link-nav" href="{{ route('surat-ijin.index') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Upload Surat Keterangan</span></a>
                        </li>
                       
                    </ul>
                @endif


            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
