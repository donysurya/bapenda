@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Update Publikasi | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-file-pdf text-primary me-2"></i>Update Publikasi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.publikasi') }}">Publikasi</a></li>
                <li class="breadcrumb-item active">Update Publikasi</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-file-pdf text-primary me-1"></i>
                            Update Publikasi
                        </div>
                        <div class="card-body">
                            <form action="{{ route('cms.publikasi.update', ['id' => $publikasi->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="FileName" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="FileName" value="{{ $publikasi->name }}" aria-describedby="nameHelp">
                                    <div id="nameHelp" class="form-text">Deskripsikan nama Publikasi.</div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="FileCategory" class="form-label">Category</label>
                                    <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" aria-describedby="categoryHelp">
                                        <option value="PERDA" {{$publikasi->category == 'PERDA' ? 'selected' : ''}}>PERDA</option>
                                        <option value="PERBUP" {{$publikasi->category == 'PERBUP' ? 'selected' : ''}}>PERBUP</option>
                                        <option value="Document" {{$publikasi->category == 'Document' ? 'selected' : ''}}>Document</option>
                                    </select>
                                    <div id="categoryHelp" class="form-text">Deskripsikan Category File.</div>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="uploadFile" class="form-label">File</label>
                                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="uploadFile" value="{{ $publikasi->file }}" aria-describedby="fileHelp">
                                    <div id="fileHelp" class="form-text">Upload file (*doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp). <strong>Maksimum Size: 15 Mb</strong>.</div>
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('cms.publikasi') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-edit me-2"></i>Update Publikasi</button>
                                </div>
                            </form>
                        </div>
                    </div>   
                </div>
            </div>      
        </div>
    </main>
@endsection