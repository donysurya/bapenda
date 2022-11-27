@extends('landingpage.main')

@section('title', 'Gallery Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
@endpush

@push('headscript')
    <style>
        .photo-gallery {
            color:#313437;
            background-color:#fff;
        }

        .photo-gallery p {
            color:#7d8285;
        }

        .photo-gallery h2 {
            font-weight:bold;
            margin-bottom:40px;
            padding-top:40px;
            color:inherit;
        }

        @media (max-width:767px) {
            .photo-gallery h2 {
                margin-bottom:25px;
                padding-top:25px;
                font-size:24px;
            }
        }

        .photo-gallery .intro {
            font-size:16px;
            max-width:500px;
            margin:0 auto 40px;
        }

        .photo-gallery .intro p {
            margin-bottom:0;
        }

        .photo-gallery .photos {
            padding-bottom:20px;
        }

        .photo-gallery .item {
            padding-bottom:30px;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid mx-0 px-0">
        <div class="row gy-3 mt-3 px-3">
            <div class="col-lg-12 p-4 pt-0">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-dark fw-bold my-2"><i class="bi bi-images me-2"></i>Gallery Bapenda Katingan</h5>
                    </div>
                    <div class="card-body p-4 pb-0">
                        <h5 class="fw-bold">Foto Gallery</h5>
                        <div class="row photos">
                            @forelse($gallery as $index => $item)
                                <div class="col-sm-6 col-md-4 col-lg-3 item">
                                    <a href="{{Storage::url($item->image)}}" data-lightbox="photos">
                                        <img class="img-fluid" src="{{Storage::url($item->thumbnail)}}">
                                    </a>
                                </div>
                            @empty
                                <div class="col-sm-6 col-md-4 col-lg-3 item">
                                    No data found.
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
@endpush

