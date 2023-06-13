@extends('landingpage.main')

@section('title', 'Pembayaran | Instruksi Pembayaran | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@endpush

@push('headscript')
    <style>
        .breadcrumb-item a {
            text-decoration:none;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid mx-0 px-0">
        <div class="row gy-3 mt-2 px-3">
            <div class="col-lg-12 py-0 px-2">
                <div class="card shadow">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-1 py-2 px-4">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
                            <li class="breadcrumb-item active" aria-current="page">{{$payment_name->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row gy-3 mt-2">
            <div class="col-lg-12 px-4 py-0">
                <div class="card h-100">
                    <div class="card-body p-4 pb-0">
                        <div class="row justify-content-center gy-4">
                            @forelse($payment as $index => $item)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-11">
                                    <div class="card position-relative">
                                        <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-success" style="font-size:0.9em!important;">
                                            {{ $index+1 }}
                                        </span>
                                        <img src="{{Storage::url($item->image)}}" class="card-img-top" alt="Instruksi Pembayaran {{$item->id}}">
                                        <div class="card-body">
                                            <p class="card-text">{!! $item->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <div class="alert alert-light text-center" role="alert">
                                        <h6 class="text-danger mb-0">
                                            Tidak ditemukan Instruksi Pembayaran
                                        </h6>
                                    </div>
                                </div>
                            @endforelse
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

