<div>

    <title>{{ $title }} | Dashboard - SMA Negeri 8 Buru</title>

    <div class="content-wrapper">
        <!-- title page -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">{!! $icon !!} {{ $title_page }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- continer -->
        <section class="content">
            <div class="container-fluid">

                @if ($showLivewireShow)
                    @livewire('dashboard.laporan.show', ['siswa' => $getSiswa])
                    <script>
                        $(document).ready(function() {
                            $('#showModal').modal('show');
                        });
                    </script>
                @endif
                @if ($showLivewirePilihTahun)
                    @livewire('dashboard.laporan.pilih-tahun', ['jurusan' => $getJurusan])
                    <script>
                        $(document).ready(function() {
                            $('#pilihTahunCetakModal').modal('show');
                        });
                    </script>
                @endif
                @if ($showLivewireDelete)
                    @livewire('dashboard.laporan.delete', ['siswa' => $getSiswa])
                    <script>
                        $(document).ready(function() {
                            $('#deleteModal').modal('show');
                        });
                    </script>
                @endif
                <script>
                    $(document).on('click', '#closeModal', function() {
                        Livewire.emit('closeLivewire');
                    });
                </script>

                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <select class="form-select sm w-auto d-inline mb-3" wire:model="paginate">
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <div class="dropdown d-inline">
                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-printer"></i> Cetak
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        @foreach ($jurusan as $data)
                                            <li>
                                                <a type="button" wire:click="cetakJurusan({{ $data->id_jurusan }})"
                                                    class="dropdown-item">{{ 'Siswa Jurusan ' . $data->nama_jurusan }}
                                                    <span  wire:loading wire:target="cetakJurusan({{ $data->id_jurusan }})" class="spinner-border spinner-border-sm text-primary"
                                                        role="status" aria-hidden="true">
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input wire:model="search" type="text" placeholder="Cari" class="form-control">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
                                </div>
                            </div>
                        </div>
                        @if ($siswa->count())
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle;">#</th>
                                            <th style="vertical-align: middle;">NISN</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Jurusan</th>
                                            <th>Tanggal Pendaftaran</th>
                                            <th style="width: 150px;vertical-align: middle;text-align: center;">Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $data)
                                            <tr>
                                                <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                                <td style="vertical-align: middle;">{{ $data->nisn }}</td>
                                                <td style="vertical-align: middle;">{{ strtoupper($data->nama) }}</td>
                                                <td style="vertical-align: middle;">
                                                    <a href="mailto:{{ $data->user->email }}" target="blank"
                                                        class="text-decoration-none">{{ $data->user->email }}</a>
                                                </td>
                                                <td style="vertical-align: middle;">{{ $data->jurusan->nama_jurusan }}
                                                </td>
                                                <td style="vertical-align: middle;">{{ $data->created_at }} <small
                                                        class="text-secondary d-block">{{ $data->created_at->diffForHumans() }}</small>
                                                </td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    <a type="button" wire:click="show({{ $data->id_siswa }})"
                                                        class="badge bg-success mb-1 text-decoration-none py-2"
                                                        style="width: 100px;">
                                                        <span wire:loading.remove wire:target="show">
                                                            Lihat Detail
                                                        </span>
                                                        <span wire:loading wire:target="show({{ $data->id_siswa }})"
                                                            class="spinner-border spinner-border-sm text-light"
                                                            role="status" aria-hidden="true"
                                                            style="width: 11px; height: 11px;"></span>
                                                    </a>

                                                    <button class="badge bg-danger mb-1 border-0 py-2"
                                                        wire:click="delete({{ $data->id_siswa }})"
                                                        ata-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Hapus">
                                                        <span wire:loading.remove
                                                            wire:target="delete({{ $data->id_siswa }})">
                                                            <i class="bi  bi-trash"></i>
                                                        </span>
                                                        <span wire:loading wire:target="delete({{ $data->id_siswa }})"
                                                            class="spinner-border spinner-border-sm text-light"
                                                            role="status" aria-hidden="true"
                                                            style="width: 11px; height: 11px;"></span>
                                                    </button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="d-flex justify-content-end">{{ $siswa->links() }}</div>
                @else
                    <hr>
                    <p class="text-center text-secondary mt-5">Data tidak ditemukan !</p>
                    @endif
                </div>
            </div>

    </div>
    </section>

</div>

<style>
    .dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
    }
</style>


</div>
