@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Show Detail FAQ | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-question-circle text-primary me-2"></i>Show Detail FAQ</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.faq') }}">FAQ</a></li>
                <li class="breadcrumb-item active">Show Detail FAQ</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-question-circle text-primary me-1"></i>
                            Show Detail FAQ
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputName2" class="form-label">Created At</label>
                                <input type="datetime" name="datetime" class="form-control @error('date') is-invalid @enderror" value="{{ $faq->created_at }}" id="exampleInputName2" aria-describedby="nameHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputName1" class="form-label">FAQ Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $faq->title }}" id="exampleInputName1" aria-describedby="nameHelp" disabled>
                                <div id="nameHelp" class="form-text">Your FAQ Title.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputMessage1" class="form-label">FAQ Content</label>
                                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="exampleInputMessage1" aria-describedby="messageHelp" style="height: 100px" disabled>{{ $faq->content }}</textarea>
                                <div id="messageHelp" class="form-text">Detail about FAQ from a title you have been describe before.</div>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('cms.faq') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>      
        </div>
    </main>
@endsection