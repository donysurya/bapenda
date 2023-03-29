@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Update Berita Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('headscript')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() { $("#form-select-select2").select2(); });   
    </script>
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="bi bi-file-earmark-richtexttext-primary me-2"></i>Update Berita Bapenda</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.news.post.index') }}">Berita Bapenda</a></li>
                <li class="breadcrumb-item active">Update Berita Bapenda</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="bi bi-file-earmark-richtexttext-primary me-1"></i>
                            Update Berita Bapenda
                        </div>
                        <div class="card-body">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ session()->get('error') }}</strong>
                                </div>
                            @endif
                            <form action="{{ route('cms.news.post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-control @error('category') is-invalid @enderror" aria-label="category" id="category" name="category" aria-describedby="categoryDesc">
                                        <option value="" disabled>Select Category</option>
                                        @foreach($category as $item)
                                            <option value="{{ $item->id }}" {{old('category') ?? $post->category_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <small id="categoryDesc" class="form-text text-muted">Pilih kategori Untuk Berita Bapenda Baru. <strong>Sebelum membuat berita terbaru, create / update Kategori terlebih dahulu.</strong></small>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tags" class="form-label">Tags</label>
                                    <select class="form-control @error('tags') is-invalid @enderror" multiple="multiple" aria-label="tags" id="form-select-select2" name="tags[]" aria-describedby="tagsDesc">
                                        @foreach ($tag as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <small id="tagsDesc" class="form-text text-muted">Pilih tags Untuk Berita Bapenda Baru. <strong>Sebelum membuat berita terbaru, create / update tags terlebih dahulu.</strong></small>
                                    @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="title">Title / Post Name</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Post Name" name="title" aria-describedby="titleDesc" value="{{ $post->title }}">
                                    <small id="titleDesc" class="form-text text-muted">Deskripsikan Nama Berita untuk Berita Bapenda</small>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="abstract">Abstract</label>
                                    <textarea class="form-control @error('abstract') is-invalid @enderror" id="abstract" name="abstract" rows="3" aria-describedby="abstract">{{ $post->abstract }}</textarea>
                                    <small id="abstractDesc" class="form-text text-muted">Deskripsikan secara singkat mengenai Berita terbaru yang akan di post</small>
                                    @error('abstract')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="content">Content</label>
                                    <textarea name="content" class="ckeditor form-control @error('content') is-invalid @enderror" id="content" aria-describedby="contentHelp">{{ $post->content }}</textarea>
                                    <small id="contentHelp" class="form-text text-muted">Deskripsikan secara lengkap tentang berita terbaru yang akan di post</small>
                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="picture">Post Image / Post Thumbnail</label>
                                    <input type="file" name="picture" class="form-control py-1 @error('picture') is-invalid @enderror" required id="picture" aria-describedby="picture">
                                    <small id="picture" class="form-text text-muted">Upload Gambar mengenai Berita terbaru (*PNG, JPG, WEBP). <strong>Maksimum Size: 200 kb</strong></small>
                                    @error('picture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('cms.news.post.index') }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left me-2"></i>Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-edit me-2"></i>Update Berita Bapenda</button>
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