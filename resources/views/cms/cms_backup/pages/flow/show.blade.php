@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Show Detail Alur Proses | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-sync text-primary me-2"></i>Show Detail Alur Proses</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.other.flow') }}">Alur Proses</a></li>
                <li class="breadcrumb-item active">Show Detail Alur Proses</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-sync text-primary me-1"></i>
                            Show Detail Alur Proses
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="createdAt" class="form-label">Created At</label>
                                <input type="datetime" name="datetime" class="form-control @error('date') is-invalid @enderror" value="{{ $flow->created_at }}" id="createdAt" aria-describedby="createdHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="FileName" class="form-label">Nama Alur Proses</label>
                                <input type="text" name="name" class="form-control" id="FileName" value="{{ $flow->name }}" aria-describedby="nameHelp">
                                <div id="nameHelp" class="form-text">Nama Alur Proses.</div>
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label">Deskripsi Alur Proses</label>
                                <textarea name="description" class="ckeditor form-control" id="desc" aria-describedby="descriptionHelp">{{ $flow->description }}</textarea>
                                <div id="descriptionHelp" class="form-text">Deskripsi Singkat Alur Proses.</div>
                            </div>
                            <div class="mb-3">
                                <label for="uploadFile" class="form-label me-2 fw-bold">Gambar:</label>
                                <img src="{{Storage::url($flow->image)}}" alt="{{$flow->name}}" width="300px">
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('cms.other.flow') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>      
        </div>
    </main>
@endsection
