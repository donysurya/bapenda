@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Update Profil UPTB | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-info-circle text-primary me-2"></i>Update Profil UPTB</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.uptb') }}">Profil UPTB</a></li>
                <li class="breadcrumb-item active">Update Profil UPTB</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-info-circle text-primary me-1"></i>
                            Update Profil UPTB
                        </div>
                        <div class="card-body">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ session()->get('error') }}</strong>
                                </div>
                            @endif
                            <form action="{{ route('cms.uptb.update', ['id' => $uptb->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="FileName" class="form-label">Nama UPTB</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="FileName" value="{{ $uptb->name }}" aria-describedby="nameHelp">
                                    <div id="nameHelp" class="form-text">Deskripsikan nama UPTB. <strong>Contoh: Pelayanan Pajak Katingan 1, dll.</strong></div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="peran" class="form-label">Peran</label>
                                    <textarea name="peran" class="ckeditor form-control @error('peran') is-invalid @enderror" id="desc" aria-describedby="peranHelp">{{ $uptb->peran }}</textarea>
                                    <div id="peranHelp" class="form-text">Deskripsikan peran dari UPTB.</div>
                                    @error('peran')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="fungsi" class="form-label">Fungsi</label>
                                    <textarea name="fungsi" class="ckeditor form-control @error('fungsi') is-invalid @enderror" id="desc" aria-describedby="fungsiHelp">{{ $uptb->fungsi }}</textarea>
                                    <div id="fungsiHelp" class="form-text">Deskripsikan fungsi dari UPTB.</div>
                                    @error('fungsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="layanan_pajak" class="form-label">Layanan Pajak</label>
                                    <textarea name="layanan_pajak" class="ckeditor form-control @error('layanan_pajak') is-invalid @enderror" id="desc" aria-describedby="layanan_pajakHelp">{{ $uptb->layanan_pajak }}</textarea>
                                    <div id="layanan_pajakHelp" class="form-text">Deskripsikan layanan pajak dari UPTB.</div>
                                    @error('layanan_pajak')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="wilayah_uptb" class="form-label">Wilayah UPTB</label>
                                    <textarea name="wilayah_uptb" class="ckeditor form-control @error('wilayah_uptb') is-invalid @enderror" id="desc" aria-describedby="wilayah_uptbHelp">{{ $uptb->wilayah_uptb }}</textarea>
                                    <div id="wilayah_uptbHelp" class="form-text">Deskripsikan Wilayah UPTB dari UPTB.</div>
                                    @error('wilayah_uptb')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jam_layanan" class="form-label">Jam Pelayanan</label>
                                    <textarea name="jam_layanan" class="ckeditor form-control @error('jam_layanan') is-invalid @enderror" id="desc" aria-describedby="jam_layananHelp">{{ $uptb->jam_layanan }}</textarea>
                                    <div id="jam_layananHelp" class="form-text">Deskripsikan Jam Pelayanan dari UPTB.</div>
                                    @error('jam_layanan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('cms.uptb') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-edit me-2"></i>Update Profil UPTB</button>
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