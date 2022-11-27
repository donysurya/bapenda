@extends('landingpage.main')

@section('title', 'Realisasi Pendapatan Daerah Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

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
                        <h5 class="text-dark fw-bold my-2"><i class="fas fa-file-excel me-2"></i>Realisasi Pendapatan Daerah Bapenda Katingan</h5>
                    </div>
                    <div class="card-body p-4 pt-0 pb-0">
                        <iframe class="w-100 vh-100" frameborder="0" scrolling="no" src="https://onedrive.live.com/embed?resid=6C685993F809A9F8%212757&authkey=%21AABR6KgqMF_ImYs&em=2&wdAllowInteractivity=False&AllowTyping=True&wdDownloadButton=True&wdInConfigurator=True&wdInConfigurator=True&edesNext=true&ejss=false"></iframe>
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

