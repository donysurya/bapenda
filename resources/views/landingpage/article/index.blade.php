@extends('landingpage.main')

@section('title', 'Berita Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

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
                        <h5 class="text-dark fw-bold my-2"><i class="bi bi-newspaper me-2"></i>Berita Bapenda Katingan</h5>
                    </div>
                    <div class="card-body p-4 pb-0">
                        <h3 class="fw-bold text-uppercase text-center">Berita Bapenda Kabupaten Katingan</h3>
                        <hr class="bg-secondary">

                        <div class="row">
                            <div class="col-md-9">
                                <div class="row mb-2">
                                    @foreach($data as $item)
                                        <div class="col-md-12">
                                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                                <div class="col p-4 d-flex flex-column position-static">
                                                    <strong class="d-inline-block mb-2 text-primary">
                                                        @foreach($item->tags as $tag)
                                                            {{$tag->name}}{{$loop->last?'':','}}
                                                        @endforeach
                                                    </strong>
                                                    <h4 class="my-0 mb-3">{{$item->title}}</h4>
                                                    <div class="mb-1 text-muted fw-bold">Creator: {{ $item->admin->name }}</div>
                                                    <div class="mb-3 text-muted">{{ $item->created_at->format('l, d M Y') }}</div>
                                                    <p class="card-text mb-auto text-start text-dark textShadow fw-normal">{{$item->abstract}}</p>
                                                    <a href="{{route('news.show', ['slug' => $item->slug])}}" class="stretched-link text-decoration-none mt-2">Continue reading</a>
                                                </div>
                                                <div class="col-auto d-none d-lg-block">
                                                    <img src="{{Storage::url($item->image)}}" alt="" width="350px" height="100%">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-md-3">
                                <div class="position-sticky" style="top: 2rem;">
                                    <div class="card">
                                        <div class="card-header fw-bold">
                                            <i class="bi bi-archive me-2"></i>Archieves
                                        </div>
                                        <div class="card-body">
                                            <ol class="list-unstyled mb-0">
                                                <li><a href="#" class="text-decoration-none">August 2022</a></li>
                                                <li><a href="#" class="text-decoration-none">September 2022</a></li>
                                                <li><a href="#" class="text-decoration-none">October 2022</a></li>
                                                <li><a href="#" class="text-decoration-none">November 2022</a></li>
                                                <li><a href="#" class="text-decoration-none">December 2022</a></li>
                                                <li><a href="#" class="text-decoration-none">January 2023</a></li>
                                                <li><a href="#" class="text-decoration-none">February 2023</a></li>
                                                <li><a href="#" class="text-decoration-none">March 2023</a></li>
                                                <li><a href="#" class="text-decoration-none">April 2023</a></li>
                                                <li><a href="#" class="text-decoration-none">May 2023</a></li>
                                                <li><a href="#" class="text-decoration-none">June 2023</a></li>
                                                <li><a href="#" class="text-decoration-none">July 2023</a></li>
                                            </ol>
                                        </div>
                                    </div>
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

