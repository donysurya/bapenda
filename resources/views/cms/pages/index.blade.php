@extends('cms.layouts.main')

@section('title', 'Landing Pages Bapenda | Administrator')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('cms.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Pages</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fas fa-laptop me-2"></i>Landing Pages</h6>
    </nav>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="text-uppercase text-primary text-xs font-weight-bolder mb-0">Fitur ini bertujuan untuk melakukan perubahan pada halaman utama website bapenda, yang terdiri dari informasi pembayaran, alur proses, pelayanan, infografis, faq, link portal bapenda, serta video.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-12">
                <!-- Payment  -->
                @include('cms.pages.payment.index')
                <!-- End Payment -->
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <!-- Flow  -->
                @include('cms.pages.flow.index')
                <!-- End Flow -->
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <!-- Service  -->
                @include('cms.pages.service.index')
                <!-- End Service -->
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <!-- Infografis  -->
                @include('cms.pages.infografis.index')
                <!-- End Infografis -->
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <!-- FAQ  -->
                @include('cms.pages.faq.index')
                <!-- End FAQ -->
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <!-- Portal  -->
                @include('cms.pages.portal.index')
                <!-- End Portal -->
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <!-- Portal  -->
                @include('cms.pages.video.index')
                <!-- End Portal -->
            </div>
        </div>    

        <!-- Footer -->
        @include('cms.partials.footer')
        <!-- End Footer -->
    </div>
@endsection

@push('bottomscript')
@endpush