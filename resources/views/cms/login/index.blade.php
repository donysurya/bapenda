<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argon/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('argon/img/logo_katingan.png') }}"/>
        <title>
            Administrator | Login
        </title>
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
    </head>

    <body class="">
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow bg-danger position-absolute mt-4 py-2 start-0 end-0 mx-4">
                        <div class="container-fluid">
                            <a class="navbar-brand font-weight-bolder " href="#">
                                CMS Panel | Bapenda
                            </a>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div>
        <main class="main-content mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                                <div class="card card-plain">
                                    <div class="card-header pb-0 text-start">
                                        <div class="mb-3">
                                            <img src="{{ asset('argon/img/logo.png') }}" alt="logo" class="img-fluid" style="width: 50%">
                                        </div>
                                        <h4 class="font-weight-bolder">Login Administrator</h4>
                                        <p class="mb-0">Input email & password untuk melakukan login</p>
                                    </div>
                                    <div class="card-body">
                                        <form role="form" action="{{ route('cms.login.check') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="Email" autofocus placeholder="Email" aria-label="Email" id="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" aria-label="Password" id="password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-lg btn-danger btn-lg w-100 mt-4 mb-0">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-header pt-2 text-start">
                                        <p class="mb-0 text-danger fw-bold"><span class="ni ni-email-83 me-2"></span>bapenda@katingankab.go.id</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                                <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg'); background-size: cover;">
                                    <span class="mask bg-gradient-primary opacity-6"></span>
                                    <h4 class="mt-5 text-white font-weight-bolder position-relative">"Administration / CMS Panel"</h4>
                                    <p class="text-white position-relative">Merupakan bagian yang bertujuan untuk membantu melakukan pengelolaan terhadap konten-konten yang akan ditampilkan kepada para pengunjung website.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--   Core JS Files   -->
        <script src="{{ asset('argon/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('argon/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('argon/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('argon/js/plugins/smooth-scrollbar.min.js') }}"></script>
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