@extends('landingpage.main')

@section('title', 'Sejarah Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
@endpush

@push('headscript')
@endpush

@section('content')
    <div class="container-fluid mx-0 px-0">
        <div class="row gy-3 mt-3 px-3">

            @include('landingpage.about.menu', ['active' => 'sejarah'])

            <div class="col-lg-12 p-4 pt-0">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-dark my-2">Sejarah Bapenda</h5>
                    </div>
                    <div class="card-body p-4 pb-0">
                        <h4 class="fw-bold text-uppercase text-center mb-3">Sejarah Bapenda kabupaten katingan provinsi kalimantan tengah</h4>
                        <hr class="bg-secondary">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-9 col-12 mb-3">
                                <img src="{{Storage::url($sejarah->image)}}" alt="Sejarah Bapenda" class="w-100">
                            </div>
                            <div class="col-12 mt-3" style="text-align:justify;">
                                {!!$sejarah->description!!}
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

