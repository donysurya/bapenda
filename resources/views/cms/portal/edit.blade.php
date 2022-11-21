@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Update Portal | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-link text-primary me-2"></i>Update Portal</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.other.portal') }}">Portal</a></li>
                <li class="breadcrumb-item active">Update Portal</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-link text-primary me-1"></i>
                            Update Portal
                        </div>
                        <div class="card-body">
                            <form action="{{ route('cms.other.portal.update', ['id' => $portal->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="FileName" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="FileName" value="{{ $portal->name }}" aria-describedby="nameHelp">
                                    <div id="nameHelp" class="form-text">Deskripsikan nama portal.</div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="linkAddress" class="form-label">Link</label>
                                    <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id="linkAddress" value="{{ $portal->link }}" aria-describedby="linkHelp">
                                    <div id="linkHelp" class="form-text">Deskripsikan nama portal.</div>
                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="uploadFile" class="form-label">Image</label>
                                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="uploadFile" value="{{ $portal->image }}" aria-describedby="fileHelp">
                                    <div id="fileHelp" class="form-text">Upload your files here.</div>
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('cms.other.portal') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-edit me-2"></i>Update Portal</button>
                                </div>
                            </form>
                        </div>
                    </div>   
                </div>
            </div>      
        </div>
    </main>
@endsection