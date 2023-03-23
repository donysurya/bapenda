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
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="card mb-4">
                    <div class="card-header pt-3">
                        <div class="row mb-0">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder">Visi Bapenda</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('cms.profile.vision.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Visi Bapenda</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Tanggal Upload</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($vision as $index => $item)
                                                    <tr>
                                                        <td style="white-space:normal!important;" class="align-middle">
                                                            <div class="d-flex px-2 py-1">
                                                                <div>
                                                                    <div class="avatar avatar-sm me-3 mt-1 bg-gradient-danger shadow-danger text-center rounded-circle">
                                                                        <i class="fa fa-file-pdf text-lg opacity-10" aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm" style="inline-size: 250px; overflow:hidden; text-overflow: ellipsis;">{{ $item->description }}</h6>
                                                                    <p class="text-xs text-secondary mb-0">Updated by: {{ $item->admin->name ?? 'Administrator'}}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <a class="btn btn-link text-dark px-2 mb-0" href="{{ route('cms.profile.vision.edit', ['id' => $item->id]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-publication{{ $item->id }}"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                        </td>

                                                        <!-- Delete Modal -->
                                                        <div class="modal fade" id="modal-delete-publication{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-publication{{ $item->id }}" aria-hidden="true">
                                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="py-3 text-center">
                                                                            <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
                                                                            <h4 class="text-gradient text-danger mt-4">Mohon diperhatikan!</h4>
                                                                            <p>Apakah anda yakin ingin menghapus Visi?</p>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <form action="{{ route('cms.profile.vision.destroy', ['id' => $item->id]) }}" method="post">
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <div class="card mb-4">
                    <div class="card-header pt-3">
                        <div class="row mb-0">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder">Misi Bapenda</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('cms.profile.mission.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Visi</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Tanggal Upload</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($mission as $index => $item)
                                                    <tr>
                                                        <td style="white-space:normal!important;" class="align-middle">
                                                            <div class="d-flex px-2 py-1">
                                                                <div>
                                                                    <div class="avatar avatar-sm me-3 mt-1 bg-gradient-danger shadow-danger text-center rounded-circle">
                                                                        <i class="fa fa-file-pdf text-lg opacity-10" aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm" style="inline-size: 250px; overflow:hidden; text-overflow: ellipsis;">{{ $item->description }}</h6>
                                                                    <p class="text-xs text-secondary mb-0">Updated by: {{ $item->admin->name ?? 'Administrator'}}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <a class="btn btn-link text-dark px-2 mb-0" href="{{ route('cms.profile.mission.edit', ['id' => $item->id]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-publication{{ $item->id }}"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                        </td>

                                                        <!-- Delete Modal -->
                                                        <div class="modal fade" id="modal-delete-publication{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-publication{{ $item->id }}" aria-hidden="true">
                                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="py-3 text-center">
                                                                            <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
                                                                            <h4 class="text-gradient text-danger mt-4">Mohon diperhatikan!</h4>
                                                                            <p>Apakah anda yakin ingin menghapus Visi?</p>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <form action="{{ route('cms.profile.mission.destroy', ['id' => $item->id]) }}" method="post">
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
                                                        <td colspan="4" class="text-center">
                                                            <p class="text-sm text-secondary font-weight-bolder mb-0">- No data found -</p>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-12">
                <div class="card mb-4">
                    <div class="card-header pt-3">
                        <div class="row mb-0">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder">Visi Bapenda</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('cms.profile.vision.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Visi Bapenda</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Tanggal Upload</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($vision as $index => $item)
                                                    <tr>
                                                        <td style="white-space:normal!important;" class="align-middle">
                                                            <div class="d-flex px-2 py-1">
                                                                <div>
                                                                    <div class="avatar avatar-sm me-3 mt-1 bg-gradient-danger shadow-danger text-center rounded-circle">
                                                                        <i class="fa fa-file-pdf text-lg opacity-10" aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm" style="inline-size: 250px; overflow:hidden; text-overflow: ellipsis;">{{ $item->description }}</h6>
                                                                    <p class="text-xs text-secondary mb-0">Updated by: {{ $item->admin->name ?? 'Administrator'}}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <a class="btn btn-link text-dark px-2 mb-0" href="{{ route('cms.profile.vision.edit', ['id' => $item->id]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-publication{{ $item->id }}"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                        </td>

                                                        <!-- Delete Modal -->
                                                        <div class="modal fade" id="modal-delete-publication{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-publication{{ $item->id }}" aria-hidden="true">
                                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="py-3 text-center">
                                                                            <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
                                                                            <h4 class="text-gradient text-danger mt-4">Mohon diperhatikan!</h4>
                                                                            <p>Apakah anda yakin ingin menghapus Visi?</p>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <form action="{{ route('cms.profile.vision.destroy', ['id' => $item->id]) }}" method="post">
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-12">
                <div class="card mb-4">
                    <div class="card-header pt-3">
                        <div class="row mb-0">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bolder">Misi Bapenda</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('cms.profile.mission.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Visi</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Tanggal Upload</th>
                                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($mission as $index => $item)
                                                    <tr>
                                                        <td style="white-space:normal!important;" class="align-middle">
                                                            <div class="d-flex px-2 py-1">
                                                                <div>
                                                                    <div class="avatar avatar-sm me-3 mt-1 bg-gradient-danger shadow-danger text-center rounded-circle">
                                                                        <i class="fa fa-file-pdf text-lg opacity-10" aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm" style="inline-size: 250px; overflow:hidden; text-overflow: ellipsis;">{{ $item->description }}</h6>
                                                                    <p class="text-xs text-secondary mb-0">Updated by: {{ $item->admin->name ?? 'Administrator'}}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <a class="btn btn-link text-dark px-2 mb-0" href="{{ route('cms.profile.mission.edit', ['id' => $item->id]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-publication{{ $item->id }}"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                        </td>

                                                        <!-- Delete Modal -->
                                                        <div class="modal fade" id="modal-delete-publication{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-publication{{ $item->id }}" aria-hidden="true">
                                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="py-3 text-center">
                                                                            <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
                                                                            <h4 class="text-gradient text-danger mt-4">Mohon diperhatikan!</h4>
                                                                            <p>Apakah anda yakin ingin menghapus Visi?</p>
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <form action="{{ route('cms.profile.mission.destroy', ['id' => $item->id]) }}" method="post">
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
                                                        <td colspan="4" class="text-center">
                                                            <p class="text-sm text-secondary font-weight-bolder mb-0">- No data found -</p>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
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
@endpush