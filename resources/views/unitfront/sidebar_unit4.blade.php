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
                    <li class="app-sidebar__heading">Dashboard</li>
                    <li>
                        <a href="/pemantau">
                            <i class="metismenu-icon pe-7s-rocket"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Download</li>
                    <li class="mm-active">
                        <a href="#">
                            <i class="metismenu-icon pe-7s-bookmarks"></i>
                            Laporan
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul class="mm-show">
                            <li>
                                <a href="/unit/laporanpemantau">
                                    <i class="metismenu-icon"></i>
                                    Laporan Pemantauan
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="/unit/laporanupbjj">
                                    <i class="metismenu-icon"></i>
                                    Laporan UPBJJ
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="/unit/laporanpjtu" class="mm-active">
                                    <i class="metismenu-icon"></i>
                                    Laporan PJTU/PJLU
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="/unit/laporanfeedback">
                                    <i class="metismenu-icon"></i>
                                    Laporan Feedback
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="/unit/laporanevaluasi">
                                    <i class="metismenu-icon"></i>
                                    Laporan Evaluasi
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="app-sidebar__heading">Keluar</li>
                    <li>
                        <a href="" ref="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            <i class="metismenu-icon pe-7s-power"></i>
                            Keluar
                        </a>
                        <!-- <button type="button" tabindex="0" class="btn btn-danger" ref="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">Logout</button> -->
                    </li>
                </ul>
            </div>
        </div>
    </div>