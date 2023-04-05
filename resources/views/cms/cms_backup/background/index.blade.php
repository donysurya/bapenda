@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Update Background | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-images text-primary me-2"></i>Update Background</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Update Background</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-images text-primary me-1"></i>
                            Update Background
                        </div>
                        <div class="card-body">
                            <div style="height:50vh!important;" class="d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <h3 class="fw-bold mb-4"><i class="fas fa-exclamation-circle me-2 text-warning"></i>Attention</h3>
                                    <h5 class="fw-light">This feature can only be accessed through the developer,</h5>
                                    <h5 class="fw-light">if you want to make changes to the background,</h5>
                                    <h5 class="fw-light">please contact the developer to make changes.</h5>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>      
        </div>
    </main>
@endsection