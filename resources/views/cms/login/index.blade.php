<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('img/logo_katingan.png') }}"/>

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GTM-THPH67Q"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'GTM-THPH67Q');
    </script>

    <title>Administrator Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah</title>
</head>
<body class="bg-danger">
<div class="container">
    <div class="row d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-5">
            <form class="shadow-lg px-5 py-4 rounded bg-light" action="{{ route('cms.login.check') }}" method="post">
                @csrf
                <div class="mb-4 border-bottom border-danger text-center">
                    <h3 class="pb-2 text-danger"><i class="fas fa-sign-in-alt me-2"></i>Administrator Login</h3>
                </div>
                <div class="text-center mb-4">
                    <img src="{{asset('img/logo.png')}}" alt="logo" class="img-fluid" style="width: 50%">
                </div>
                <div class="mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="Email" autofocus placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="border-top border-danger d-flex justify-content-center mb-4">
                    <button type="submit" class="btn btn-danger text-light p-2 px-4 my-3"><i class="bi bi-box-arrow-in-right me-2"></i> LOGIN</button>
                </div>

                <div class="d-flex justify-content-center">
                    <p class="fw-light text-danger">
                        <i class="bi bi-envelope"></i> bapenda@katingankab.go.id
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
