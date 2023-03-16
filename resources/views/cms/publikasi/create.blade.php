@extends('cms.layouts.main')

@section('title', 'Publikasi | Buat Publikasi | Administrator')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('cms.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('cms.publikasi') }}">Publikasi</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tambah Data</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-file-pdf-o me-2"></i>Tambah Data Publikasi</h6>
    </nav>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder">Tambah Data Publikasi</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-danger mb-0" href="{{ route('cms.publikasi') }}"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-header pb-0 px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="fa fa-plus me-2"></i>Buat Publikasi</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    <form action="{{ route('cms.publikasi.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" type="text" placeholder="Nama File">
                                                    <label for="name" class="form-control-label">Deskripsikan Nama Publikasi File</label>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="category" id="FileCategory" class="form-control @error('category') is-invalid @enderror" aria-describedby="categoryHelp">
                                                        <option value="" disabled selected>-Pilih Kategori-</option>
                                                        <option value="PERDA">PERDA</option>
                                                        <option value="PERBUP">PERBUP</option>
                                                        <option value="Document">Document</option>
                                                    </select>
                                                    <label for="category" class="form-control-label">Pilih Kategori Publikasi File (PERDA / PERBUP / Document)</label>
                                                    @error('category')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" value="{{ old('file') }}" placeholder="Upload File">
                                                    <label for="file" class="form-control-label mt-1">Upload file (*doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp).<br><span class="text-danger"><i class="fa fa-info-circle me-2"></i>Maksimum Size: 2 MB.</span></label>
                                                    @error('file')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-md ms-auto"><i class="fa fa-plus me-2"></i>Tambah Data</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    

        <!-- Footer -->
        @include('cms.partials.footer')
        <!-- End Footer -->
    </div>
@endsection

@push('bottomscript')
@endpush