@extends('cms.layouts.main')

@section('title', 'Gallery | Administrator')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('cms.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Gallery</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-picture-o me-2"></i>Gallery</h6>
    </nav>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pt-3">
                        <div class="row mb-3 align-items-center">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder">Daftar Gallery</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('cms.gallery.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card px-0">
                                <div class="card-header pb-0 px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="fa fa-search me-2"></i>Filter Pencarian</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 px-3 pb-2">
                                    <form method="get" action="">
                                        <div class="row align-items-center">
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="name" value="{{$_GET['name'] ?? ''}}" placeholder="Nama">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary btn-sm ms-auto"><i class="fa fa-search me-2"></i>Cari</button>
                                                <a href="{{ route('cms.gallery') }}" class="btn btn-success btn-sm ms-auto"><i class="fa fa-th me-2"></i>Tampilkan Semua</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card">
                                <div class="card-body px-0 py-3">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">No</th>
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Nama</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder ps-2">Foto Gallery</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Tanggal Upload</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($gallery as $index => $item)
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <p class="text-md text-secondary mb-0">
                                                                {{$index+1}}
                                                            </p>
                                                        </td>
                                                        <td style="white-space:normal!important;" class="align-middle">
                                                            <div class="d-flex px-2 py-1">
                                                                <div>
                                                                    <div class="avatar avatar-sm me-3 mt-1 bg-gradient-danger shadow-danger text-center rounded-circle">
                                                                        <i class="fa fa-picture-o text-lg opacity-10" aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                                                    <p class="text-xs text-secondary mb-0">Updated by: {{ $item->admin->name ?? 'Administrator'}}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <img src="{{Storage::url($item->image)}}" alt="{{$item->name}}" width="120px">
                                                            <a href="{{ route('cms.gallery.image', ['id' => $item->id]) }}" class="btn btn-success m-1 py-1 px-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Foto Gallery" style="font-size:10px;">
                                                                <i class="fa fa-refresh"></i>
                                                            </a>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <a class="btn btn-link text-dark px-2 mb-0" href="{{ route('cms.gallery.edit', ['id' => $item->id]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-gallery{{ $item->id }}"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                            <a class="btn btn-link text-primary px-2 mb-0" href="{{ route('cms.gallery.show', ['id' => $item->id]) }}"><i class="fas fa-eye text-primary me-2" aria-hidden="true"></i>Lihat</a>
                                                        </td>

                                                        <!-- Delete Modal -->
                                                        <div class="modal fade" id="modal-delete-gallery{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-gallery{{ $item->id }}" aria-hidden="true">
                                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="py-3 text-center">
                                                                            <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
                                                                            <h4 class="text-gradient text-danger mt-4">Mohon diperhatikan!</h4>
                                                                            <p>Apakah anda yakin ingin menghapus Foto dari Gallery?</p>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <form action="{{ route('cms.gallery.destroy', ['id' => $item->id]) }}" method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button type="submit" class="btn btn-primary"><i class="fa fa-trash me-2"></i>Hapus Data</button>
                                                                            </form>
                                                                            <button type="button" class="btn btn-danger text-white ml-auto" data-bs-dismiss="modal"><i class="fa fa-close me-2"></i>Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Delete Modal -->
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            <p class="text-sm text-secondary font-weight-bolder mb-0">- No data found -</p>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3"></div>
                            {{ $gallery->withQueryString()->links() }}
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
@endpush