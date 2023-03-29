@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Update Banner Sejarah Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-landmark text-primary me-2"></i>Update Banner Sejarah Bapenda</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.profile.sejarah') }}">Banner Sejarah Bapenda</a></li>
                <li class="breadcrumb-item active">Update Banner Sejarah Bapenda</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-landmark text-primary me-1"></i>
                            Update Banner Sejarah Bapenda
                        </div>
                        <div class="card-body">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ session()->get('error') }}</strong>
                                </div>
                            @endif
                            <form action="{{ route('cms.profile.sejarah.update.image', ['id' => $sejarah->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="uploadFile" class="form-label">Banner Sejarah Bapenda</label>
                                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" required id="uploadFile" aria-describedby="fileHelp">
                                    <div id="fileHelp" class="form-text">Upload Banner Sejarah Bapenda (*PNG, JPG, WEBP). <strong>Maksimum Size: 500 kb</strong></div>
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('cms.profile.sejarah') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-edit me-2"></i>Update Banner Sejarah Bapenda</button>
                                </div>
                            </form>
                        </div>
                    </div>   
                </div>
            </div>      
        </div>
    </main>
@endsection