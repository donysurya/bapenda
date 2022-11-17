<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/cms/styles.css') }}">
        @stack('css') 
        @stack('headscript')
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <script src="https://kit.fontawesome.com/19b42cd13d.js" crossorigin="anonymous"></script>
        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('/img/logo_katingan.png') }}"/>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-navbar">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 d-flex align-items-center" href="{{ route('cms.home') }}">
                <img src="{{ asset('/img/logo_katingan.png') }}" alt="" width="28px" srcset="" class="me-2"> Bapenda Admin
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{route('cms.logout')}}">
                                <i class="fas fa-power-off text-primary me-2"></i>{{ __('Logout') }}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main Menu</div>
                            <a class="nav-link {{ Route::is('cms.home') ? 'active' : '' }}" href="{{ route('cms.home') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-laptop-code text-primary"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link {{ Route::is('cms.pegawai') ? 'active' : '' }}" href="{{ route('cms.pegawai') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users text-primary"></i></div>
                                Pegawai
                            </a>
                            <a class="nav-link {{ Route::is('cms.publikasi') ? 'active' : '' }}" href="{{ route('cms.publikasi') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-pdf text-primary"></i></div>
                                Publikasi
                            </a>
                            <div class="sb-sidenav-menu-heading">Informasi</div>
                            <a class="nav-link {{Route::is('cms.profile.*') ? 'active' : 'collapsed'}} " href="#" data-bs-toggle="collapse" data-bs-target="#collapseInformation" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-info-circle text-primary"></i></div>
                                Profil Bapenda
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="{{Route::is('cms.profile.*') ? '' : 'collapse'}}" id="collapseInformation" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{Route::is('cms.profile.visi_misi') ? 'active' : ''}}" href="{{route('cms.profile.visi_misi')}}"><i class="fas fa-file-alt text-primary me-2"></i>Visi & Misi</a>
                                    <a class="nav-link {{Route::is('cms.profile.sejarah') ? 'active' : ''}}" href="{{route('cms.profile.sejarah')}}"><i class="fas fa-landmark text-primary me-2"></i>Sejarah</a>
                                    <a class="nav-link {{Route::is('cms.profile.kepala') ? 'active' : ''}}" href="{{route('cms.profile.kepala')}}"><i class="fas fa-portrait text-primary me-2"></i>Kepala Bapenda</a>
                                    <a class="nav-link {{Route::is('cms.profile.struktur') ? 'active' : ''}}" href="{{route('cms.profile.struktur')}}"><i class="fas fa-sitemap text-primary me-2"></i>Struktur Organisasi</a>
                                </nav>
                            </div>
                            <a class="nav-link {{ Route::is('cms.uptb') ? 'active' : '' }}" href="{{ route('cms.uptb') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-info-circle text-primary"></i></div>
                                Profil UPTB
                            </a>
                            <a class="nav-link {{ Route::is('cms.gallery') ? 'active' : '' }}" href="{{ route('cms.gallery') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-images text-primary"></i></div>
                                Gallery
                            </a>
                            <a class="nav-link {{ Route::is('cms.services') ? 'active' : '' }}" href="{{ route('cms.services') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-info-circle text-primary"></i></div>
                                Pembayaran
                            </a>
                            <a class="nav-link {{ Route::is('cms.portal') ? 'active' : '' }}" href="{{ route('cms.portal') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-link text-primary"></i></div>
                                Portal
                            </a>
                            <a class="nav-link {{ Route::is('cms.video') ? 'active' : '' }}" href="{{ route('cms.video') }}">
                                <div class="sb-nav-link-icon"><i class="fab fa-youtube text-primary"></i></div>
                                Video
                            </a>
                            <a class="nav-link {{ Route::is('cms.infografis') ? 'active' : '' }}" href="{{ route('cms.infografis') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-image text-primary"></i></div>
                                Infografis
                            </a>
                            <a class="nav-link {{ Route::is('cms.faq') ? 'active' : '' }}" href="{{ route('cms.faq') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-question-circle text-primary"></i></div>
                                FAQ
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Bapenda Administrator
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                @yield('content')
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">&copy; Copyright 2022 - Badan Pendapatan Daerah Kab. Katingan</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        @include('sweetalert::alert')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <!-- <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script> -->
        <!-- <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script> -->
        <script src="{{ asset('js/datatables-simple-demo.js') }}"></script> 
        @stack('script')
    </body>
</html>
