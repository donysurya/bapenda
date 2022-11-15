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
                        <h5 class="fw-bold">Unduh file</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th class="text-center">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</th>
                                    <td>Jumlah Tower Telekomunikasi Berdasarkan Kecamatan Tahun 2017</td>
                                    <td class="text-center">
                                        <a href="#!" class="rounded text-decoration-none bg-primary px-2 py-1 text-light">
                                            <i class="bi bi-download"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</th>
                                    <td>Edaran Bupati Katingan Nomor: 800/765/BKPP-2/2021 Tentang PELAKSANAAN APEL PAGI</td>
                                    <td class="text-center">
                                        <a href="#!" class="rounded text-decoration-none bg-primary px-2 py-1 text-light">
                                            <i class="bi bi-download"></i>
                                        </a>
                                    </td>
                                </tr>
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

