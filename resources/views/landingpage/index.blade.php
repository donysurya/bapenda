@extends('landingpage.main')

@section('title', 'Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/home.css?v3') }}" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @if(is_null($bg))
        <style>
            .main::before {
                background-image: url('/img/home.webp');
                opacity: 0.5;
            }
        </style>
    @else
        <style>
            .main::before {
                background-image: url('{{Storage::url($bg->image)}}');
                opacity: 0.5;
            }
        </style>
    @endif
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
                    <a href="{{ route('about.visi_misi') }}" class="mt-2 text-decoration-none btn btn-outline-danger fw-bold text-center px-4 py-2" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1300"><i class="bi bi-info-circle me-2"></i>Detail Bapenda</a>
                </div>
            </div>
        </section>

        <hr class="section-break-1">

        <section id="news" class="px-4 bg-light py-5" style="min-height:50vh!important;">
            <h2 class="fw-bold mb-4 text-uppercase text-welcome text-center"><i class="bi bi-newspaper me-3"></i>Berita Bapenda</h2>
            <div class="row gy-4 mt-4 mb-3 align-items-center px-lg-4 px-md-2 px-2 justify-content-center">
                @forelse($post as $index => $item)
                    <div class="col-xl-4 col-md-3 col-11">
                        <div class="card shadow" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                            <div class="card-img-top p-3 pb-0">
                                <span class="badge bg-primary mb-2">{{$item->category->name}}</span>
                                <img src="{{Storage::url($item->image)}}" class="w-100" alt="{{$item->title}}">
                            </div>
                            <div class="card-body">
                                <span class="badge bg-info mb-3">
                                    {{ $item->created_at->format('l, d M Y') }}
                                </span>
                                <h6 class="card-title">
                                    <a href="{{route('news.show', ['slug' => $item->slug])}}" class="text-decoration-none fw-bold">{{ $item->title }}</a>
                                </h6>
                                {!! Str::limit( strip_tags( $item->abstract ), 140 ) !!}
                            </div>
                        </div>
                    </div>
                @empty
                    -
                @endforelse
            </div>
            <p class="mt-5 text-center">
                <a href="{{ route('news.index') }}" class="text-decoration-none btn btn-outline-danger shadow fw-bold text-center px-4 py-2"><i class="bi bi-newspaper me-2"></i>Berita Lainnya</a>
            </p>
        </section>

        <section id="search" class="py-4" style="background:linear-gradient(to right, #d12219, #e88898);">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-12 px-4">
                    <form action="{{route('news.index')}}">
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
                                @if(is_null($video))
                                    <object data="https://www.youtube.com/embed/6Av2zH4jN_0?autoplay=1" class="w-100" height="350" title="YouTube video player"></object>
                                @else
                                    <object data="{{$video->link}}" class="w-100" height="350" title="YouTube video player"></object>
                                @endif
                            </div>
                            <p class="mt-3">
                                <a href="{{ route('video') }}" class="text-decoration-none rounded px-3 py-2 bg-info fw-bold text-white"><i class="bi bi-box-arrow-up-right me-2"></i>Video Lainnya</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <h3 class="fw-bold mb-4 text-uppercase text-welcome"><i class="bi bi-images me-3"></i>Infografis</h3>
                        <div class="row">
                            @forelse($infografis as $index => $item)
                                <div class="col-6 p-2">
                                    <img src="{{Storage::url($item->image)}}" class="rounded w-100" alt="{{$item->name}}">
                                </div>
                            @empty
                                <div class="col-6 p-2">
                                    <img src="{{ asset('img/infografis/1.webp') }}" class="rounded w-100" alt="...">
                                </div>
                                <div class="col-6 p-2">
                                    <img src="{{ asset('img/infografis/1.webp') }}" class="rounded w-100" alt="...">
                                </div>
                                <div class="col-6 p-2">
                                    <img src="{{ asset('img/infografis/1.webp') }}" class="rounded w-100" alt="...">
                                </div>
                                <div class="col-6 p-2">
                                    <img src="{{ asset('img/infografis/1.webp') }}" class="rounded w-100" alt="...">
                                </div>
                            @endforelse
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
            <div class="row my-4 justify-content-center">
                @forelse($flow as $index => $item)
                    <div class="col-lg-3 col-md-6 col-12 text-center text-dark">
                        <img src="{{Storage::url($item->image)}}" class="rounded w-25 mb-3" alt="{{$item->name}}">
                        <h4 class="fw-bold">{{$item->name}}</h4>
                        {!!$item->description!!}
                    </div>
                @empty
                    <div class="col-md-10">
                        <img src="{{asset('img/flow.png')}}" alt="Alur Proses Bapenda" class="w-100">
                    </div>
                @endforelse
            </div>
        </section>

        <hr class="section-break-1">

        <section id="services" class="p-4 py-5" style="min-height:50vh!important;">
            <h2 class="fw-bold mb-4 text-uppercase text-welcome text-center text-light">Jenis-Jenis Pelayanan</h2>
            <div class="row my-4 gy-4 justify-content-center">
                @forelse($service as $index => $item)
                    <div class="col-lg-3 col-md-6 col-12 text-center text-light">
                        <img src="{{Storage::url($item->image)}}" class="rounded w-25 mb-3" alt="{{$item->name}}">
                        <h4 class="fw-bold">{{$item->name}}</h4>
                        {!!$item->description!!}
                    </div>
                @empty
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
                @endforelse
            </div>
        </section>

        <hr class="section-break-1">

        <section id="payment" class="p-4 py-5 bg-light" style="min-height:30vh!important;">
            <div class="container">    
                <h2 class="fw-bold mb-4 text-uppercase text-welcome text-center">Channel Pembayaran</h2>
                <div class="row gy-4 my-4 align-items-center justify-content-center">
                    @forelse($payment as $index => $item)
                        <div class="col-lg-3 col-md-6 col-12 text-center">
                            <a href="#!" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <img src="{{Storage::url($item->image)}}" class="rounded w-50 mb-3" alt="{{$item->name}}">
                            </a>
                        </div>
                    @empty
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
                    @endforelse
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
                            @forelse($portal as $index => $item)
                                <div class="col-6 p-2">
                                    <a href="{{$item->link}}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{Storage::url($item->image)}}" class="rounded w-100" style="height:90px!important;" alt="{{$item->name}}">
                                    </a>
                                </div>
                            @empty
                                <div class="col-6 p-2">
                                    <a href="https://portal.katingankab.go.id/" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ asset('img/portal/portal_katingan.webp') }}" class="rounded w-100" style="height:90px!important;" alt="...">
                                    </a>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-4 col-12">
                        <h3 class="fw-bold mb-4 text-uppercase text-welcome"><i class="bi bi-download me-3"></i>Unduhan</h3>
                        <div class="row">
                            <div class="col-12 px-4">
                                @forelse($publication as $index => $item)
                                    <p>
                                        <a href="{{Storage::url($item->file)}}" class="text-decoration-none fw-bold" target="_blank" rel="noopener noreferrer"><i class="bi bi-file-earmark-text me-2"></i>{{$item->name}}</a>
                                    </p>
                                @empty
                                    -
                                @endforelse
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
            <div class="row my-4 justify-content-center">
                <div class="col-lg-8 col-md-10 col-12">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @forelse($faq as $index => $item)
                            <div class="border-0 mb-2 accordion-item rounded">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{$item->id}}" aria-expanded="false" aria-controls="flush-{{$item->id}}">
                                        <i class="bi bi-question-circle me-2 text-primary"></i>{{$item->title}}
                                    </button>
                                </h2>
                                <div id="flush-{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$item->id}}" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">{{$item->content}}</div>
                                </div>
                            </div>
                        @empty
                            -
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

        {{--<hr class="section-break-1">

        <section id="faq" class="p-4 py-5 bg-light">
            <h3 class="fw-bold mb-2 text-uppercase text-welcome text-center">- Statistik -</h3>
            <h2 class="fw-bold mb-4 text-uppercase text-welcome text-center">Jumlah Pengunjung</h2>
            <div class="row my-4 gy-4 justify-content-center">
                <div class="col-lg-2 col-md-3 col-4 text-center text-dark">
                    <i class="bi bi-calendar2-check fa-2x mb-3"></i>
                    <p class="fw-bold mb-1">Hari ini</p>
                    <h4 class="fw-bold">20 Orang</h4>
                </div>
                <div class="col-lg-2 col-md-3 col-4 text-center text-dark">
                    <i class="bi bi-calendar2-x fa-2x mb-3"></i>
                    <p class="fw-bold mb-1">Kemarin</p>
                    <h4 class="fw-bold">20 Orang</h4>
                </div>
                <div class="col-lg-2 col-md-3 col-4 text-center text-dark">
                    <i class="bi bi-calendar2-week fa-2x mb-3"></i>
                    <p class="fw-bold mb-1">Minggu ini</p>
                    <h4 class="fw-bold">20 Orang</h4>
                </div>
                <div class="col-lg-2 col-md-3 col-4 text-center text-dark">
                    <i class="bi bi-calendar2-month fa-2x mb-3"></i>
                    <p class="fw-bold mb-1">Bulan ini</p>
                    <h4 class="fw-bold">20 Orang</h4>
                </div>
                <div class="col-lg-2 col-md-3 col-4 text-center text-dark">
                    <i class="bi bi-calendar3 fa-2x mb-3"></i>
                    <p class="fw-bold mb-1">Total</p>
                    <h4 class="fw-bold">20 Orang</h4>
                </div>
            </div>
        </section>--}}

        <hr class="section-break-1">
    </div>
@endsection

@push('bottomscript')
    <script>
        AOS.init();
    </script>
@endpush

