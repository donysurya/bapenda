@extends('landingpage.main')

@section('title', 'Unduhan Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <style>
        .table-scrollable {
            overflow-x: auto;
            box-shadow: inset 0 0 5px rgba(150, 150 ,150,0.35);
            margin: auto;
        }
    </style>
@endpush

@push('headscript')
@endpush

@section('content')
    <div class="container-fluid mx-0 px-0">
        <div class="row gy-3 mt-3 px-3">
            <div class="col-lg-12 p-4 pt-0">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-dark fw-bold my-2"><i class="bi bi-download me-2"></i>File Unduhan Bapenda Katingan</h5>
                    </div>
                    <div class="card-body p-4 pb-0">
                        <h6 class="fw-bold">PERDA</h6>
                        <div class="table-scrollable mb-4">
                            <table class="m-auto table table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th style="width:15px!important;">No</th>
                                        <th>Nama File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($perda as $index => $item)
                                        <tr>
                                            <td>{{$index+1}}</th>
                                            <td>
                                                <a href="{{Storage::url($item->file)}}" class="text-decoration-none" target="_blank" rel="noopener noreferrer">
                                                    <i class="bi bi-download"></i>&nbsp;&nbsp;{{$item->name}}
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center alert-warning">No data found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <h6 class="fw-bold">PERBUP</h6>
                        <div class="table-scrollable mb-4">
                            <table class="m-auto table table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th style="width:15px!important;">No</th>
                                        <th>Nama File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($perbup as $index => $item)
                                        <tr>
                                            <td>{{$index+1}}</th>
                                            <td>
                                                <a href="{{Storage::url($item->file)}}" class="text-decoration-none" target="_blank" rel="noopener noreferrer">
                                                    <i class="bi bi-download"></i>&nbsp;&nbsp;{{$item->name}}
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center alert-warning">No data found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <h6 class="fw-bold">Document</h6>
                        <div class="table-scrollable mb-4">
                            <table class="m-auto table table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th style="width:15px!important;">No</th>
                                        <th>Nama File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($document as $index => $item)
                                        <tr>
                                            <td>{{$index+1}}</th>
                                            <td>
                                                <a href="{{Storage::url($item->file)}}" class="text-decoration-none" target="_blank" rel="noopener noreferrer">
                                                    <i class="bi bi-download"></i>&nbsp;&nbsp;{{$item->name}}
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center alert-warning">No data found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-end p-4">
                        <img src="{{ asset('img/logo.png') }}" alt="" class="footer_logo">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('bottomscript')
@endpush

