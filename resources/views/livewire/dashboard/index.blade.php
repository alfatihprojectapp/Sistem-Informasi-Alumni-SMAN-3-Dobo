<div>
    <?php include 'function/time.php'; ?>

    <title>{{ $title }}</title>

    @if (session()->has('message'))
        <script>
            let timerInterval
            Swal.fire({
                title: 'Selamat Datang !',
                html: 'Silahkan tunggu beberapa detik',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then(() => {
                // location.reload();
            })
        </script>
    @endif

    <div class="content-wrapper">
        <!-- title page -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">{!! $icon !!} {{ $title_page }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- continer -->
        <section class="content">
            <div class="container-fluid">

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

                <div class="card">
                    <div class="card-header">
                        Statistik Keseluruhan Alumni SMA Negeri 3 Dobo
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="bi bi-x-lg text-secondary"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
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
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        Statistik Alumni per Angkatan SMA Negeri 3 Dobo
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="bi bi-x-lg text-secondary"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
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
                </div>

            </div>
        </section>

    </div>


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
