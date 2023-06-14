@extends('landingpage.main')

@section('title', 'Berita Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/boxed-check.css') }}" />
    
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

        div#social-links {
            margin: 0 auto;
            max-width: auto;
        }

        div#social-links ul {
            padding: 0;
            display: flex;
            justify-content: center;
            margin-bottom:5px;
        }

        div#social-links ul li {
            display: inline-block;
        }  

        div#social-links ul li a {
            padding: 10px;
            /* border: 1px solid #ccc; */
            margin: 1px;
            font-size: 35px;
            /* color: #222; */
            /* background-color: #ccc; */
        } 
    </style>
@endpush

@push('headscript')
@endpush

@section('content')
    <div class="container-fluid mx-0 px-0">
        <div class="row gy-3 mt-2 px-3">
            <div class="col-lg-12 py-4 px-2 pt-0">
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
            <div class="col-lg-8"> 
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
                        <div class="col-lg-7 col-md-8 col-11">
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
            <div class="col-lg-4">
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <h5 class="fw-light">Share Post</h5>
                        <hr>
                        {!! $shareComponent !!}
                    </div>
                </div>
                <div class="card shadow mb-3">
                    <form method="get" action="{{route('news.index')}}">
                        <div class="card-body">
                            <h5 class="fw-light">Search Post</h5>
                            <hr>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Pencarian Berita" name="search" value="{{$_GET['search'] ?? ''}}">
                                <label for="floatingInput">Pencarian Berita</label>
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn btn-outline-danger w-100 py-2">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <h5 class="fw-light">Recent Post</h5>
                        <hr>
                        @forelse($data2 as $index => $item)
                            <a href="{{route('news.show', ['slug' => $item->slug])}}" class="text-decoration-none">
                                <div class="col-lg-12">
                                    <div class="row gy-3 align-items-center">
                                        <div class="col-auto">
                                            <img src="{{Storage::url($item->image)}}" alt="" class="p-2" width="130px" height="130px">
                                        </div>
                                        <div class="col p-4 d-flex flex-column position-static">
                                            <h6 class="my-0 mb-2">{!! Str::limit( strip_tags( $item->title ), 50 ) !!}</h6>
                                            <div class="mb-0 text-muted">{{ $item->created_at->format('l, d M Y') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            - No Data Found -
                        @endforelse
                    </div>
                </div>
                <div class="card shadow">
                    <form method="get" action="{{route('news.index')}}">
                        <div class="card-body">
                            <h5 class="fw-light">Category</h5>
                            <hr>
                            <div class="overview-radio mb-3">
                                <div class="row boxed-check-group boxed-check-success">
                                    @forelse($category_widget as $index => $item)
                                        <div class="col-lg-auto gy-3">
                                            <label class="boxed-check">
                                                <input class="boxed-check-input" type="radio" name="category" id="category" value="{{$item->name}}" onchange="form.submit()">
                                                <div class="boxed-check-label">{{$item->name}}</div>
                                            </label>
                                        </div>
                                    @empty
                                        - No Data Found -
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        
    </div>
@endsection

@push('bottomscript')
@endpush

