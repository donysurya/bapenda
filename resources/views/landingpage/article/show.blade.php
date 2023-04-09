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

        .breadcrumb-item a {
            text-decoration:none;
        }
    </style>
@endpush

@push('headscript')
@endpush

@section('content')
    <div class="container-fluid mx-0 px-0">
        <div class="row gy-3 mt-2 px-3">
            <div class="col-lg-12 p-4 pt-0">
                <div class="card shadow">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-1 py-2 px-4">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Berita</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $data->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row gy-3 px-3">
            <div class="col-lg-12 p-4 pt-0"> 
                <div class="card p-4 shadow">
                    <strong class="d-inline-block mb-2 text-primary">
                        @foreach($data->tags as $tag)
                            {{$tag->name}}{{$loop->last?'':','}}
                        @endforeach
                    </strong>
                    <h4 class="fw-bold">{{$data->title}}</h4>
                    <div class="mb-1 text-muted fw-bold">Creator: {{ $data->admin->name ?? 'Administrator' }}</div>
                    <div class="mb-3 text-muted">{{ $data->created_at->format('l, d M Y') }}</div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-lg-4 col-md-6 col-10">
                            <img src="{{Storage::url($data->image)}}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <small class="fw-bold text-center">"{{$data->abstract}}"</small>
                    <div class="row mt-4">
                        <div class="col-lg-12 col-md-12 content">
                            <span>{!!$data->content!!}</span>
                        </div>
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

