@extends('cms.layouts.app')

@section('title', 'Administrator Bapenda | Alur Proses | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard/mycss.css') }}"> -->
@endpush

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-sync text-primary me-2"></i>Alur Proses</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('cms.home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Alur Proses</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('cms.other.flow.create')}}" class="px-4 py-2 rounded btn btn-primary mb-4">
                        <i class="far fa-plus-square me-2"></i>Create Alur Proses
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-sync text-primary me-1"></i>
                            Alur Proses
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Alur Proses</th>
                                        <th>Logo Alur Proses</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($flow as $index => $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                <img src="{{Storage::url($item->image)}}" alt="{{$item->name}}" width="120px">
                                                <a href="{{ route('cms.other.flow.image', ['id' => $item->id]) }}" class="btn btn-info m-1 py-1 px-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Logo Alur Sistem" style="font-size:10px;">
                                                    <i class="fas fa-sync text-light"></i>
                                                </a>
                                            </td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <center>
                                                    <a href="{{ route('cms.other.flow.show', ['id' => $item->id]) }}" class="btn btn-primary m-1 py-1 px-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" style="font-size:10px;">
                                                        <i class="fa fa-eye text-light"></i>
                                                    </a>
                                                    <a href="{{ route('cms.other.flow.edit', ['id' => $item->id]) }}" class="btn btn-secondary m-1 py-1 px-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Update" style="font-size:10px;">
                                                        <i class="fa fa-edit text-light"></i>
                                                    </a>
                                                    <a class="btn btn-danger m-1 py-1 px-2" href="#" data-bs-toggle="modal" data-bs-target="#DeleteFlow{{ $item->id }}" title="Delete Data" style="font-size:10px;"><i class="fa fa-trash"></i></a>
                                                </center>
                                            </td>

                                            <!-- Delete Data Portal -->
                                            <div class="modal fade" id="DeleteFlow{{ $item->id }}" tabindex="-1" aria-labelledby="ModalDeleteFlow" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-gray-800 font-weight-bold" id="ModalDeleteFlow"></i>CONFIRM DELETE!</h5>
                                                        </div>
                                                        <div class="modal-body"> 
                                                            <div class="row mb-3 text-center">
                                                                <i class="fas fa-exclamation-triangle fa-3x text-danger mr-2"></i>
                                                            </div>
                                                            <div class="row mb-2 text-dark justify-content-center" style="font-size:24px">
                                                                <center>Are you sure?</center>    
                                                            </div>
                                                            <div class="row text-secondary justify-content-center" style="font-size:15px">
                                                                <center>You will not be able to recover this Process Flow!</center>    
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-end">
                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fas fa-times me-2"></i>Cancel</button>
                                                            <form action="{{ route('cms.other.flow.destroy', ['id' => $item->id]) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash me-2"></i>Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center alert-warning">No data found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>   
                </div>
            </div>      
        </div>
    </main>
@endsection