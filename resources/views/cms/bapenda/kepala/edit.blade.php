@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Update Kepala Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-portrait text-primary me-2"></i>Update Kepala Bapenda</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.profile.kepala') }}">Kepala Bapenda</a></li>
                <li class="breadcrumb-item active">Update Kepala Bapenda</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-portrait text-primary me-1"></i>
                            Update Kepala Bapenda
                        </div>
                        <div class="card-body">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ session()->get('error') }}</strong>
                                </div>
                            @endif
                            <form action="{{ route('cms.profile.kepala.update', ['id' => $kepala->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="FileName" class="form-label">Nama Kepala Bapenda</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="FileName" value="{{ $kepala->name }}" aria-describedby="nameHelp">
                                    <div id="nameHelp" class="form-text">Deskripsikan Nama lengkap Kepala Bapenda Katingan beserta gelar. <strong>Contoh: Dr. ABC, S.T., M.Si</strong></div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Biodata Kepala Bapenda</label>
                                    <textarea name="description" class="ckeditor form-control @error('description') is-invalid @enderror" id="desc" aria-describedby="descriptionHelp">{{ $kepala->description }}</textarea>
                                    <div id="descriptionHelp" class="form-text">Deskripsikan secara detail tentang Biodata Diri Bapenda Kabupaten Katingan.</div>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jobdesk" class="form-label">Tugas dan Fungsi Kepala Bapenda</label>
                                    <textarea name="jobdesk" class="ckeditor form-control @error('jobdesk') is-invalid @enderror" id="jobdesk" aria-describedby="jobdeskHelp">{{ $kepala->jobdesk }}</textarea>
                                    <div id="jobdeskHelp" class="form-text">Deskripsikan secara detail tentang Tugas dan Fungsi dari Kepala Bapenda Kabupaten Katingan.</div>
                                    @error('jobdesk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('cms.profile.kepala') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-edit me-2"></i>Update Kepala Bapenda</button>
                                </div>
                            </form>
                        </div>
                    </div>   
                </div>
            </div>      
        </div>
    </main>
@endsection

@push('script')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush