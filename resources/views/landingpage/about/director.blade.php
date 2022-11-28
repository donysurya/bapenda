@extends('landingpage.main')

@section('title', 'Kepala Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
@endpush

@push('headscript')
@endpush

@section('content')
    <div class="container-fluid mx-0 px-0">
        <div class="row gy-3 mt-3 px-3">

            @include('landingpage.about.menu', ['active' => 'kepala-bapenda'])

            <div class="col-lg-12 p-4 pt-0">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-dark my-2">Kepala Bapenda</h5>
                    </div>
                    <div class="card-body p-4 pb-0">
                        <h4 class="fw-bold text-uppercase text-center mb-3">Kepala badan pendapatan daerah kabupaten katingan provinsi kalimantan tengah</h4>
                        <hr class="bg-secondary">
                        <h5 class="fw-bold mt-4">Profil Kepala</h5>
                        <p>Kepala Badan Pendapatan Daerah Kabupaten Katingan</p>
                        @if(is_null($kepala))
                            - No Data Found -
                        @else
                            <div class="row">
                                <div class="col-lg-8 col-12">
                                    <div class="card shadow mb-3">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{Storage::url($kepala->image)}}" alt="Kepala Bapenda Katingan" class="p-2 img-fluid rounded-start h-100">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bold mb-3">{{$kepala->name}}</h5>
                                                    <div class="card-text">
                                                        {!!$kepala->description!!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="fw-bold mt-4">Tugas dan Fungsi</h5>
                            {!!$kepala->jobdesk!!}
                        @endif
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

