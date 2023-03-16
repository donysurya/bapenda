<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        @vite('resources/css/app.css')
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('/img/tiny-kic-logo.png') }}"/>
    </head>
    <body>
        <!-- Content -->           
        @yield('content')
        @include('sweetalert::alert')
        @vite('resources/js/app.js')
    </body>
</html>