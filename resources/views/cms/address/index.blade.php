@extends('cms.layouts.main')

@section('title', 'Informasi Bapenda | Administrator')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('cms.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Informasi</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-map-marked-alt me-2"></i>Informasi Bapenda</h6>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg mx-4 mt-4">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative overflow-hidden">
                        <i class="fa fa-user fa-2x text-primary border border-info shadow-sm p-3 rounded-circle"></i>
                        {{--<img src="{{Storage::url(auth()->guard('cms')->user()->picture)}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">--}}
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="font-weight-bolder mb-1">
                            {{ auth()->guard('cms')->user()->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            Administrator
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-6 col-md-6 col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder"><i class="fa fa-map-marked-alt me-2"></i>Informasi Bapenda</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-body pt-3 px-3 pb-2">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </div>
                                    @endif
                                    <form action="{{ route('cms.setting.address.update', ['id' => 1]) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" value="{{ $address->email }}" name="email" type="email" placeholder="Email Administrator">
                                                    <label for="email" class="form-control-label mt-1">Email Bapenda</label>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" value="{{ $address->no_telp }}" name="no_telp" type="text" placeholder="Telepon">
                                                    <label for="no_telp" class="form-control-label">Nomor Telepon Bapenda</label>
                                                    @error('no_telp')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="alamat" class="form-control" style="height:100px;" id="desc" aria-describedby="alamatHelp">{{ $address->alamat }}</textarea>
                                                    <label for="alamat" class="form-control-label">Alamat Bapenda</label>
                                                    @error('alamat')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-md ms-auto"><i class="fa fa-edit me-2"></i>Update Informasi</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-6 col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder"><i class="fa fa-clock me-2"></i>Update Jam Layanan</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-body pt-3 px-3 pb-2">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </div>
                                    @endif
                                    <form action="{{ route('cms.setting.address.updateHours') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="start_time">Senin - Kamis</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text fw-bold">Jam Mulai</span>
                                                        <input class="form-control @error('start_time') is-invalid @enderror" name="start_time" id="start_time" autocomplete="start_time" type="time" value="{{ $hour1->start_time }}">
                                                        @error('start_time')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <span class="input-group-text fw-bold">Jam Berakhir</span>
                                                        <input class="form-control @error('end_time') is-invalid @enderror" name="end_time" id="end_time" autocomplete="end_time" type="time" value="{{ $hour1->end_time }}">
                                                        @error('end_time')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="start_time">Jumat</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text fw-bold">Jam Mulai</span>
                                                        <input class="form-control @error('start_time2') is-invalid @enderror" name="start_time2" id="start_time2" autocomplete="start_time2" type="time" value="{{ $hour2->start_time }}">
                                                        @error('start_time2')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <span class="input-group-text fw-bold">Jam Berakhir</span>
                                                        <input class="form-control @error('end_time2') is-invalid @enderror" name="end_time2" id="end_time2" autocomplete="end_time2" type="time" value="{{ $hour2->end_time }}">
                                                        @error('end_time2')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <button type="submit" class="btn btn-primary btn-md ms-auto"><i class="fa fa-key me-2"></i>Update Jam Layanan</button>
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