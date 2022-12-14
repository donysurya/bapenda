@extends('landingpage.main')

@section('title', 'Video Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

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
                        <h5 class="text-dark fw-bold my-2"><i class="bi bi-play-btn me-2"></i>Video Bapenda Katingan</h5>
                    </div>
                    <div class="card-body p-4 pb-0">
                        <h5 class="fw-bold">File Video</h5>
                        <div class="row">
                            @if(is_null($video))
                            @else
                                @forelse($video as $index => $item)
                                    <div class="col-lg-4 col-md-6 col-12 p-2">
                                        <object data="{{$item->link}}" class="w-100" height="350" title="YouTube video player"></object>
                                    </div>
                                @empty
                                    - No Video Found -
                                @endforelse
                            @endif
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

