@extends('cms.layouts.main')

@section('title', 'Sejarah Bapenda | Edit Gambar Sejarah Bapenda | Administrator')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('cms.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('cms.profile.bapenda') }}">Bapenda</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit Gambar</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fas fa-question-circle me-2"></i>Edit Gambar Sejarah</h6>
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
                                <h6 class="mb-0 font-weight-bolder">Edit Gambar Sejarah Bapenda</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-danger mb-0" href="{{ route('cms.profile.bapenda') }}"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0 mb-3">
                                <div class="card-header pb-0 px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="fa fa-images me-2"></i>Gambar Sejarah</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <img src="{{Storage::url($sejarah->image)}}" alt="{{$sejarah->name}}" width="240px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card px-0">
                                <div class="card-header pb-0 px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="fa fa-edit me-2"></i>Edit Gambar Sejarah</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </div>
                                    @endif
                                    <form action="{{ route('cms.profile.sejarah.update.image', ['id' => $sejarah->id]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="form-group mb-1">
                                                    <div class="imgPreview"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" id="images" value="{{ $sejarah->image }}" placeholder="Upload File">
                                                    <label for="file" class="form-control-label mt-1">Upload Gambar Sejarah Bapenda (*jpg,jpeg,png,bmp,webp).<br><span class="text-danger"><i class="fa fa-info-circle me-2"></i>Maksimum Size: 2 MB.</span></label>
                                                    @error('file')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-md ms-auto"><i class="fa fa-edit me-2"></i>Edit Data</button>
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
    <script>
        $(function() {
            var imgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#images').on('change', function() {
                imgPreview(this, 'div.imgPreview');
            });
        });    
    </script>
@endpush