@extends('cms.layouts.main')

@section('title', 'Kepala Bapenda | Buat Kepala Bapenda | Administrator')

@push('css')
    <style>
        .imgPreview img {
            padding: 8px;
            max-width: 150px;
        } 
    </style>
@endpush

@push('headscript')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('cms.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('cms.profile.bapenda') }}">Bapenda</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tambah Data</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fas fa-question-circle me-2"></i>Tambah Kepala Bapenda</h6>
    </nav>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder">Tambah Data Kepala Bapenda</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-danger mb-0" href="{{ route('cms.profile.bapenda') }}"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-header pb-0 px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="fa fa-plus me-2"></i>Buat Data Kepala Bapenda</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </div>
                                    @endif
                                    <form action="{{ route('cms.profile.kepala.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" type="text" placeholder="Nama Kepala Bapenda">
                                                    <label for="name" class="form-control-label mt-1">Deskripsikan Nama lengkap Kepala Bapenda Katingan beserta gelar. <br>Contoh: Dr. ABC, S.T., M.Si</label>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="description" class="ckeditor form-control @error('description') is-invalid @enderror" id="desc" aria-describedby="descriptionHelp">{{ old('description') }}</textarea>
                                                    <label for="description" class="form-control-label">Deskripsikan secara detail tentang Biodata diri dari Kepala Bapenda Kabupaten Katingan pada form yang tersedia.</label>
                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="jobdesk" class="ckeditor form-control @error('jobdesk') is-invalid @enderror" id="desc" aria-describedby="jobdeskHelp">{{ old('jobdesk') }}</textarea>
                                                    <label for="jobdesk" class="form-control-label">Deskripsikan secara detail tentang Tugas dan Fungsi dari Kepala Bapenda Kabupaten Katingan pada form yang tersedia.</label>
                                                    @error('jobdesk')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-1">
                                                    <div class="imgPreview"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" id="images" value="{{ old('file') }}" placeholder="Upload File">
                                                    <label for="file" class="form-control-label mt-1">Upload Foto Kepala Bapenda (*jpg,jpeg,png,bmp,webp).<br><span class="text-danger"><i class="fa fa-info-circle me-2"></i>Maksimum Size: 2 MB.</span></label>
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

    <script>
        $(function() {
            var imgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#images').on('change', function() {
                imgPreview(this, 'div.imgPreview');
            });
        });    
    </script>
@endpush