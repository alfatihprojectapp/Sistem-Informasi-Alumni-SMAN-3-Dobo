<div>
    @php
        $openRegister = \App\Models\TahunPendaftaran::where('is_actived', 1)->count();
    @endphp

    <title>Sistem Informasi Alumni | SMA Negeri 3 Dobo - Beranda</title>

    {{-- <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="text-center">SISTEM INFORMASI ALUMNI <br>SMA NEGERI 3 DOBO</h1>
            <h2 class="text-center" style="font-size: 12pt;">Alamat : </h2>
        </div>
    </section> --}}

    <section id="hero">
        <div id="carouselExampleCaptions"class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner border-danger" style="border-top: 2px solid;">
                <div class="carousel-item active">
                    <img src="/assets/img/bg.jpg" class="img-fluid d-block w-100" style="filter: brightness(100%)">
                </div>
                <div class="carousel-caption" style="margin-bottom: -55px;">
                    <marquee direction="up" scrollamount="2" align="center" behavior="alternate" width="">
                        <marquee direction="left">
                            <H3><strong>SELAMAT DATANG DI WEBSITE INFORMASI ALUMNI SMA NEGERI 3 DOBO. </strong> <span style="font-size: 11pt;">Alamat : Jln. Cendrawasih RT 005 RW 005 Kelurahan Siwalima Kecamatan Pulau-Pulau Aru Kabupaten Kepulauan Aru Provinsi Maluku. Kode Pos : 97662</span> </H3>
                        </marquee>
                    </marquee>
                    </center>
                </div>
            </div>
            <button class="carousel-control-prev d-none justify-content-start" type="button"
                data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" style="">
                <span class="bg-danger p-1" aria-hidden="true">
                    <i class="bi bi-chevron-left"></i></span>
                </span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next d-none justify-content-end" type="button"
                data-bs-target="#carouselExampleCaptions" data-bs-slide="next" style="">
                <span class="bg-danger p-1" aria-hidden="false">
                    <i class="bi bi-chevron-right"></i></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <main id="main" style="margin-top: ">
        <section id="curiculum-vitae" class="team">
            <div class="container">

                <style>
                    .info-box.info-box-sm {
                        min-height: 45px;
                        margin-bottom: 15px;
                        font-size: 15px;
                        display: inline-flex;
                    }

                    .info-box.info-box-sm small {
                        font-size: 12px;
                    }

                    .info-box.info-box-sm .info-box-icon {
                        height: 60px;
                        width: 52px;
                        font-size: 27px;
                        line-height: 52px;
                        background-color: rgb(47, 160, 252);
                    }

                    .info-box.info-box-sm .info-box-content {
                        margin-left: 10px;
                        height: 60px;
                    }

                    .info-box .info-box-content .info-box-text {
                        font-size: 12pt !important;
                    }

                    .info-box .info-box-content .info-box-number {
                        font-size: 14pt !important;
                    }

                    .info-box.info-box-sm.dropdown {
                        float: left;
                    }

                    .info-box.info-box-sm.dropdown .info-box-icon {
                        /* background: blue; */
                        display: inline-flex;
                    }

                    .info-box.info-box-sm.dropdown .info-box-content {
                        width: 70%;
                        /* background: red; */
                        float: left;
                    }

                    .info-box.info-box-sm.dropdown .info-box-dropdown {
                        float: right;
                        /* background: blue; */
                    }
                </style>

                <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                    <h3>Statistik Alumni Keseluruhan</h3>
                    <div class="row" data-aos="fade-up" data-aos-duration="1000">
                        <div class="col-md-12 d-flex justify-content-center">
                            <hr style="width: 80%;margin-top: -3px;" class="text-center">
                        </div>
                    </div>
                </div>

                <div class="row" data-aos="fade-up" data-aos-duration="1000"">
                    <div class="col-md-4">
                        <div class="row" style="">
                            <div class="col-md-12">
                                <div class="info-box info-box-sm dropdown"
                                    style="width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                    <div class="info-box-icon d-flex justify-content-center align-items-center"
                                        style="border-radius: 5px;">
                                        <i class="bi bi-people text-light"></i>
                                    </div>

                                    <div class="info-box-content">
                                        <div class="info-box-text">Jumlah Alumni</div>
                                    </div>

                                    <div class="info-box-dropdown">
                                        <h1>{{ $alumni->count() }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-box info-box-sm dropdown"
                                    style="width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                    <div class="info-box-icon d-flex justify-content-center align-items-center"
                                        style="border-radius: 5px;">
                                        <i class="bi bi-person text-light"></i>
                                    </div>

                                    <div class="info-box-content">
                                        <div class="info-box-text">Jumlah Alumni Laki-Laki</div>
                                    </div>

                                    <div class="info-box-dropdown">
                                        <h1>{{ $alumni->where('jenis_kelamin', 'Laki-Laki')->count() }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-box info-box-sm dropdown"
                                    style="width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                    <div class="info-box-icon d-flex justify-content-center align-items-center"
                                        style="border-radius: 5px;">
                                        <i class="bi bi-person text-light"></i>
                                    </div>

                                    <div class="info-box-content">
                                        <div class="info-box-text">Jumlah Alumni Perempuan</div>
                                    </div>

                                    <div class="info-box-dropdown">
                                        <h1>{{ $alumni->where('jenis_kelamin', 'Perempuan')->count() }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                @if ($alumni->count() > 0)
                                    <div class="chart-container" style="width: 100%;">
                                        <canvas id="statistikAlumni"></canvas>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-title mt-5" data-aos="fade-up" data-aos-duration="1000">
                    <h3>Statistik Alumni per Angkatan</h3>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <hr style="width: 80%;margin-top: -3px;" class="text-center">
                        </div>
                    </div>
                </div>

                <div class="row" data-aos="fade-up" data-aos-duration="1000"">
                    @if ($dataTahun->count() > 0)
                        @foreach ($dataTahun as $data)
                            <div class="col-md-4">
                                <h5 class="text-center">Statistik Alumni Tahun {{ $data->tahun }}</h5>
                                <hr>
                                <div class="info-box info-box-sm dropdown"
                                    style="height: 30px; width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                    <div class="info-box-icon d-flex justify-content-center align-items-center"
                                        style="border-radius: 5px;height: 30px">
                                        <i class="bi bi-people text-light"></i>
                                    </div>

                                    <div class="info-box-content" style="height: 30px">
                                        <div class="info-box-text">Total Alumni</div>
                                    </div>

                                    <div class="info-box-dropdown">
                                        <h6>{{ $alumni->where('id_tahun', $data->id_tahun)->count() }}</h6>
                                    </div>
                                </div>
                                <div class="info-box info-box-sm dropdown"
                                    style="height: 30px; width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                    <div class="info-box-icon d-flex justify-content-center align-items-center"
                                        style="border-radius: 5px;height: 30px">
                                        <i class="bi bi-person text-light"></i>
                                    </div>

                                    <div class="info-box-content" style="height: 30px">
                                        <div class="info-box-text">Jumlah Alumni Laki-Laki</div>
                                    </div>

                                    <div class="info-box-dropdown">
                                        <h6>{{ $alumni->where('id_tahun', $data->id_tahun)->where('jenis_kelamin', 'Laki-Laki')->count() }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="info-box info-box-sm dropdown"
                                    style="height: 30px; width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                    <div class="info-box-icon d-flex justify-content-center align-items-center"
                                        style="border-radius: 5px;height: 30px">
                                        <i class="bi bi-person text-light"></i>
                                    </div>

                                    <div class="info-box-content" style="height: 30px">
                                        <div class="info-box-text">Jumlah Alumni Perempuan</div>
                                    </div>

                                    <div class="info-box-dropdown">
                                        <h6>{{ $alumni->where('id_tahun', $data->id_tahun)->where('jenis_kelamin', 'Perempuan')->count() }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="chart-container" style="width: 100%;">
                                    <canvas id="AlumniTahun{{ $data->id_tahun }}"></canvas>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </section>
    </main>

    {{-- chart --}}
    <script src="/vendor/chart/chart.js"></script>

    <script>
        const statistikAlumni = document.getElementById('statistikAlumni');

        const dataStatistikAlumni = {
            labels: [
                'Laki-Laki',
                'Perempuan',
            ],
            datasets: [{
                label: 'Jumlah Alumni ',
                data: [
                    '{{ $alumni->where('jenis_kelamin', 'Laki-Laki')->count() }}',
                    '{{ $alumni->where('jenis_kelamin', 'Perempuan')->count() }}',
                ],
                backgroundColor: [
                    @for ($i = 0; $i < 2; $i++)
                        '#{{ substr(md5(mt_rand()), 0, 6) }}',
                    @endfor
                ],
                hoverOffset: 4
            }],

            borderWidth: 1
        }

        new Chart(statistikAlumni, {
            // type: 'bar',
            type: 'doughnut',
            // type: 'pie',
            data: dataStatistikAlumni,
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        @foreach ($dataTahun as $data)
            const newChart{{ $data->id_tahun }} = document.getElementById('AlumniTahun' + {{ $data->id_tahun }});

            const data{{ $data->id_tahun }} = {
                labels: [
                    'Laki-Laki',
                    'Perempuan',
                ],
                datasets: [{
                    label: 'Jumlah Alumni ',
                    data: [
                        '{{ $alumni->where('id_tahun', $data->id_tahun)->where('jenis_kelamin', 'Laki-Laki')->count() }}',
                        '{{ $alumni->where('id_tahun', $data->id_tahun)->where('jenis_kelamin', 'Perempuan')->count() }}',
                    ],
                    backgroundColor: [
                        @for ($i = 0; $i < 2; $i++)
                            '#{{ substr(md5(mt_rand()), 0, 6) }}',
                        @endfor
                    ],
                    hoverOffset: 4
                }]
            }

            new Chart(newChart{{ $data->id_tahun }}, {
                type: 'pie',
                data: data{{ $data->id_tahun }},
                options: {
                    animations: {
                        tension: {
                            duration: 1000,
                            easing: 'linear',
                            from: 1,
                            to: 0,
                            loop: true
                        }
                    },
                    scales: {
                        y: {
                            min: 0,
                            max: 100
                        },
                        x: {
                            min: 0,
                            max: 100
                        }
                    }
                }
            });
        @endforeach
    </script>
</div>
