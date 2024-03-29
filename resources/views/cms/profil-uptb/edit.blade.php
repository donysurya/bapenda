@extends('cms.layouts.main')

@section('title', 'Profil UPTB | Edit Profil UPTB | Administrator')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('cms.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('cms.uptb') }}">UPTB</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit Data</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-map-o me-2"></i>Edit Profil UPTB</h6>
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
                                <h6 class="mb-0 font-weight-bolder">Edit Profil UPTB</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-danger mb-0" href="{{ route('cms.uptb') }}"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-header pb-0 px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="fa fa-edit me-2"></i>Edit Data Profil UPTB</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </div>
                                    @endif
                                    <form action="{{ route('cms.uptb.update', ['id' => $uptb->id]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control @error('name') is-invalid @enderror" value="{{ $uptb->name }}" name="name" type="text" placeholder="Nama Profil UPTB">
                                                    <label for="name" class="form-control-label mt-1">Deskripsikan Nama UPTB.<br>Contoh: Pelayanan Pajak Katingan 1, dll.</label>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="peran" class="ckeditor form-control @error('peran') is-invalid @enderror" id="desc" aria-describedby="peranHelp">{{ $uptb->peran }}</textarea>
                                                    <label for="peran" class="form-control-label">Deskripsikan peran dari UPTB.</label>
                                                    @error('peran')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="fungsi" class="ckeditor form-control @error('fungsi') is-invalid @enderror" id="desc" aria-describedby="fungsiHelp">{{ $uptb->fungsi }}</textarea>
                                                    <label for="fungsi" class="form-control-label">Deskripsikan fungsi dari UPTB.</label>
                                                    @error('fungsi')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="layanan_pajak" class="ckeditor form-control @error('layanan_pajak') is-invalid @enderror" id="desc" aria-describedby="layanan_pajakHelp">{{ $uptb->layanan_pajak }}</textarea>
                                                    <label for="layanan_pajak" class="form-control-label">Deskripsikan Layanan Pajak dari UPTB.</label>
                                                    @error('layanan_pajak')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="wilayah_uptb" class="ckeditor form-control @error('wilayah_uptb') is-invalid @enderror" id="desc" aria-describedby="wilayah_uptbHelp">{{ $uptb->wilayah_uptb }}</textarea>
                                                    <label for="wilayah_uptb" class="form-control-label">Deskripsikan Wilayah UPTB dari UPTB.</label>
                                                    @error('wilayah_uptb')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="jam_layanan" class="ckeditor form-control @error('jam_layanan') is-invalid @enderror" id="desc" aria-describedby="jam_layananHelp">{{ $uptb->jam_layanan }}</textarea>
                                                    <label for="jam_layanan" class="form-control-label">Deskripsikan Jam Layanan dari UPTB.</label>
                                                    @error('jam_layanan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-md ms-auto"><i class="fa fa-edit me-2"></i>Edit Data</button>
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
@endpush