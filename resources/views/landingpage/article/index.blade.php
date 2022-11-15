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

                        {{--<div class="row mt-4 mb-2">
                            <div class="col-md-12">
                                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col-md-7 col-lg-7 col-12 p-4 d-flex flex-column position-static">
                                        <strong class="d-inline-block mb-2 text-primary">Bapenda, Bapenda Katingan, Bapenda Kalteng</strong>
                                        <h3 class="mb-0">Rapat Pembahasan Analisa SWOT Smart City Kabupaten Katingan</h3>
                                        <div class="mb-1 text-muted">Aug 05, 2022</div>
                                        <p class="card-text mb-auto">Kepala Dinas Komunikasi Informatika Persandian dan Statistik (Diskominfopersantik) Kabupaten Katingan memimpin Rapat Pembahasan Analisa SWOT Smart City Kabupaten Katingan di Media Center Diskominfopersantik. Senin (27/6/2022). Rapat pembahasan ini membahas 6 pilar yang menjadi dasar...</p>
                                        <a href="#" class="stretched-link text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalNews">Baca Selengkapnya</a>
                                    </div>
                                    <div class="col-5 d-md-block d-none d-lg-block">
                                        <img src="{{ asset('img/news/1.jpeg') }}" alt="" width="100%" height="100%">
                                    </div>
                                </div>
                            </div>
                        </div>--}}

                        <div class="row">
                            <div class="col-md-9">
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                            <div class="col p-4 d-flex flex-column position-static">
                                                <strong class="d-inline-block mb-2 text-primary">Bapenda, Bapenda Katingan, Bapenda Kalteng</strong>
                                                <h3 class="my-0">Rapat Pembahasan Analisa SWOT Smart City Kabupaten Katingan</h3>
                                                <div class="mb-1 text-muted">Aug 05, 2022</div>
                                                <p class="card-text mb-auto">Kepala Dinas Komunikasi Informatika Persandian dan Statistik (Diskominfopersantik) Kabupaten Katingan memimpin Rapat Pembahasan Analisa SWOT Smart City Kabupaten Katingan di Media Center Diskominfopersantik. Senin (27/6/2022). Rapat pembahasan ini membahas 6 pilar yang menjadi dasar...</p>
                                                <a href="#" class="stretched-link text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalNewsDetik">Baca Selengkapnya</a>
                                            </div>
                                            <div class="col-auto d-none d-lg-block">
                                                <img src="{{ asset('img/news/1.jpeg') }}" alt="" width="350px" class="h-100">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                            <div class="col p-4 d-flex flex-column position-static">
                                                <strong class="d-inline-block mb-2 text-primary">Bapenda, Bapenda Katingan, Bapenda Kalteng</strong>
                                                <h3 class="my-0">Rapat Pembahasan Analisa SWOT Smart City Kabupaten Katingan</h3>
                                                <div class="mb-1 text-muted">Aug 05, 2022</div>
                                                <p class="card-text mb-auto">Kepala Dinas Komunikasi Informatika Persandian dan Statistik (Diskominfopersantik) Kabupaten Katingan memimpin Rapat Pembahasan Analisa SWOT Smart City Kabupaten Katingan di Media Center Diskominfopersantik. Senin (27/6/2022). Rapat pembahasan ini membahas 6 pilar yang menjadi dasar...</p>
                                                <a href="#" class="stretched-link text-decoration-none">Baca Selengkapnya</a>
                                            </div>
                                            <div class="col-auto d-none d-lg-block">
                                                <img src="{{ asset('img/news/1.jpeg') }}" alt="" width="350px" class="h-100">
                                            </div>
                                        </div>
                                    </div>
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

