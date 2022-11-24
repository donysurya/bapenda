@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Update Sejarah Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-landmark text-primary me-2"></i>Update Sejarah Bapenda</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.profile.sejarah') }}">Sejarah Bapenda</a></li>
                <li class="breadcrumb-item active">Update Sejarah Bapenda</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-landmark text-primary me-1"></i>
                            Update Sejarah Bapenda
                        </div>
                        <div class="card-body">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ session()->get('error') }}</strong>
                                </div>
                            @endif
                            <form action="{{ route('cms.profile.sejarah.update', ['id' => $sejarah->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Sejarah Bapenda</label>
                                    <textarea name="description" class="ckeditor form-control @error('description') is-invalid @enderror" id="desc" aria-describedby="descriptionHelp">{{ $sejarah->description }}</textarea>
                                    <div id="descriptionHelp" class="form-text">Deskripsikan secara detail tentang Sejarah berdirinya Bapenda Kabupaten Katingan.</div>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('cms.profile.sejarah') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-edit me-2"></i>Update Sejarah Bapenda</button>
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