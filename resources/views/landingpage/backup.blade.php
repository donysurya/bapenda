        <!-- Home v1 -->
        <section id="home" class="p-0" style="min-height:90vh!important;">

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('img/home.webp')}}" class="d-block w-100" alt="Slider">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/home.webp')}}" class="d-block w-100" alt="Slider">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="row align-items-center gy-4 mb-4 mt-0 m-4">
                <div class="col-lg-6 col-12 text-light">
                    <h1 class="mb-0 text-welcome">Selamat Datang</h1>
                    <h3 class="mb-3 text-welcome">di Portal Resmi</h3>
                    <h1 class="mb-3 text-welcome display-5">Badan Pendapatan Daerah (Bapenda)</h1>
                    <h4 class="mb-0 text-welcome">Kabupaten Katingan</h4>
                    <h4 class="mb-0 text-welcome">Provinsi Kalimantan Tengah</h4>
                    <div class="d-flex mt-4">
                        <a href="#about" class="text-decoration-none btn-news2 text-center m-1"><i class="bi bi-info-circle me-2"></i>Bapenda</a>
                        <a href="#news" class="text-decoration-none btn-news2 text-center m-1"><i class="bi bi-newspaper me-2"></i>Berita</a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 d-flex justify-content-end">
                    <img src="{{asset('img/tax.png')}}" alt="Tax Illustration" class="d-lg-block d-md-none d-none w-100">
                </div>
            </div>

        </section>

        <!-- Home v2 -->
        <section id="home" class="p-4" style="min-height:50vh!important;">
            <div class="row align-items-center gy-4 mb-4 mt-0">
                <div class="col-lg-6 col-12 text-light" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" data-aos-duration="1500">
                    <h1 class="mb-0 text-welcome">Selamat Datang</h1>
                    <h3 class="mb-3 text-welcome">di Portal Resmi</h3>
                    <h1 class="mb-3 text-welcome display-5">Badan Pendapatan Daerah (Bapenda)</h1>
                    <h4 class="mb-0 text-welcome">Kabupaten Katingan</h4>
                    <h4 class="mb-0 text-welcome">Provinsi Kalimantan Tengah</h4>
                    <div class="d-flex mt-4">
                        <a href="#about" class="text-decoration-none btn-news2 text-center m-1"><i class="bi bi-info-circle me-2"></i>Bapenda</a>
                        <a href="#news" class="text-decoration-none btn-news2 text-center m-1"><i class="bi bi-newspaper me-2"></i>Berita</a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 d-flex justify-content-end">
                    <img src="{{asset('img/tax.png')}}" alt="Tax Illustration" class="d-lg-block d-md-none d-none w-100">
                </div>
            </div>

            <div class="row justify-content-center border-top border-light" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1500">
                <div class="col-lg-10 col-md-12 col-12 text-center text-light mt-4">
                    <p class="fw-bold mb-2 text-uppercase text-welcome">Informasi Perpajakan?</p>
                    <p class="mb-0 text-welcome">Cari tahu tentang Jenis-jenis pelayanan silahkan klik <a href="{{route('home')}}#services" class="text-white">disini</a>!</p>
                </div>
            </div>
        </section>