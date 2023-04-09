@extends('landingpage.main')

@section('title', 'Berita Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <style>
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
                            <li class="breadcrumb-item active" aria-current="page">Berita</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row gy-3 px-3">
            <div class="col-lg-12 p-4 pt-0">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-dark fw-bold my-2"><i class="bi bi-newspaper me-2"></i>Berita Bapenda Katingan</h5>
                    </div>
                    <div class="card-body p-4 pb-0">
                        <h3 class="fw-bold text-uppercase text-center">Berita Bapenda Kabupaten Katingan</h3>
                        <hr class="bg-secondary">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mb-2">
                                    @forelse($data as $index => $item)
                                        <div class="col-md-6">
                                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow h-md-250 position-relative">
                                                <div class="col p-4 d-flex flex-column position-static">
                                                    <strong class="d-inline-block mb-2 text-primary">
                                                        {{ $item->category->name }}
                                                    </strong>
                                                    <h4 class="my-0 mb-3">{{$item->title}}</h4>
                                                    <div class="mb-1 text-muted fw-bold">Creator: {{ $item->admin->name ?? 'Administrator'}}</div>
                                                    <div class="mb-3 text-muted">{{ $item->created_at->format('l, d M Y') }}</div>
                                                    <p class="card-text mb-auto text-start text-dark textShadow fw-normal">{!! Str::limit( strip_tags( $item->abstract ), 140 ) !!}</p>
                                                    <a href="{{route('news.show', ['slug' => $item->slug])}}" class="stretched-link text-decoration-none mt-2">Continue reading</a>
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
                                {{ $data->links() }}
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

