@extends('cms.layouts.main')

@section('title', 'Gallery | Edit Gallery | Administrator')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('cms.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('cms.gallery') }}">Gallery</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Lihat Data</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-picture-o me-2"></i>Lihat Foto</h6>
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
                                <h6 class="mb-0 font-weight-bolder">Lihat Foto Gallery</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-danger mb-0" href="{{ route('cms.gallery') }}"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-header pb-0 px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="fa fa-edit me-2"></i>Lihat Data Foto Gallery</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control @error('name') is-invalid @enderror" value="{{ $gallery->name }}" name="name" type="text" placeholder="Nama Foto">
                                                <label for="name" class="form-control-label mt-1">Nama Foto Gallery.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label mt-1">Foto Gallery :</label>
                                                <img src="{{Storage::url($gallery->image)}}" alt="{{$gallery->name}}" width="150px">
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
@endpush