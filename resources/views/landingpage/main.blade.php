<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="google-site-verification" content="e9bvu5-TYhq2VjVmQGwjTfuPCwvXz6dj6dBEnotIgHo" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        
        <!-- Font Awesome Icon -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&family=Montserrat:wght@900&display=swap" rel="stylesheet">

        <!-- My CSS -->
        <link rel="stylesheet" href="{{ asset('css/main.css?v2') }}" />
        <link rel="stylesheet" href="{{ asset('css/loader.css?v2') }}" />

        <!-- Another Custom Style -->
        @stack('css') 
        @stack('headscript')

        <!-- Title -->
        <title>@yield('title')</title>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=GTM-THPH67Q"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'GTM-THPH67Q');
        </script>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('img/logo_katingan.png') }}"/>
    </head>
    <body style="background:linear-gradient(to right, #d12219, #e88898);">

        <!-- Preloader -->
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        
        <!-- Header -->
        <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
            <i class="bi bi-chevron-up"></i>
        </button>
        <nav id="navbar_top" class="navbar rounded-bottom navbar-expand-lg navbar-light bg-light main-navigation shadow-lg" id="navbar">
            <div class="container-fluid px-3">
                <a class="navbar-brand py-0" href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="" width="150px" srcset=""></a>

                <button class="btn btn-outline-danger navbar-toggler" type="button">
                    <span class="bi bi-list"></span>
                </button>

                <div class="overlay d-flex d-lg-none"></div>
                <div class="order-lg-2 bg-light d-lg-flex w-100 sidebar pb-lg-0">
                    <ul class="navbar-nav d-lg-none d-md-block d-block py-3">
                        <a class="navbar-brand px-3" href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="" class="w-50" srcset=""></a>
                    </ul>
                    <ul class="navbar-nav ms-lg-auto mb-2 pt-2">
                        <li class="nav-item">
                            <a class="nav-link px-3 px-lg-2 active" aria-current="page" href="{{route('home')}}">
                                <i class="bi bi-house-door"></i>
                                &nbsp;Home
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link px-3 px-lg-2 dropdown-toggle" href="#" id="dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-info-circle"></i>
                                &nbsp;Informasi
                            </a>
                            <ul class="dropdown-menu me-3" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('about.visi_misi')}}">Tentang Kami</a></li>
                                <li><a class="dropdown-item" href="{{route('uptb.index')}}">Profil UPTB</a></li>
                                <li><a class="dropdown-item" href="{{route('gallery')}}">Foto Galeri</a></li>
                                <li><a class="dropdown-item" href="{{route('realisasi.index')}}">Realisasi Pendapatan Daerah</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 px-lg-2" href="{{route('home')}}#services">
                                <i class="bi bi-collection"></i>
                                &nbsp;Jenis Pelayanan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 px-lg-2" href="{{route('download')}}">
                                <i class="bi bi-file-earmark-pdf"></i>
                                &nbsp;Publikasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 px-lg-2" href="{{route('home')}}#faq">
                                <i class="bi bi-question-circle"></i>
                                &nbsp;FAQ
                            </a>
                        </li>
                        <li class="nav-item ms-lg-3 ms-md-0 ms-0 me-lg-0 me-md-4 me-4">
                            <a class="nav-link px-3 px-lg-2 bg-danger text-light rounded" href="#!" data-bs-toggle="modal" data-bs-target="#contact">
                                <i class="bi bi-headset"></i>
                                &nbsp;Hubungi Kami
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content -->
        @yield('content')

        <!-- Footer -->
        <footer class="bg-light mt-5">
            <div class="row align-items-center py-5 gy-4">
                <div class="col-lg-4 col-md-12 col-12 text-center mt-0">
                    <a href="#!" class="text-decoration-none"><img src="{{ asset('img/logo.png') }}" class="w-50" alt="" srcset=""></a>
                </div>
                <div class="col-lg-4 col-md-12 col-12 text-center">
                    <p class="fw-bold mb-0">&copy; Badan Pendapatan Daerah</p>
                    <p class="fw-bold mb-0">Jl. Garuda Komplek Kantor Bupati</p>
                    <p class="fw-bold mb-0">Kasongan, Kabupaten Katingan</p>
                    <p class="fw-bold mb-0">Kalimantan Tengah 74413</p>
                </div>
                <div class="col-lg-4 col-md-12 col-12 text-center">
                    <p class="mb-2 fw-bold">Follow Us</p>
                    <a href="#!" class="rounded m-1"><i class="bi bi-facebook fa-2x"></i></a>
                    <a href="#!" class="rounded m-1"><i class="bi bi-instagram fa-2x"></i></a>
                    <a href="#!" class="rounded m-1"><i class="bi bi-twitter fa-2x"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center py-2 bg-nav shadow">
                    <small class="fw-bold">&copy; Copyright 2022 - Badan Pendapatan Daerah Kab. Katingan</small>
                </div>
            </div>
        </footer>

        <!-- Contact -->
        <div class="modal fade" id="contact" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="contactLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered">
                <div class="modal-content" style="background: #ffffff!important;">

                    <div class="modal-body mb-4">
                        <div class="row justify-content-between align-items-center m-0 mb-3">
                            <div class="col-md-6 col-9">
                                <h4 class="modal-title fw-bold" id="contactLabel"><i class="bi bi-headset me-2"></i>Hubungi Kami</h4>
                            </div>
                            <div class="col-md-6 col-3 text-end">
                                <button type="button" style="background: #ffffff!important;" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle fa-2x text-dark"></i></button>
                            </div>
                        </div>
                        <hr class="bg-secondary">
                        <div class="row gy-3 mt-2 align-items-center rounded px-3">
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <h4 class="mb-3 fw-bold"><i class="bi bi-info-circle me-2"></i>Informasi</h4>
                                        <p class="fw-lighter mb-1"><i class="bi bi-geo-alt me-2"></i> {{$address->alamat}}</p>
                                        <p class="fw-lighter mb-1"><i class="bi bi-telephone me-2"></i> {{$address->no_telp}}</p>
                                        <p class="fw-lighter mb-1"><i class="bi bi-envelope me-2"></i> {{$address->email}}</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <h4 class="mb-3 fw-bold"><i class="bi bi-stopwatch me-2"></i>Jam Pelayanan</h4>
                                        @forelse($officehours as $index => $item)   
                                            <p class="fw-lighter mb-1">{{ $item->day }} &nbsp; : &nbsp;{{ $item->start_time }} – {{ $item->end_time }} WIB</p>
                                        @empty
                                            <p class="fw-lighter mb-1">Senin – Jumat &nbsp; : &nbsp;Tutup</p>
                                        @endforelse
                                        <p class="fw-lighter mb-1">Sabtu – Minggu &nbsp; : &nbsp;Tutup</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="mb-3 fw-bold"><i class="bi bi-pin-map me-2"></i>Lokasi</h4>
                                        <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3" style="max-width: 100%; position: relative; clear: both; max-height: 355px; text-align: left;">
                                            <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3">
                                                <iframe height="355" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3987.670917506185!2d113.3984684!3d-1.8799111!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dfce347eaed5de1%3A0x6f0429a75d729f34!2sBadan%20Pendapatan%20Daerah%20Kabupaten%20Katingan!5e0!3m2!1sid!2sid!4v1686716015136!5m2!1sid!2sid" style="max-width: 100%; width: 100%; border: none; padding: 0px; margin: 0px; height: 355px;">
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Another Custom JS -->

        @stack('bottomscript')

        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="{{ asset('js/main.js?v2') }}"></script>
        
        <script>
            // Hide Navbar on scroll down
            var prevScrollpos = window.pageYOffset;
            window.onscroll = function() {
                var currentScrollPos = window.pageYOffset;
                if (prevScrollpos > currentScrollPos) {
                    document.getElementById("navbar").style.top = "0";
                } else {
                    document.getElementById("navbar").style.top = "-80px"; 
                }
                prevScrollpos = currentScrollPos;
            }

            const mainNavigation = document.querySelector(".main-navigation");
            const overlay = mainNavigation.querySelector(".overlay");
            const toggler = mainNavigation.querySelector(".navbar-toggler");

            const openSideNav = () => mainNavigation.classList.add("active");
            const closeSideNav = () => mainNavigation.classList.remove("active");
            toggler.addEventListener("click", openSideNav);
            overlay.addEventListener("click", closeSideNav);
        </script>

        <script>
            //Get the button
            let mybutton = document.getElementById("btn-back-to-top");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function () {
                scrollFunction();
            };

            function scrollFunction() {
                if (
                    document.body.scrollTop > 20 ||
                    document.documentElement.scrollTop > 20
                ) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }
            // When the user clicks on the button, scroll to the top of the document
            mybutton.addEventListener("click", backToTop);

            function backToTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
    </body>
</html>