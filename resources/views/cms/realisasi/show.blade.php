@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Show Detail Realisasi Pendapatan Daerah | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-file-excel text-primary me-2"></i>Show Detail Realisasi Pendapatan Daerah</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.realisasi') }}">Realisasi Pendapatan Daerah</a></li>
                <li class="breadcrumb-item active">Show Detail Realisasi Pendapatan Daerah</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-file-excel text-primary me-1"></i>
                            Show Detail Realisasi Pendapatan Daerah
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="createdAt" class="form-label">Created At</label>
                                <input type="datetime" name="datetime" class="form-control @error('date') is-invalid @enderror" value="{{ $realisasi->created_at }}" id="createdAt" aria-describedby="createdHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="FileName" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $realisasi->name }}" id="FileName" aria-describedby="nameHelp" disabled>
                                <div id="nameHelp" class="form-text">Your File Name.</div>
                            </div>
                            <div class="mb-3">
                                <label for="uploadFile" class="form-label">File</label>
                                <input type="text" name="file" class="form-control @error('file') is-invalid @enderror" value="{{ $realisasi->file }}" id="uploadFile" aria-describedby="fileHelp" disabled>
                                <div id="fileHelp" class="form-text">Your File.</div>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('cms.realisasi') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>      
        </div>
    </main>
@endsection