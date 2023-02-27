@extends('landingpage.main')

@section('title', 'Unduhan Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
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
                        <h5 class="fw-bold">PERDA</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th class="text-center">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($perda as $index => $item)
                                    <tr>
                                        <td>{{$index+1}}</th>
                                        <td>{{$item->name}}</td>
                                        <td class="text-center">
                                            <a href="{{Storage::url($item->file)}}" class="rounded text-decoration-none bg-primary px-2 py-1 text-light" target="_blank" rel="noopener noreferrer">
                                                <i class="bi bi-download"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center alert-warning">No data found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <h5 class="fw-bold">PERBUP</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th class="text-center">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($perbup as $index => $item)
                                    <tr>
                                        <td>{{$index+1}}</th>
                                        <td>{{$item->name}}</td>
                                        <td class="text-center">
                                            <a href="{{Storage::url($item->file)}}" class="rounded text-decoration-none bg-primary px-2 py-1 text-light" target="_blank" rel="noopener noreferrer">
                                                <i class="bi bi-download"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center alert-warning">No data found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <h5 class="fw-bold">Document</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th class="text-center">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($document as $index => $item)
                                    <tr>
                                        <td>{{$index+1}}</th>
                                        <td>{{$item->name}}</td>
                                        <td class="text-center">
                                            <a href="{{Storage::url($item->file)}}" class="rounded text-decoration-none bg-primary px-2 py-1 text-light" target="_blank" rel="noopener noreferrer">
                                                <i class="bi bi-download"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center alert-warning">No data found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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

