@extends('cms.layouts.main')

@section('title', 'Data Pegawai | Lihat Data Pegawai | Administrator')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('cms.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('cms.pegawai') }}">Pegawai</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Lihat</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-user me-2"></i>Data Pegawai</h6>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg mx-4 mt-4">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative overflow-hidden">
                        <img src="{{Storage::url($pegawai->image)}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="font-weight-bolder mb-1">
                            {{ $pegawai->nama }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $pegawai->jabatan }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder">Detail Data Pegawai</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-danger mb-0" href="{{ route('cms.pegawai') }}"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-header pb-0 px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="fa fa-eye me-2"></i>Informasi Pegawai</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" value="{{ $pegawai->nip }}" name="nip" type="number" placeholder="NIP Pegawai">
                                                <label for="nip" class="form-control-label mt-1">NIP Pegawai</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" value="{{ $pegawai->golongan }}" name="golongan" type="text" placeholder="Golongan Pegawai">
                                                <label for="golongan" class="form-control-label">Golongan Pegawai</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control" value="{{ $pegawai->jabatan }}" name="jabatan" type="text" placeholder="Jabatan Pegawai">
                                                <label for="jabatan" class="form-control-label">Jabatan Pegawai</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="keterangan" class="ckeditor form-control" id="desc" aria-describedby="keteranganHelp">{{ $pegawai->keterangan }}</textarea>
                                                <label for="keterangan" class="form-control-label">Keterangan Pegawai</label>
                                            </div>
                                        </div>
                                    </div>
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
@endpush