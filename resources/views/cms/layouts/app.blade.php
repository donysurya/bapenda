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
                            {{--<div class="sb-sidenav-menu-heading">Users</div>
                            <a class="nav-link {{ Route::is('cms.user') ? 'active' : '' }}" href="{{ route('cms.user') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users text-primary"></i></div>
                                All Users
                            </a>
                            <a class="nav-link {{ Route::is('cms.activity') ? 'active' : '' }}" href="{{ route('cms.activity') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users-cog text-primary"></i></div>
                                Log Activity
                            </a>

                            <div class="sb-sidenav-menu-heading">Orders</div>
                            <a class="nav-link {{ Route::is('cms.order') ? 'active' : '' }}" href="{{ route('cms.order') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart text-primary"></i></div>
                                All Orders
                            </a>
                            <a class="nav-link {{ Route::is('cms.wd-usdt.index') ? 'active' : '' }}" href="{{ route('cms.wd-usdt.index') }}">
                                <div class="sb-nav-link-icon"><i class="bi bi-upload text-primary"></i></div>
                                Withdraw USDT
                            </a>
                            <div class="sb-sidenav-menu-heading">Bonus</div>
                            <a class="nav-link {{ Route::is('cms.bonus') ? 'active' : '' }}" href="{{ route('cms.bonus') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-gift text-primary"></i></div>
                                Koisan Bonus
                            </a>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link {{ Route::is('cms.package') ? 'active' : '' }}" href="{{ route('cms.package') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-cubes text-primary"></i></div>
                                Package
                            </a>
                            <a class="nav-link {{ Route::is('cms.landing_page.faq') ? 'active' : '' }}" href="{{ route('cms.landing_page.faq') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-question-circle text-primary"></i></div>
                                FAQ
                            </a>
                            <a class="nav-link {{ Route::is('cms.landing_page.privacy_policy') ? 'active' : '' }}" href="{{ route('cms.landing_page.privacy_policy') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-shield-alt text-primary"></i></div>
                                Privacy Policy
                            </a>
                            <a class="nav-link {{ Route::is('cms.landing_page.term_condition') ? 'active' : '' }}" href="{{ route('cms.landing_page.term_condition') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-contract text-primary"></i></div>
                                Terms & Conditions
                            </a>--}}
                            {{--<div class="sb-sidenav-menu-heading">Scholarships</div>
                            <a class="nav-link {{ Route::is('admin.manager') ? 'active' : '' }}" href="{{ route('admin.manager') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks text-primary"></i></div>
                                Manager
                            </a>
                            <a class="nav-link {{ Route::is('admin.scholar') ? 'active' : '' }}" href="{{ route('admin.scholar') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks text-primary"></i></div>
                                Scholar
                            </a>
                            <a class="nav-link {{ Route::is('admin.withdraw') ? 'active' : '' }}" href="{{ route('admin.withdraw') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-check text-primary"></i></div>
                                Withdraw
                            </a>
                            @if(auth()->guard('admin')->user()->name == 'SGMS Admin')
                                <a class="nav-link {{ Route::is('admin.withdraw-foundation') ? 'active' : '' }}" href="{{ route('admin.withdraw-foundation') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-money-check text-primary"></i></div>
                                    Withdraw Foundation
                                </a>
                                <a class="nav-link {{ Route::is('admin.log-files') ? 'active' : '' }}" href="{{ route('admin.log-files') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-cogs text-primary"></i></div>
                                    Log Files
                                </a>
                            @endif

                            <div class="sb-sidenav-menu-heading">Account</div>
                            <a class="nav-link {{ Route::is('admin.setting') ? 'active' : '' }}" href="{{ route('admin.setting') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-cog text-primary"></i></div>
                                Setting
                            </a>
                            <a class="nav-link {{ Route::is('admin.wallet') ? 'active' : '' }}" href="{{ route('admin.wallet') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-wallet text-primary"></i></div>
                                Wallet
                            </a>

                            <div class="sb-sidenav-menu-heading">Support</div>
                            <a class="nav-link {{ Route::is('admin.support') ? 'active' : '' }}" href="{{ route('admin.support') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-headset text-primary"></i></div>
                                Feedback
                            </a>--}}
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
