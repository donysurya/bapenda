@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Create Infografis | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-file-image text-primary me-2"></i>Create Infografis</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.other.infografis') }}">Infografis</a></li>
                <li class="breadcrumb-item active">Create Infografis</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-file-image text-primary me-1"></i>
                            Create Infografis
                        </div>
                        <div class="card-body">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ session()->get('error') }}</strong>
                                </div>
                            @endif
                            <form action="{{ route('cms.other.infografis.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="FileName" class="form-label">Nama Infografis</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="FileName" value="{{ old('name') }}" aria-describedby="nameHelp">
                                    <div id="nameHelp" class="form-text">Deskripsikan nama infografis. <strong>Contoh: Informasi Pajak, dll.</strong></div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="uploadFile" class="form-label">File Infografis</label>
                                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="uploadFile" value="{{ old('file') }}" aria-describedby="fileHelp">
                                    <div id="fileHelp" class="form-text">Upload infografis (*PNG, JPG, WEBP). <strong>Maksimum Size: 700 kb</strong>.</div>
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('cms.other.infografis') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-edit me-2"></i>Create Infografis</button>
                                </div>
                            </form>
                        </div>
                    </div>   
                </div>
            </div>      
        </div>
    </main>
@endsection