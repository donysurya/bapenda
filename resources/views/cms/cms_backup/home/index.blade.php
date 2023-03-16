@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Dashboard | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-laptop-code me-3 text-primary"></i>Administrator Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row mb-2">
                <div class="col-xl-12 col-md-12">
                    <h3 class="mb-3"><i class="fas fa-info-circle text-warning me-2"></i>Information</h3>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="alert alert-success" role="alert">
                                <h5 class="alert-heading">Hai, {{auth()->guard('cms')->user()->name}}!</h5>
                                <p class="mb-0">Welcome to Administration Panel of Bapenda Katingan Website!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="dropdown-divider mb-4">

            <div class="row mb-4">
                <div class="col-xl-12 col-md-12">
                    <h3 class="mb-3"><i class="fas fa-chart-line text-info me-2"></i>Statistik Bapenda</h3>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">
                                    <div class="row align-items-center gy-3">
                                        <div class="col-md-3">
                                            <i class="fas fa-users text-light fa-2x"></i>
                                        </div>
                                        <div class="col-md-9">
                                            <h5 class="fw-light">Total Pegawai</h5>
                                            <h4 class="mb-0">- 0 -</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link text-decoration-none" href="{{route('cms.pegawai')}}">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                            <div class="card bg-danger text-light mb-4">
                                <div class="card-body">
                                    <div class="row align-items-center gy-3">
                                        <div class="col-md-3">
                                            <i class="fas fa-info-circle text-light fa-2x"></i>
                                        </div>
                                        <div class="col-md-9">
                                            <h5 class="fw-light">Total UPTB</h5>
                                            <h4 class="mb-0">- {{$uptb->count()}} -</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-light stretched-link text-decoration-none" href="{{route('cms.uptb')}}">View Details</a>
                                    <div class="small text-light"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                            <div class="card bg-warning text-dark mb-4">
                                <div class="card-body">
                                    <div class="row align-items-center gy-3">
                                        <div class="col-md-3">
                                            <i class="fas fa-file-pdf text-dark fa-2x"></i>
                                        </div>
                                        <div class="col-md-9">
                                            <h5 class="fw-light">Total Publikasi</h5>
                                            <h4 class="mb-0">- {{$publikasi->count()}} -</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-dark stretched-link text-decoration-none" href="{{route('cms.publikasi')}}">View Details</a>
                                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                            <div class="card bg-secondary text-light mb-4">
                                <div class="card-body">
                                    <div class="row align-items-center gy-3">
                                        <div class="col-md-3">
                                            <i class="fas fa-file-excel text-light fa-2x"></i>
                                        </div>
                                        <div class="col-md-9">
                                            <h5 class="fw-light">Total Realisasi</h5>
                                            <h4 class="mb-0">- {{$realisasi->count()}} -</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-light stretched-link text-decoration-none" href="{{route('cms.publikasi')}}">View Details</a>
                                    <div class="small text-light"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="dropdown-divider mb-4">
            
            <div class="row mb-4">
                <h3 class="mb-3"><i class="fas fa-info-circle text-warning me-2"></i>Landing Page Background</h3>
                <div class="col-xl-12 col-md-12">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-graduation-cap me-1"></i>
                                    Background
                                </div>
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Background Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="{{asset('img/home.webp')}}" alt="Background Landing Page" width="400px"></td>
                                                <td>
                                                    <center>
                                                        {{--<a href="{{route('cms.background.edit', ['id' => 1])}}" class="btn btn-primary m-1 py-1 px-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Background" style="font-size:14px;">
                                                            Update Background
                                                        </a>--}}
                                                        <a href="{{route('cms.background')}}" class="btn btn-primary m-1 py-1 px-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Background" style="font-size:14px;">
                                                            Update Background
                                                        </a>
                                                    </center>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection