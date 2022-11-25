@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Update Data Pegawai | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-users text-primary me-2"></i>Update Data Pegawai</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.pegawai') }}">Data Pegawai</a></li>
                <li class="breadcrumb-item active">Update Data Pegawai</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-users text-primary me-1"></i>
                            Update Data Pegawai
                        </div>
                        <div class="card-body">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ session()->get('error') }}</strong>
                                </div>
                            @endif
                            <form action="{{ route('cms.pegawai.update', ['id' => $pegawai->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="FileName" class="form-label">Nama Pegawai</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="FileName" value="{{ $pegawai->nama }}" aria-describedby="namaHelp">
                                    <div id="namaHelp" class="form-text">Deskripsikan Nama lengkap Pegawai Bapenda Katingan beserta gelar. <strong>Contoh: Dr. ABC, S.T., M.Si</strong></div>
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="FileNIP" class="form-label">NIP Pegawai</label>
                                    <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="FileNIP" value="{{ $pegawai->nip }}" aria-describedby="nipHelp">
                                    <div id="nipHelp" class="form-text">Deskripsikan nip lengkap Pegawai.</div>
                                    @error('nip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="FileGol" class="form-label">Golongan</label>
                                    <input type="text" name="golongan" class="form-control @error('golongan') is-invalid @enderror" id="FileGol" value="{{ $pegawai->golongan }}" aria-describedby="golonganHelp">
                                    <div id="golonganHelp" class="form-text">Deskripsikan golongan lengkap Pegawai.</div>
                                    @error('golongan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="FileJabatan" class="form-label">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="FileJabatan" value="{{ $pegawai->jabatan }}" aria-describedby="jabatanHelp">
                                    <div id="jabatanHelp" class="form-text">Deskripsikan jabatan lengkap Pegawai.</div>
                                    @error('jabatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Keterangan</label>
                                    <textarea name="keterangan" class="ckeditor form-control @error('keterangan') is-invalid @enderror" id="desc" aria-describedby="keteranganHelp">{{ $pegawai->keterangan }}</textarea>
                                    <div id="keteranganHelp" class="form-text">Deskripsikan keterangan.</div>
                                    @error('keterangan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('cms.pegawai') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-edit me-2"></i>Update Data Pegawai</button>
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