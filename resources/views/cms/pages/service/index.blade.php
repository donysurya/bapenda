<div class="card mb-4">
    <div class="card-header pt-3">
        <div class="row mb-0 align-items-center">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0 font-weight-bolder"><i class="fa fa-hands-helping me-2"></i>Pelayanan</h6>
            </div>
            <div class="col-6 text-end">
                <a class="btn bg-gradient-dark mb-0" href="{{ route('cms.other.service.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Nama Pelayanan</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Logo Pelayanan</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Tanggal Upload</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($service as $index => $item)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <p class="text-md text-secondary mb-0">
                                                {{$index+1}}
                                            </p>
                                        </td>
                                        <td style="white-space:normal!important;" class="align-middle">
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <div class="avatar avatar-sm me-3 mt-1 bg-gradient-success shadow-success text-center rounded-circle">
                                                        <i class="fas fa-hands-helping text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="inline-size: 250px; overflow:hidden; text-overflow: ellipsis;">{{ $item->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0">Updated by: {{ $item->admin->name ?? 'Administrator'}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <img src="{{Storage::url($item->image)}}" alt="{{$item->name}}" width="120px">
                                            <a href="{{ route('cms.other.service.image', ['id' => $item->id]) }}" class="btn btn-success m-1 py-1 px-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Logo Pelayanan" style="font-size:10px;">
                                                <i class="fa fa-refresh"></i>
                                            </a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-link text-dark px-2 mb-0" href="{{ route('cms.other.service.edit', ['id' => $item->id]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-service{{ $item->id }}"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                        </td>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="modal-delete-service{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-service{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="py-3 text-center">
                                                            <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
                                                            <h4 class="text-gradient text-danger mt-4">Mohon diperhatikan!</h4>
                                                            <p>Apakah anda yakin ingin menghapus pelayanan?</p>
                                                        </div>
                                                        <div class="text-center">
                                                            <form action="{{ route('cms.other.service.destroy', ['id' => $item->id]) }}" method="post">
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
            {{ $service->links() }}
        </div>
    </div>
</div>