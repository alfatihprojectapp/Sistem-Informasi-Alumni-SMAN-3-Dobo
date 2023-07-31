<div>
    @php
        $openRegister = \App\Models\TahunPendaftaran::where('is_actived', 1)->count();
    @endphp

    <title>Beranda - SMA Negeri 8 Buru</title>

    <section id="hero" style="height: 85vh;">

        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
                    data-aos="fade-up">
                    <div>
                        <h2 class="text-light">
                            <br>PENDAFTARAN PESERTA DIDIK BARU
                            <br>
                            <br> SMA NEGERI 8 BURU
                        </h2>
                        <p style="margin-top: -30px;" class="text-light">Jl. Baru, Desa Waplau, Kec. Waplau, Kab. Buru,
                            Prov. Maluku</p>

                        @if ($openRegister)
                            @if (auth()->check())
                                <div class="alert alert-primary" role="alert">
                                    <i class="bi bi-person-check-fill" style="font-size: 15pt;"></i> Akun terverifikasi
                                </div>
                            @else
                                <a href="/registrasi" class="btn-get-started scrollto">
                                    <i class="bi bi-person-check-fill" style="font-size: 15pt;"></i> Registrasi Akun
                                </a>
                            @endif
                        @else
                            {{-- <div class="alert alert-info text-warning"> <i class="nav-icon bi bi-info-circle"></div> --}}
                            <span class="text-warning">
                                <i class="nav-icon bi bi-info-circle"></i> Pendaftaran belum dibuka
                            </span>
                        @endif

                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src="/assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <main id="main">
        {{-- curiculum vitae --}}
        {{-- <section id="curiculum-vitae" class="team">
            <div class="container">

                <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Curriculum Vitae</h2>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <hr style="width: 30%;margin-top: -10px;" class="text-center">
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="member" data-aos="fade-up" data-aos-duration="1000">
                            <div class="pic">
                                <img src="/assets/img/my-photo.jpg" class="img-fluid img-thumbnail"
                                    style="border-radius: 10px;-webkit-filter: brightness(75%);" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Abdul Sasri LAedi, Amd. Kom</h4>
                                <span>Website Developer</span>
                                <div class="social">
                                    <a href="/curiculum-vitae" class="button"
                                        style="font-size: 7pt; padding: 9px 14px;">Lihat
                                        Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section> --}}
    </main>
</div>
