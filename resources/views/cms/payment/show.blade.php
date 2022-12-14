@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Show Detail Informasi Pembayaran | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-credit-card text-primary me-2"></i>Show Detail Informasi Pembayaran</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.other.payment') }}">Informasi Pembayaran</a></li>
                <li class="breadcrumb-item active">Show Detail Informasi Pembayaran</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-credit-card text-primary me-1"></i>
                            Show Detail Informasi Pembayaran
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="createdAt" class="form-label">Created At</label>
                                <input type="datetime" name="datetime" class="form-control @error('date') is-invalid @enderror" value="{{ $payment->created_at }}" id="createdAt" aria-describedby="createdHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="FileName" class="form-label">Nama Pembayaran</label>
                                <input type="text" name="name" class="form-control" id="FileName" value="{{ $payment->name }}" aria-describedby="nameHelp">
                                <div id="nameHelp" class="form-text">Nama metode pembayaran.</div>
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label">Cara Pembayaran</label>
                                <textarea name="description" class="ckeditor form-control" id="desc" aria-describedby="descriptionHelp">{{ $payment->description }}</textarea>
                                <div id="descriptionHelp" class="form-text">Cara melakukan pembayaran.</div>
                            </div>
                            <div class="mb-3">
                                <label for="uploadFile" class="form-label me-2 fw-bold">Logo:</label>
                                <img src="{{Storage::url($payment->image)}}" alt="{{$payment->name}}" width="150px">
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('cms.other.payment') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                            </div>
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