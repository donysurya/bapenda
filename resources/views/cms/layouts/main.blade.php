<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argon/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('argon/img/logo_katingan.png') }}">
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('argon/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('argon/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{ asset('argon/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('argon/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />

        <!-- Another Custom Style -->
        @stack('css') 
        @stack('headscript')

        <!-- Title -->
        <title>@yield('title')</title>
    </head>

    <body class="g-sidenav-show bg-gray-100">
        <div class="min-height-300 bg-primary position-absolute w-100"></div>
        <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="{{ route('cms.home') }}" target="_blank">
                    <img src="{{ asset('argon/img/logo.png') }}" alt="main_logo" style="max-height:2.8rem!important;">
                </a>
            </div>
            <hr class="horizontal dark mt-0">
            <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('cms.home') ? 'active' : '' }}" href="{{ route('cms.home') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data</h6>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('cms.pegawai', 'cms.pegawai.*') ? 'active' : '' }}" href="{{ route('cms.pegawai') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-users text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pegawai</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('cms.publikasi', 'cms.publikasi.*') ? 'active' : '' }}" href="{{ route('cms.publikasi') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-file-pdf-o text-success text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Publikasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('cms.realisasi', 'cms.realisasi.*') ? 'active' : '' }}" href="{{ route('cms.realisasi') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-file-excel-o text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pendapatan Daerah</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('cms.uptb', 'cms.uptb.*') ? 'active' : '' }}" href="{{ route('cms.uptb') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-map-o text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Profil UPTB</span>
                        </a>
                    </li>

                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Informasi</h6>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('cms.profile.*') ? 'active' : '' }}" href="{{ route('cms.profile.bapenda') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-question-circle text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Profil Bapenda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('cms.news.*') ? 'active' : '' }}" href="{{ route('cms.news.index') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-newspaper-o text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Berita</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('cms.gallery') ? 'active' : '' }}" href="{{ route('cms.gallery') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-picture-o text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Gallery</span>
                        </a>
                    </li>

                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pengaturan</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('cms.other.*') ? 'active' : '' }}" href="{{ route('cms.other.index') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-laptop text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Landing Page</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('cms.setting.index') ? 'active' : '' }}" href="{{ route('cms.setting.index') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-cogs text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('cms.setting.address.index') ? 'active' : '' }}" href="{{ route('cms.setting.address.index') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-map-marked-alt text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Informasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('cms.logout') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-power-off text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidenav-footer mx-3 mt-3">
                <div class="card card-plain shadow-none" id="sidenavCard">
                    <img class="w-50 mx-auto" src="{{ asset('argon/img/illustrations/icon-documentation.svg') }}" alt="sidebar_illustration">
                    <div class="card-body text-center p-3 w-100 pt-0">
                        <div class="docs-info">
                            <h6 class="mb-0">Butuh bantuan?</h6>
                            <p class="text-xs font-weight-bold mb-0">Silahkan cek dokumentasi</p>
                        </div>
                    </div>
                </div>
            <a href="#" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Dokumentasi</a>
            </div>
        </aside>
        <main class="main-content position-relative border-radius-lg ">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
                <div class="container-fluid py-1 px-3">
                    @yield('breadcrumb')
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        </div>
                        <ul class="navbar-nav justify-content-end">
                            <li class="nav-item d-flex align-items-center">
                                <a href="#" class="nav-link text-white font-weight-bold px-0">
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Administrator</span>
                                </a>
                            </li>
                            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                <a href="#" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="#" class="nav-link text-white p-0">
                                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <!-- Content -->
            @yield('content')
            <!-- End Content -->
        </main>

        <!-- Setting -->
        @include('cms.partials.index')
        <!-- End Setting -->

        @include('sweetalert::alert')

        <!-- Another Custom JS -->
        @stack('bottomscript')
    
        <!--   Core JS Files   -->
        <script src="{{ asset('argon/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('argon/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('argon/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('argon/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('argon/js/plugins/chartjs.min.js') }}"></script>
        <script>
            var ctx1 = document.getElementById("chart-line").getContext("2d");

            var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

            gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
            gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
            gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
            new Chart(ctx1, {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                    label: "News",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [100, 80, 150, 50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                padding: 10,
                                color: '#fbfbfb',
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                color: '#ccc',
                                padding: 20,
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });
        </script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('argon/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
    </body>

</html>