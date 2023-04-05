@extends('cms.layouts.main')

@section('title', 'Profil Bapenda | Administrator')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('cms.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Profil</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fas fa-question-circle me-2"></i>Profil Bapenda</h6>
    </nav>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="text-uppercase text-primary text-xs font-weight-bolder mb-0">Fitur ini bertujuan untuk melakukan perubahan pada halaman profil, yang terdiri dari visi & misi, sejarah, kepala bapenda, serta struktur organisasi.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-12">
                <!-- Visi  -->
                @include('cms.bapenda.visi.index')
                <!-- End Visi -->
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <!-- Visi  -->
                @include('cms.bapenda.misi.index')
                <!-- End Visi -->
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <!-- Sejarah  -->
                @include('cms.bapenda.sejarah.index')
                <!-- End Sejarah -->
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <!-- Kepala  -->
                @include('cms.bapenda.kepala.index')
                <!-- End Kepala -->
            </div>

            <div class="col-xl-12 col-lg-12 col-12">
                <!-- Struktur  -->
                @include('cms.bapenda.struktur.index')
                <!-- End Struktur -->
            </div>
        </div>    

        <!-- Footer -->
        @include('cms.partials.footer')
        <!-- End Footer -->
    </div>
@endsection

@push('bottomscript')
@endpush