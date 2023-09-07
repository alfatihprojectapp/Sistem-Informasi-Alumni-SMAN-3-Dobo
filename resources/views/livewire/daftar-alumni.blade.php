<div>
    <title>Sistem Informasi Alumni | SMA Negeri 3 Dobo - Daftar Alumni</title>

    <main id="main">

        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Beranda</a></li>
                    <li>Daftar Alumni</li>
                </ol>
                <h2>Daftar Alumni</h2>

            </div>
        </section>

        <section wire:ignore.self id="portfolio-details" class="portfolio-details" data-aos="fade-up"
            data-aos-duration="1000">
            <div class="container">

                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <select class="form-select sm w-auto" wire:model="paginate">
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="col">
                                <div wire:ignore.self>
                                    <div class="input-group mb-3">
                                        <input wire:model="search_nama" type="text" placeholder="Cari"
                                            class="form-control sm">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="bi bi-search"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div wire:ignore>
                                    <select class="form-select d-inline sm" wire:model="search" id="search">
                                        <option value="">-- Pilih Tahun Angkatan --</option>
                                        @foreach ($dataTahun as $data)
                                            <option value="{{ $data->id_tahun }}">{{ $data->tahun }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if ($alumni->count())
                            <div class="table-responsive" style="height: 50vh; overflow: scroll;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle;text-align: center;">#</th>
                                            <th style="vertical-align: middle;">Nama</th>
                                            <th style="vertical-align: middle;">Jenis Kelamin</th>
                                            <th style="vertical-align: middle;">Pekerjaan</th>
                                            <th style="vertical-align: middle;text-align: center;">Tahun Angkatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alumni as $data)
                                            <tr>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    {{ $loop->iteration }}</td>
                                                <td style="vertical-align: middle;">{{ $data->nama }}</td>
                                                <td style="vertical-align: middle;">{{ $data->jenis_kelamin }}</td>
                                                <td style="vertical-align: middle;">{{ $data->pekerjaan }}</td>
                                                <td style="vertical-align: middle;text-align: center;">{{ $data->tahun->tahun }}</td>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end">{{ $alumni->links() }}</div>
                        @else
                            <hr>
                            <p class="text-center text-secondary mt-5">Data tidak ditemukan !</p>
                        @endif
                    </div>
                </div>

            </div>
        </section>
    </main>

</div>
