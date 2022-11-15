@extends('landingpage.main')

@section('title', 'Infografis Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@endpush

@push('headscript')
@endpush

@section('content')
    <div class="container-fluid mx-0 px-0">
        <div class="row gy-3 mt-3 px-3">
            <div class="col-lg-12 p-4 pt-0">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-dark fw-bold my-2"><i class="bi bi-images me-2"></i>Infografis Bapenda Katingan</h5>
                    </div>
                    <div class="card-body p-4 pb-0">
                        <h5 class="fw-bold">File Infografis</h5>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-6 p-2">
                                <img src="{{ asset('img/infografis/1.jpeg') }}" class="rounded w-100" alt="...">
                            </div>
                            <div class="col-lg-3 col-md-4 col-6 p-2">
                                <img src="{{ asset('img/infografis/1.jpeg') }}" class="rounded w-100" alt="...">
                            </div>
                            <div class="col-lg-3 col-md-4 col-6 p-2">
                                <img src="{{ asset('img/infografis/1.jpeg') }}" class="rounded w-100" alt="...">
                            </div>
                            <div class="col-lg-3 col-md-4 col-6 p-2">
                                <img src="{{ asset('img/infografis/1.jpeg') }}" class="rounded w-100" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end p-4">
                        <img src="{{ asset('img/logo.png') }}" alt="" class="footer_logo">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('bottomscript')
@endpush

