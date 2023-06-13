@extends('cms.layouts.main')

@section('title', 'Detail Pembayaran | Buat Detail Pembayaran | Administrator')

@push('css')
@endpush

@push('headscript')
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('cms.home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" href="{{ route('cms.other.index') }}">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Pembayaran</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fa fa-credit-card me-2"></i>Pembayaran</h6>
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
                                <h6 class="mb-0 font-weight-bolder">Data Pembayaran</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-primary m-1" href="{{ route('cms.other.payment.detail.create', ['id' => $payment->id]) }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Instruksi</a>
                                <a class="btn bg-gradient-danger m-1" href="{{ route('cms.other.index') }}"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="col-lg-12">
                                    <div class="card-body pt-3 px-3 pb-2">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group mb-1">
                                                    <label for="name" class="form-control-label mt-1">Nama metode pembayaran.</label>
                                                    <input class="form-control" value="{{ $payment->name }}" name="name" type="text" placeholder="Nama Channel Pembayaran">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description" class="form-control-label">Deskripsi Pembayaran.</label>
                                                    <span class="form-control">{!! $payment->description !!}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group d-flex justify-content-center">
                                                    <label for="file" class="form-control-label mt-1">Logo Pembayaran</label>
                                                </div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <img src="{{Storage::url($payment->image)}}" alt="{{$payment->name}}" width="250px" height="120px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-3">
                        <div class="row">
                            <div class="card px-0">
                                <div class="col-lg-12">
                                    <div class="card-body pt-3 px-3 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">No</th>
                                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Gambar Instruksi</th>
                                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Instruksi</th>
                                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Tanggal Upload</th>
                                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($payment_detail as $index => $item)
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <p class="text-md text-secondary mb-0">
                                                                    {{$index+1}}
                                                                </p>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <img src="{{Storage::url($item->image)}}" alt="{{$item->name}}" width="120px">
                                                                <a href="{{ route('cms.other.payment.detail.image', ['id' => $payment->id, 'detail' => $item->id]) }}" class="btn btn-success m-1 py-1 px-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Logo Pembayaran" style="font-size:10px;">
                                                                    <i class="fa fa-refresh"></i>
                                                                </a>
                                                            </td>
                                                            <td class="align-middle">
                                                                <div class="d-flex px-2 py-1">
                                                                    <div class="d-flex flex-column justify-content-center">
                                                                        <h6 class="mb-0 text-sm">{!! Str::limit( strip_tags( $item->description ), 40 ) !!}</h6>
                                                                        <p class="text-xs text-secondary mb-0">Updated by: {{ $item->admin->name ?? 'Administrator'}}</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <a class="btn btn-link text-dark px-2 mb-0" href="{{ route('cms.other.payment.detail.edit', ['id' => $payment->id, 'detail' => $item->id]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                                                <a class="btn btn-link text-danger text-gradient px-2 mb-0" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-payment-detail{{ $item->id }}"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                            </td>

                                                            <!-- Delete Modal -->
                                                            <div class="modal fade" id="modal-delete-payment-detail{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-payment-detail{{ $item->id }}" aria-hidden="true">
                                                                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <div class="py-3 text-center">
                                                                                <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
                                                                                <h4 class="text-gradient text-danger mt-4">Mohon diperhatikan!</h4>
                                                                                <p>Apakah anda yakin ingin menghapus instruksi pembayaran?</p>
                                                                            </div>
                                                                            <div class="text-center">
                                                                                <form action="{{ route('cms.other.payment.detail.destroy', ['id' => $item->id]) }}" method="post">
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
            </div>
        </div>    

        <!-- Footer -->
        @include('cms.partials.footer')
        <!-- End Footer -->
    </div>
@endsection

@push('bottomscript')
@endpush