@extends('landingpage.main')

@section('title', 'Tentang Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
@endpush

@push('headscript')
@endpush

@section('content')
    <div class="container-fluid mx-0 px-0">
        <div class="row gy-3 mt-3 px-3">

            @include('landingpage.about.menu', ['active' => 'visi-misi'])

            <div class="col-lg-12 p-4 pt-0">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-dark my-2">Visi & Misi Bapenda Katingan</h5>
                    </div>
                    <div class="card-body p-4 pb-0">
                        <h4 class="text-uppercase">
                            Visi
                        </h4>
                        {!!$visi->description!!}
                        <h4 class="text-uppercase">
                            Misi
                        </h4>
                        {!!$misi->description!!}
                    </div>
                    <div class="row justify-content-end p-4">
                        <img src="{{ asset('img/logo.png') }}" alt="" class="about_logo">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('bottomscript')
@endpush

