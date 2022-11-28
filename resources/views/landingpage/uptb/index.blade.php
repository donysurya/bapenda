@extends('landingpage.main')

@section('title', 'Profil UPTB | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

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
                        <h5 class="text-dark fw-bold my-2"><i class="bi bi-newspaper me-2"></i>Profil UPTB Katingan</h5>
                    </div>
                    <div class="card-body p-4 pb-0">
                        <h3 class="fw-bold text-uppercase text-center">Profil UPTB Kabupaten Katingan</h3>
                        <hr class="bg-secondary">

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="row mb-2 justify-content-center">
                                    @forelse($uptb as $index => $item)
                                        <div class="col-md-9">
                                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                                <div class="col p-4 d-flex flex-column position-static">
                                                    <strong class="d-inline-block mb-2 text-primary">
                                                        Unit Pelaksana Teknis Badan (UPTB)
                                                    </strong>
                                                    <h4 class="my-0 mb-3">{{$item->name}}</h4>
                                                    <div class="mb-1 text-muted fw-bold">Creator: Administrator</div>
                                                    <div class="mb-3 text-muted">{{ $item->created_at->format('l, d M Y') }}</div>
                                                    <a href="{{route('uptb.show', ['id' => $item->id])}}" class="stretched-link text-decoration-none mt-2">Continue reading</a>
                                                </div>
                                                <div class="col-auto d-none d-lg-block">
                                                    <img src="{{Storage::url($item->image)}}" alt="" width="350px" height="100%">
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        - No Data Found -
                                    @endforelse
                                </div>
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

