@extends('landingpage.main')

@section('title', 'Kepala Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
@endpush

@push('headscript')
@endpush

@section('content')
    <div class="container-fluid mx-0 px-0">
        <div class="row gy-3 mt-3 px-3">

            @include('landingpage.about.menu', ['active' => 'history'])

            <div class="col-lg-12 p-4 pt-0">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-dark my-2">Kepala Bapenda</h5>
                    </div>
                    <div class="card-body p-4 pb-0">
                        <h4 class="fw-bold text-uppercase text-center mb-3">Kepala badan pendapatan daerah kabupaten katingan provinsi kalimantan tengah</h4>
                        <hr class="bg-secondary">
                        <h5 class="fw-bold mt-4">Profil Kepala</h5>
                        <p>Kepala Badan Pendapatan Daerah Kabupaten Katingan</p>
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <div class="card shadow mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('img/news/1.jpeg') }}" class="img-fluid rounded-start h-100" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold mb-3">DR. ABC, M.Si</h5>
                                                <p class="card-text">Menjabat sebagai Kepala Badan Pendapatan Daerah Kabupaten Katingan pada 01 Agustus 2020 sampai sekarang.</p>
                                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, quaerat dicta reprehenderit, adipisci pariatur provident eaque quas voluptatem quod voluptate tempore ipsa maxime ducimus expedita necessitatibus explicabo alias magni distinctio repellendus. Aliquid dolorum id saepe iusto facilis dolores necessitatibus corrupti. Quia atque libero fugit nemo corporis sit inventore, facilis velit.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="fw-bold mt-4">Tugas dan Fungsi</h5>
                        <p class="mb-2">Kepala Badan Pendapatan Daerah Kabupaten Katingan</p>
                        <p style="text-align:justify;" class="mb-2">
                            Sebagaimana yang telah diatur dalam <a href="#!" class="fw-bold">Peraturan Gubernur Prov. Kalimantan Tengah Nomor xx Tahun 20xx</a> mengenai Tugas Pokok, Fungsi, Rincian Tugas Unit dan Tata Kerja Badan Pendapatan Daerah Kabupaten Katingan Provinsi Kalimantan Tengah, Fungsi dari Kepala Badan Pendapatan Daerah adalah meliputi sebagai berikut:
                        </p>
                        <ol>
                            <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae, eum!</li>
                            <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae, eum!</li>
                            <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae, eum!</li>
                            <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae, eum!</li>
                        </ol>
                        <p style="text-align:justify;" class="mb-2">
                            Adapun Tugas Kepala Badan Pendapatan adalah sebagai berikut :                        </p>
                        <ol>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente labore nihil quam blanditiis, neque ducimus doloremque debitis sed beatae ullam!</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente labore nihil quam blanditiis, neque ducimus doloremque debitis sed beatae ullam!</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente labore nihil quam blanditiis, neque ducimus doloremque debitis sed beatae ullam!</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente labore nihil quam blanditiis, neque ducimus doloremque debitis sed beatae ullam!</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente labore nihil quam blanditiis, neque ducimus doloremque debitis sed beatae ullam!</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente labore nihil quam blanditiis, neque ducimus doloremque debitis sed beatae ullam!</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente labore nihil quam blanditiis, neque ducimus doloremque debitis sed beatae ullam!</li>
                        </ol>
                    </div>
                    <div class="row justify-content-end p-4">
                        <img src="{{ asset('img/logo.png') }}" alt="" class="about_logo">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('bottomscript')
@endpush

