@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Update Gambar Thumbnail | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-images text-primary me-2"></i>Update Gambar Thumbnail</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.gallery') }}">Gallery</a></li>
                <li class="breadcrumb-item active">Update Gambar Thumbnail</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-images text-primary me-1"></i>
                            Update Gambar Thumbnail
                        </div>
                        <div class="card-body">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ session()->get('error') }}</strong>
                                </div>
                            @endif
                            <form action="{{ route('cms.gallery.update.thumbnail', ['id' => $gallery->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="uploadThumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" required id="uploadThumbnail" aria-describedby="thumbnailHelp">
                                    <div id="thumbnailHelp" class="form-text">Upload thumbnail (*PNG, JPG, WEBP). <strong>Maksimum Size: 100 kb</strong></div>
                                    @error('thumbnail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('cms.gallery') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-edit me-2"></i>Update Gambar Thumbnail</button>
                                </div>
                            </form>
                        </div>
                    </div>   
                </div>
            </div>      
        </div>
    </main>
@endsection