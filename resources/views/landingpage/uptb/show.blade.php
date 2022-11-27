@extends('landingpage.main')

@section('title', 'Berita Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <style>
        .textShadow {
            text-shadow:none!important;
        }

        .content span p {
            text-shadow:none!important;
            color: #212529!important;
            text-align: justify!important;
            font-weight: 400!important;
        }

        .textNews {
            -webkit-text-fill-color: #19234f;
            color: #19234f;
            font-size:5vw;
        }
    </style>
@endpush

@push('headscript')
@endpush

@section('content')
    <div class="container-fluid mx-0 px-0">
        <div class="row gy-3 mt-3 px-3">
            <div class="col-lg-9 p-4 pt-0">
                
                <div class="card p-4 shadow">
                    <strong class="d-inline-block mb-2 text-primary">
                        Unit Pelaksana Teknis Badan (UPTB)
                    </strong>
                    <h4 class="fw-bold">{{$uptb->name}}</h4>
                    <div class="mb-1 text-muted fw-bold">Creator: Administrator</div>
                    <div class="mb-3 text-muted">{{ $uptb->created_at->format('l, d M Y') }}</div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-lg-4 col-md-6 col-10">
                            <img src="{{Storage::url($uptb->image)}}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12 col-md-12 content">
                            <h4>Peran</h4>
                            <span>{!!$uptb->peran!!}</span>
                            <h4>Fungsi</h4>
                            <span>{!!$uptb->fungsi!!}</span>
                            <h4>Layanan Pajak</h4>
                            <span>{!!$uptb->layanan_pajak!!}</span>
                            <h4>Wilayah UPTB Meliputi</h4>
                            <span>{!!$uptb->wilayah_uptb!!}</span>
                        </div>
                        <div class="col-md-10">
                            <h4>Lokasi UPTB</h4>
                            <img src="{{Storage::url($uptb->maps_uptb)}}" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-3">
                <div class="position-sticky mb-4" style="top: 2rem;">
                    <div class="p-4 mb-2 bg-light rounded">
                        <h5 class="mb-3 fw-bold text-center">Jam Pelayanan</h5>
                        {!!$uptb->jam_layanan!!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        
    </div>
@endsection

@push('bottomscript')
@endpush

