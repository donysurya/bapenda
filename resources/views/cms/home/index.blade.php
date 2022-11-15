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
        </div>
    </main>
@endsection