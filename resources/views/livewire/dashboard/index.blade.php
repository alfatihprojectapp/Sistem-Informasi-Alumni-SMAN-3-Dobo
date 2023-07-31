<div>
    <?php include 'function/time.php'; ?>

    <title>Dashboard - SMA Negeri 8 Buru</title>

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

                @can('admin')
                    <div class="row">
                        <div class="col-md-4">
                            <?php include 'function/jam-analog.php'; ?>
                        </div>
                        <div class="col-md-8">
                            <style>
                                .datepicker,
                                .table-condensed {
                                    width: 100%;
                                    height: 200px;
                                    line-height: 30px;
                                    font-size: 10pt;
                                }
                            </style>
                            <div id="datepicker" class="datepicker" size="30">
                                <span class="add-on">
                                    <i class="icon-th"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Jumlah pendaftaran siswa masing-masing jurusan</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="bi bi-dash-lg"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($jurusan as $data)
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <a href="/dashboard/laporan" class="text-decoration-none">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-primary elevation-1"><i
                                                        class="bi bi-people"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-dark">{{ $data->nama_jurusan }}</span>
                                                    <span class="info-box-number text-secondary">
                                                        @php
                                                            $siswa = \App\Models\Siswa::where('id_jurusan', $data->id_jurusan)->count();
                                                        @endphp
                                                        <small>{{ $siswa }} Orang</small>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endcan

                @can('siswa')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-0 pt-0">
                                <div class="card-header">
                                    <h5 class="card-title">Informasi terbaru</h5>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="bi bi-dash-lg"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($informasi as $data)
                                            <div class="col-md-6">
                                                <p class="card-text">
                                                    {!! $data->isi_informasi !!}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan

                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 pt-0">
                            <div class="card-header">
                                <h5 class="card-title">Waktu & Kalender {{ $tahun }}</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="bi bi-dash-lg"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-8">
                                        <style>
                                            .datepicker,
                                            .table-condensed {
                                                width: 100%;
                                                height: 400px;
                                                line-height: 50px;
                                                font-size: 12pt;
                                            }
                                        </style>
                                        <div id="datepicker" class="datepicker mb-5" size="30">
                                            <span class="add-on">
                                                <i class="icon-th"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <?php include 'function/jam-analog.php'; ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </section>

    </div>

</div>

<script>
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>
