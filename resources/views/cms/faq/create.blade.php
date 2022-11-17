@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Create FAQ | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-question-circle text-primary me-2"></i>Create FAQ</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.faq') }}">FAQ</a></li>
                <li class="breadcrumb-item active">Create FAQ</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-question-circle text-primary me-1"></i>
                            Create FAQ
                        </div>
                        <div class="card-body">
                            <form action="{{ route('cms.faq.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputName1" class="form-label">FAQ Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputName1" value="{{ old('title') }}" aria-describedby="nameHelp">
                                    <div id="nameHelp" class="form-text">Describe title for your FAQ.</div>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputMessage1" class="form-label">FAQ Content</label>
                                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="exampleInputMessage1" aria-describedby="messageHelp" style="height: 100px">{{ old('content') }}</textarea>
                                    <div id="messageHelp" class="form-text">Describe detail about FAQ from a title you have been fill above.</div>
                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('cms.faq') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-edit me-2"></i>Create FAQ</button>
                                </div>
                            </form>
                        </div>
                    </div>   
                </div>
            </div>      
        </div>
    </main>
@endsection