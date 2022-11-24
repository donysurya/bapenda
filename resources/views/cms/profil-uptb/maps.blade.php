@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Update Maps Wilayah UPTB | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-info-circle text-primary me-2"></i>Update Maps Wilayah UPTB</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.uptb') }}">Profil UPTB</a></li>
                <li class="breadcrumb-item active">Update Maps Wilayah UPTB</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-info-circle text-primary me-1"></i>
                            Update Maps Wilayah UPTB
                        </div>
                        <div class="card-body">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ session()->get('error') }}</strong>
                                </div>
                            @endif
                            <form action="{{ route('cms.uptb.update.image', ['id' => $uptb->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="upload2File" class="form-label">Maps Wilayah UPTB</label>
                                    <input type="file" name="maps_uptb" class="form-control @error('maps_uptb') is-invalid @enderror" id="upload2File" value="{{ old('maps_uptb') }}" aria-describedby="maps_uptbHelp">
                                    <div id="maps_uptbHelp" class="form-text">Upload Gambar Maps Wilayah UPTB (*PNG, JPG, WEBP). <strong>Maksimum Size: 200 kb</strong></div>
                                    @error('maps_uptb')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('cms.uptb') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-edit me-2"></i>Update Maps Wilayah UPTB</button>
                                </div>
                            </form>
                        </div>
                    </div>   
                </div>
            </div>      
        </div>
    </main>
@endsection