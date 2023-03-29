<div class="card mb-4">
    <div class="card-header py-3">
        <div class="row mb-3 align-items-center">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0 font-weight-bolder">Kategori Berita</h6>
            </div>
            <div class="col-6 text-end">
                <a class="btn bg-gradient-dark mb-0" href="{{ route('cms.news.category.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="nameCategory" value="{{$_GET['nameCategory'] ?? ''}}" placeholder="Nama Category">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-sm ms-auto"><i class="fa fa-search me-2"></i>Cari</button>
                                <a href="{{ route('cms.news.index') }}" class="btn btn-success btn-sm ms-auto"><i class="fa fa-th me-2"></i>Semua</a>
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
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Nama Kategori</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Tanggal Upload</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($category as $index => $item)
                                    <tr>
                                        <td style="white-space:normal!important;" class="align-middle">
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <div class="avatar avatar-sm me-3 mt-1 bg-gradient-info shadow-info text-center rounded-circle">
                                                        <i class="fas fa-th-large text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="inline-size: 250px; overflow:hidden; text-overflow: ellipsis;">{!! $item->name !!}</h6>
                                                    <p class="text-xs text-secondary mb-0">Updated by: {{ $item->admin->name ?? 'Administrator'}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-link text-dark px-2 mb-0" href="{{ route('cms.news.category.edit', ['id' => $item->id]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-category{{ $item->id }}"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                        </td>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="modal-delete-category{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-category{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="py-3 text-center">
                                                            <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
                                                            <h4 class="text-gradient text-danger mt-4">Mohon diperhatikan!</h4>
                                                            <p>Apakah anda yakin ingin menghapus Kategori?</p>
                                                        </div>
                                                        <div class="text-center">
                                                            <form action="{{ route('cms.news.category.destroy', ['id' => $item->id]) }}" method="post">
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
                                        <td colspan="3" class="text-center">
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
            {{ $category->withQueryString()->links() }}
        </div>
    </div>
</div>