@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Update Video | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fab fa-youtube text-primary me-2"></i>Update Video</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.other.video') }}">Video</a></li>
                <li class="breadcrumb-item active">Update Video</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fab fa-youtube text-primary me-1"></i>
                            Update Video
                        </div>
                        <div class="card-body">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ session()->get('error') }}</strong>
                                </div>
                            @endif
                            <form action="{{ route('cms.other.video.update', ['id' => $video->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="FileName" class="form-label">Nama Video</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="FileName" value="{{ $video->name }}" aria-describedby="nameHelp">
                                    <div id="nameHelp" class="form-text">Deskripsikan nama video. <strong>Contoh: Kegiatan Pembayaran Pajak, dll.</strong></div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 d-flex align-items-center">
                                    <label for="uploadFile" class="form-label me-2 fw-bold">Video Embed:</label>
                                    <object data="{{$video->link}}" width="320px" height="200px"></object>
                                </div>
                                <div class="mb-3">
                                    <label for="linkAddress" class="form-label">Youtube Embed Link</label>
                                    <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id="linkAddress" value="{{ old('link') }}" aria-describedby="linkHelp">
                                    <div id="linkHelp" class="form-text">Embed Link Video. <strong>Contoh: https://www.youtube.com/watch?v=<span class="text-primary">gdZLi9oWNZg</span></strong></div>
                                    <div id="linkHelp" class="form-text">dari potongan contoh link diatas, ambil bagian kode yang berwarna biru untuk kemudian di copy, kemudian paste pada form yang disediakan di atas.</div>
                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('cms.other.video') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-edit me-2"></i>Update Video</button>
                                </div>
                            </form>
                        </div>
                    </div>   
                </div>
            </div>      
        </div>
    </main>
@endsection