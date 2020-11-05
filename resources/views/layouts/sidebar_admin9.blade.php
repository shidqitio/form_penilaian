<div class="app-main">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                    <li class="app-sidebar__heading">Dashboards</li>
                    <li>
                        <a href="/admin">
                            <i class="metismenu-icon pe-7s-rocket"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Masa Ujian</li>
                    <li>
                        <a href="/admin/masaujian">
                            <i class="metismenu-icon pe-7s-timer"></i>
                            Tambah Masa Ujian
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Laporan</li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Pilih Laporan
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="/admin/laporan">
                                    <i class="metismenu-icon"></i>
                                    Laporan Pemantau
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="/admin/laporanupbjj">
                                    <i class="metismenu-icon"></i>
                                    Laporan UPBJJ
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="/admin/laporanpjtu">
                                    <i class="metismenu-icon"></i>
                                    Laporan PJTU/PJLU
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="/admin/laporanfeedback">
                                    <i class="metismenu-icon"></i>
                                    Laporan Feedback
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="/admin/laporanevaluasi">
                                    <i class="metismenu-icon"></i>
                                    Laporan Evaluasi
                                </a>
                            </li>
                        </ul>
                    <li class="app-sidebar__heading">Lampiran</li>
                    <li>
                        <a href="/admin/uploadsurat" class="mm-active">
                            <i class="metismenu-icon pe-7s-upload"></i>
                            Upload Lampiran
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Keluar</li>
                    <li>
                        <a href="" ref="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            <i class="metismenu-icon pe-7s-power"></i>
                            Keluar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>