@extends('landingpage.main')

@section('title', 'Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endpush

@push('headscript')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
@endpush

@section('content')
    <div class="container-fluid mx-0 px-0">
        <div class="main border-light border-bottom">
            <div class="section-center mt-lg-0 mt-md-0 mt-5">
                <h3 class="mb-3 text-uppercase home">Selamat Datang</h3>
                <h3 class="mb-3 text-uppercase home">di Portal Resmi</h3>
                <h1 class="mb-4 text-uppercase home">Badan Pendapatan Daerah</h1>
                <h1 class="mb-4 text-uppercase home">"Bapenda"</h1>
                <h3 class="mb-3 text-uppercase home">Kabupaten Katingan</h3>
                <h3 class="mb-3 text-uppercase home">Provinsi Kalimantan Tengah</h3>

                <div class="align-items-center justify-content-center mt-4">
                    <a href="#about" class="text-uppercase text-decoration-none btn-trailer m-3">Bapenda</a>
                    <a href="#news" class="text-uppercase text-decoration-none btn-trailer m-3">Berita</a>
                </div>
            </div>
        </div>

        <section id="about" class="p-4 bg-light align-items-center">
            <div class="row justify-content-center align-items-center" style="min-height:80vh!important;">
                <div class="col-lg-6 col-12 mt-0">
                    <div class="wrappers" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" data-aos-duration="1500">
                        <div class="cards">
                            <img src="{{ asset('img/logo_katingan.png') }}" alt="" width="100px" srcset="">
                            <h1 class="tes text-center">
                                <span class="enclosed">Bapenda</span>Katingan
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <h1 class="fw-bold mb-3 text-uppercase text-welcome" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1400"><i class="bi bi-info-circle me-3"></i>Profil Bapenda</h1>
                    <p class="fw-bold" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1200">Badan Pendapatan Daerah merupakan Satuan Perangkat Kerja Daerah (SKPD) Pemerintah Kabupaten Katingan yang bertugas dalam melakukan pemungutan, penagihan dan pengawasan pajak dan retribusi pada pemerintah Kabupaten Katingan. Bapenda Katingan memiliki visi terwujudnya Kabupaten Katingan yang bermartabat.</p>
                    <a href="{{ route('about') }}" class="mt-2 text-decoration-none btn btn-outline-danger fw-bold text-center px-4 py-2" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1300"><i class="bi bi-info-circle me-2"></i>Detail Bapenda</a>
                </div>
            </div>
        </section>

        <hr class="section-break-1">

        <section id="news" class="px-4 bg-light py-5" style="min-height:50vh!important;">
            <h2 class="fw-bold mb-4 text-uppercase text-welcome text-center"><i class="bi bi-newspaper me-3"></i>Berita Bapenda</h2>
            <div class="row gy-4 mt-4 mb-0 align-items-center px-lg-4 px-md-2 px-2">
                <div class="col-lg-7 col-12">
                    <div class="card shadow mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('img/news/1.jpeg') }}" class="img-fluid rounded-start h-100" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold mb-3">Rapat Pembahasan Analisa SWOT Smart City Kabupaten Katingan</h5>
                                    <p class="card-text">Kepala Dinas Komunikasi Informatika Persandian dan Statistik (Diskominfopersantik) Kabupaten Katingan memimpin Rapat Pembahasan Analisa SWOT Smart City Kabupaten Katingan di Media Center Diskominfopersantik. Senin (27/6/2022). Rapat pembahasan ini membahas 6 pilar yang menjadi dasar... <a href="#!" class="text-deoration-none">[Selengkapnya]</a></p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#!" class="text-decoration-none btn-news text-center d-lg-block d-none"><i class="bi bi-newspaper me-2"></i>Portal Berita</a>
                </div>
                <div class="col-lg-5 col-12 border-start border-danger mb-3">
                    <div class="row mb-3">
                        <div class="col-3">
                            <img src="{{ asset('img/news/1.jpeg') }}" class="border border-danger rounded p-2 w-100" alt="...">
                        </div>
                        <div class="col-9 border-bottom border-danger ps-0">
                            <small class="mb-0">1 Agustus 2022</small>
                            <p class="fw-bold mb-0">Rapat Pembahasan Analisa SWOT Smart City Kabupaten Katingan</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <img src="{{ asset('img/news/1.jpeg') }}" class="border border-danger rounded p-2 w-100" alt="...">
                        </div>
                        <div class="col-9 border-bottom border-danger ps-0">
                            <small class="mb-0">1 Agustus 2022</small>
                            <p class="fw-bold mb-0">Rapat Pembahasan Analisa SWOT Smart City Kabupaten Katingan</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <img src="{{ asset('img/news/1.jpeg') }}" class="border border-danger rounded p-2 w-100" alt="...">
                        </div>
                        <div class="col-9 border-bottom border-danger ps-0">
                            <small class="mb-0">1 Agustus 2022</small>
                            <p class="fw-bold mb-0">Rapat Pembahasan Analisa SWOT Smart City Kabupaten Katingan</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('img/news/1.jpeg') }}" class="border border-danger rounded p-2 w-100" alt="...">
                        </div>
                        <div class="col-9 border-bottom border-danger ps-0">
                            <small class="mb-0">1 Agustus 2022</small>
                            <p class="fw-bold mb-0">Rapat Pembahasan Analisa SWOT Smart City Kabupaten Katingan</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('article') }}" class="text-decoration-none btn-news text-center d-lg-none d-block"><i class="bi bi-newspaper me-2"></i>Portal Berita</a>
                </div>
            </div>
        </section>

        <section id="search" class="py-4" style="background:linear-gradient(to right, #d12219, #e88898);">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-12 px-4">
                    <form action="https://bppps.kemensos.go.id/all-berita">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Ketik untuk mencari berita .." name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-light" type="submit"><span class="bi bi-search"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section id="video_infografis" class="p-4 bg-light" style="min-height:50vh!important;">
            <div class="container">
                <div class="row gy-4 my-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <h3 class="fw-bold mb-4 text-uppercase text-welcome"><i class="bi bi-play-btn me-3"></i>Video</h3>
                        <div class="row">
                            <div class="col-12 p-2">
                                <iframe height="350" src="https://www.youtube.com/embed/6Av2zH4jN_0" class="w-100" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <p class="mt-3">
                                <a href="{{ route('video') }}" class="text-decoration-none rounded px-3 py-2 bg-info fw-bold text-white"><i class="bi bi-box-arrow-up-right me-2"></i>Video Lainnya</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <h3 class="fw-bold mb-4 text-uppercase text-welcome"><i class="bi bi-images me-3"></i>Infografis</h3>
                        <div class="row">
                            <div class="col-6 p-2">
                                <img src="{{ asset('img/infografis/1.jpeg') }}" class="rounded w-100" alt="...">
                            </div>
                            <div class="col-6 p-2">
                                <img src="{{ asset('img/infografis/1.jpeg') }}" class="rounded w-100" alt="...">
                            </div>
                            <div class="col-6 p-2">
                                <img src="{{ asset('img/infografis/1.jpeg') }}" class="rounded w-100" alt="...">
                            </div>
                            <div class="col-6 p-2">
                                <img src="{{ asset('img/infografis/1.jpeg') }}" class="rounded w-100" alt="...">
                            </div>
                            <p class="mt-4">
                                <a href="{{ route('infografis') }}" class="text-decoration-none rounded px-3 py-2 bg-info fw-bold text-white"><i class="bi bi-box-arrow-up-right me-2"></i>Infografis Lainnya</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr class="section-break-1">

        <section id="flow" class="p-4 py-5 bg-light" style="min-height:50vh!important;">
            <h2 class="fw-bold mb-4 text-uppercase text-welcome text-center">Alur Proses Pajak Online</h2>
            <div class="row my-4 gy-3">
                <div class="col-lg-4 col-md-6 col-12 text-center">
                    <img src="{{ asset('img/flow/01.png') }}" class="rounded w-25 mb-3" alt="...">
                    <p class="fw-bold">Wajib Pajak Registrasi ke <a href="#!" class="text-decoration-none">bapenda.katingan.go.id</a></p>
                </div>
                <div class="col-lg-4 col-md-6 col-12 text-center">
                    <img src="{{ asset('img/flow/02.png') }}" class="rounded w-25 mb-3" alt="...">
                    <p class="fw-bold">Registrasi menggunakan NIK (Pribadi) atau NPWP Pusat (Badan Usaha)</p>
                </div>
                <div class="col-lg-4 col-md-6 col-12 text-center">
                    <img src="{{ asset('img/flow/03.png') }}" class="rounded w-25 mb-3" alt="...">
                    <p class="fw-bold">Jika berhasil maka wajib pajak akan mendapatkan email aktivasi untuk melakukan aktivasi</p>
                </div>
                <div class="col-lg-4 col-md-6 col-12 text-center">
                    <img src="{{ asset('img/flow/04.png') }}" class="rounded w-25 mb-3" alt="...">
                    <p class="fw-bold">Jika sudah melakukan aktivasi maka wajib pajak lakukan login untuk memanfaat fasilitas layanan yang ada di pajak online</p>
                </div>
                <div class="col-lg-4 col-md-6 col-12 text-center">
                    <img src="{{ asset('img/flow/05.png') }}" class="rounded w-25 mb-3" alt="...">
                    <p class="fw-bold">Objek pajak yang muncul di pajak online adalah objek pajak yang dalam database BPRD jakarta sudah terisi dengan NIK/NPWP wajib pajak</p>
                </div>
                <div class="col-lg-4 col-md-6 col-12 text-center">
                    <img src="{{ asset('img/flow/06.png') }}" class="rounded w-25 mb-3" alt="...">
                    <p class="fw-bold">Jika objek pajak yang dimiliki oleh wajib pajak tidak muncul silahkan hubungi / email UPPRD atau Samsat terdekat</p>
                </div>
            </div>
        </section>

        <hr class="section-break-1">

        <section id="services" class="p-4 py-5" style="min-height:50vh!important;">
            <h2 class="fw-bold mb-4 text-uppercase text-welcome text-center text-light">Jenis-Jenis Pelayanan</h2>
            <div class="row my-4 gy-4 justify-content-center">
                <div class="col-lg-3 col-md-6 col-12 text-center text-light">
                    <img src="{{ asset('img/services/3.png') }}" class="rounded w-25 mb-3" alt="...">
                    <h4 class="fw-bold">Pendaftaran PBB P2</h4>
                    <p class="fw-bold">Pelayanan pendaftaran PBB Pedesaan dan Perkotaan (PBB-P2) baru dan mutasi (pemecahan dan penggabungan)</p>
                </div>
                <div class="col-lg-3 col-md-6 col-12 text-center text-light">
                    <img src="{{ asset('img/services/5.png') }}" class="rounded w-25 mb-3" alt="...">
                    <h4 class="fw-bold">Pajak Reklame</h4>
                    <p class="fw-bold">Pelayanan Pendaftaran Wajib Pajak Reklame. Penerbitan SKPD, STPD & SKPD tambahan Pajak Reklame</p>
                </div>
                <div class="col-lg-3 col-md-6 col-12 text-center text-light">
                    <img src="{{ asset('img/services/1.png') }}" class="rounded w-25 mb-3" alt="...">
                    <h4 class="fw-bold">Wajib Pajak</h4>
                    <p class="fw-bold">Pendaftaran & Pelaporan Usaha Wajib Pajak Hotel, Restoran, Penerangan Jalan, Sarang Walet & Hiburan</p>
                </div>
                <div class="col-lg-3 col-md-6 col-12 text-center text-light">
                    <img src="{{ asset('img/services/3.png') }}" class="rounded w-25 mb-3" alt="...">
                    <h4 class="fw-bold">Permohonan Keberatan</h4>
                    <p class="fw-bold">Pelayanan Permohonan Penghapusan atau Pengurangan Sanksi Denda (Administratif)</p>
                </div>
                <div class="col-lg-3 col-md-6 col-12 text-center text-light">
                    <img src="{{ asset('img/services/2.png') }}" class="rounded w-25 mb-3" alt="...">
                    <h4 class="fw-bold">Pembayaran SSPD BPHTB</h4>
                    <p class="fw-bold">Pelayanan Pembayaran SSPD BPHTB, Surat Keterangan Bebas BPHTB Verifikasi dan Validasi BPHTB</p>
                </div>
                <div class="col-lg-3 col-md-6 col-12 text-center text-light">
                    <img src="{{ asset('img/services/4.png') }}" class="rounded w-25 mb-3" alt="...">
                    <h4 class="fw-bold">Retribusi Daerah</h4>
                    <p class="fw-bold">Pelayanan Retribusi Daerah (Penerbitan Surat Ketetapan Retribusi Daerah)</p>
                </div>
            </div>
        </section>

        <hr class="section-break-1">

        <section id="payment" class="p-4 py-5 bg-light" style="min-height:30vh!important;">
            <div class="container">    
                <h2 class="fw-bold mb-4 text-uppercase text-welcome text-center">Channel Pembayaran</h2>
                <div class="row gy-4 my-4 align-items-center justify-content-center">
                    <div class="col-lg-3 col-md-6 col-12 text-center">
                        <a href="#!" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <img src="{{ asset('img/payment/bank_kalteng.png') }}" class="rounded w-75 mb-3" alt="...">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 text-center">
                        <a href="#!" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <img src="{{ asset('img/payment/kantor-pos.png') }}" class="rounded w-50 mb-3" alt="...">
                        </a>
                    </div>
                    {{--<div class="col-lg-3 col-md-6 col-12 text-center">
                        <a href="#!" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <img src="{{ asset('img/payment/tokopedia.png') }}" class="rounded w-50 mb-3" alt="...">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 text-center">
                        <a href="#!" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <img src="{{ asset('img/payment/gopay.png') }}" class="rounded w-50 mb-3" alt="...">
                        </a>
                    </div>--}}
                    <div class="col-12 text-center">
                        <span class="text-dark"><i class="bi bi-sticky me-2"></i>Catatan: Klik Pada Gambar yang ada untuk melihat Detail / Cara melakukan Pembayaran</span>
                    </div>

                    <!-- Modal Pembayaran -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
                            <div class="modal-content" style="background: #19234f !important;">
                                <div class="modal-body mb-4">
                                    <div class="row justify-content-between align-items-center m-0 mb-3">
                                        <div class="col-md-6 col-9">
                                            <h4 class="modal-title text-light fw-bold" id="staticBackdropLabel"><i class="bi bi-cash-stack me-2"></i>Cara Pembayaran</h4>
                                        </div>
                                        <div class="col-md-6 col-3 text-end">
                                            <button type="button" style="background: #19234f !important;" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle fa-2x"></i></button>
                                        </div>
                                    </div>
                                    <hr class="bg-secondary">
                                    <div class="row gy-3 mt-2 align-items-center rounded px-3">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12 mb-3 text-light">
                                                    <img src="{{ asset('img/payment/bank_kalteng.png') }}" class="rounded w-25 bg-light p-3 mb-3" alt="...">
                                                </div>
                                                <div class="col-lg-12 text-light">
                                                    <h4 class="mb-3 fw-bold"><i class="bi bi-check2-square me-2"></i>Cara Melakukan Pembayaran</h4>
                                                    <p class="fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, quisquam.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr class="section-break-1">

        <section id="download" class="p-4 bg-light" style="min-height:50vh!important;">
            <div class="container">
                <h2 class="fw-bold text-uppercase text-welcome"><i class="bi bi-info-circle me-3"></i>Informasi Lainnya</h2>
                <hr class="bg-secondary">
                <div class="row gy-4 my-3">
                    <div class="col-lg-7 col-md-8 col-12">
                        <h3 class="fw-bold mb-4 text-uppercase text-welcome"><i class="bi bi-globe me-3"></i>Portal Lainnya</h3>
                        <div class="row align-items-center gy-2">
                            <div class="col-6 p-2" >
                                <img src="{{ asset('img/portal/lapor.png') }}" class="rounded w-100" style="height:90px!important;" alt="...">
                            </div>
                            <div class="col-6 p-2">
                                <img src="{{ asset('img/portal/ppid.png') }}" class="rounded w-100" style="height:90px!important;" alt="...">
                            </div>
                            <div class="col-6 p-2">
                                <img src="{{ asset('img/portal/webmail.png') }}" class="bg-primary rounded w-100" style="height:90px!important;" alt="...">
                            </div>
                            <div class="col-6 p-2">
                                <img src="{{ asset('img/portal/simaya.png') }}" class="rounded w-100" style="height:90px!important;" alt="...">
                            </div>
                            <div class="col-6 p-2">
                                <img src="{{ asset('img/portal/portal_katingan.jpeg') }}" class="rounded w-100" style="height:90px!important;" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-4 col-12">
                        <h3 class="fw-bold mb-4 text-uppercase text-welcome"><i class="bi bi-download me-3"></i>Unduhan</h3>
                        <div class="row">
                            <div class="col-12 px-4">
                                <p>
                                    <a href="#!" class="text-decoration-none fw-bold"><i class="bi bi-file-earmark-text me-2"></i>Jumlah Tower Telekomunikasi Berdasarkan Kecamatan Tahun 2017</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-decoration-none fw-bold"><i class="bi bi-file-earmark-text me-2"></i>Edaran Bupati Katingan Nomor: 800/765/BKPP-2/2021 Tentang PELAKSANAAN APEL PAGI</a>
                                </p>
                                <p class="mt-4">
                                    <a href="{{ route('download') }}" class="text-decoration-none rounded px-3 py-2 bg-primary fw-bold text-light"><i class="bi bi-link-45deg me-2"></i>Unduhan Lainnya</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr class="section-break-1">

        <section id="faq" class="p-4 py-5 bg-light" style="min-height:30vh!important;">
            <h3 class="fw-bold mb-2 text-uppercase text-welcome text-center">- F.A.Q -</h3>
            <h2 class="fw-bold mb-4 text-uppercase text-welcome text-center">Pertanyaan yang sering ditanyakan</h2>
            <div class="row my-4">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="border-0 mb-2 accordion-item rounded">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <i class="bi bi-question-circle me-2 text-primary"></i>Accordion Item #1
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                            </div>
                        </div>
                        <div class="border-0 mb-2 accordion-item rounded">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    <i class="bi bi-question-circle me-2 text-primary"></i>Accordion Item #2
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                            </div>
                        </div>
                        <div class="border-0 mb-2 accordion-item rounded">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    <i class="bi bi-question-circle me-2 text-primary"></i>Accordion Item #3
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="accordion accordion-flush" id="accordionFlushExample2">
                        <div class="border-0 mb-2 accordion-item rounded">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                    <i class="bi bi-question-circle me-2 text-primary"></i>Accordion Item #1
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                            </div>
                        </div>
                        <div class="border-0 mb-2 accordion-item rounded">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                    <i class="bi bi-question-circle me-2 text-primary"></i>Accordion Item #2
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                            </div>
                        </div>
                        <div class="border-0 mb-2 accordion-item rounded">
                            <h2 class="accordion-header" id="flush-headingSix">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                    <i class="bi bi-question-circle me-2 text-primary"></i>Accordion Item #3
                                </button>
                            </h2>
                            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr class="section-break-1">
    </div>
@endsection

@push('bottomscript')
    <script>
        AOS.init();
    </script>
@endpush

