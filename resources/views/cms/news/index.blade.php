@extends('cms.layouts.main')

@section('title', 'Berita Bapenda | Administrator')

@push('css')
    <style>
        h6.text-sejarah {
            inline-size: 250px; 
            white-space:nowrap; 
            overflow:hidden; 
            text-overflow: ellipsis;
        }
    </style>
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('cms.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Berita</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-newspaper-o me-2"></i>Berita Bapenda</h6>
    </nav>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="text-uppercase text-dark text-xs font-weight-bolder mb-0"><i class="fa fa-info-circle me-2 text-danger" aria-hidden="true"></i>Fitur ini bertujuan untuk membuat sebuah berita yang akan ditampilkan kepada publik, pada fitur ini terdapat kategori berita, tags berita, serta post berita. Berita yang akan ditampilkan kepada publik akan diolah di post berita, <span class="text-danger text-md">sebelum membuat post berita, admin akan diarahkan untuk mengolah kategori dan tags berita terlebih dahulu.</span></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-12">
                <!-- Category  -->
                @include('cms.news.category.index')
                <!-- End Category -->
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <!-- Tags  -->
                @include('cms.news.tags.index')
                <!-- End Tags -->
            </div>

            <div class="col-xl-12 col-lg-12 col-12">
                <!-- Posts  -->
                @include('cms.news.posts.index')
                <!-- End Posts -->
            </div>
        </div>    

        <!-- Footer -->
        @include('cms.partials.footer')
        <!-- End Footer -->
    </div>
@endsection

@push('bottomscript')
@endpush