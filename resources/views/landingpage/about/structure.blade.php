@extends('landingpage.main')

@section('title', 'Struktur Organisasi Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
@endpush

@push('headscript')
@endpush

@section('content')
    <div class="container-fluid mx-0 px-0">
        <div class="row gy-3 mt-3 px-3">

            @include('landingpage.about.menu', ['active' => 'struktur-organisasi'])

            <div class="col-lg-12 p-4 pt-0">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-dark fw-bold my-2"><i class="bi bi-diagram-3 me-2"></i>Struktur Organisasi Bapenda</h5>
                    </div>
                    <div class="card-body p-4 pb-0">
                        <h4 class="fw-bold text-uppercase text-center mb-3">Struktur Organisasi Bapenda kabupaten katingan provinsi kalimantan tengah</h4>
                        <hr class="bg-secondary">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                @if(is_null($struktur))
                                    - No Data Found -
                                @else
                                    <img src="{{Storage::url($struktur->image)}}" alt="Struktur Organisasi Bapenda Katingan" class="w-100">
                                @endif
                            </div>
                        </div>
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

