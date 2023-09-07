<div>

    <title>{{ $title }}</title>

    <div class="content-wrapper">
        <!-- title page -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">{!! $icon !!} {{ $title_page }}
                            <br>
                            <button wire:click="create" class="badge bg-primary border-0 px-3 py-2 mt-1"
                                style="font-size: 10pt;font-weight: normal;width: 135px;">
                                <span wire:loading.remove wire:target="create"><i class="bi bi-plus-lg"></i> Tambah
                                    Data</span>
                                <span wire:loading wire:target="create"
                                    class="spinner-border spinner-border-sm text-light" role="status"
                                    aria-hidden="true" style="width: 13px; height: 13px;"></span>
                            </button>
                            <button class="badge bg-primary  border-0 px-3 py-2 mt-1"
                                style="font-size: 10pt;font-weight: normal;" data-bs-toggle="modal"
                                data-bs-target="#importData">
                                <i class="bi bi-download text-light"></i> Import Data
                            </button>

                            <div class="dropdown d-inline">
                                <button class="badge bg-primary border-0 px-3 py-2 mt-1 dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="font-size: 10pt;font-weight: normal;width: 135px;">
                                    <i class="bi bi-upload text-light"></i> Export Data</span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach ($dataTahun as $data)
                                        <li>
                                            <a type="button" wire:click="ExportExcel({{ $data->id_tahun }})"
                                                class="dropdown-item">{{ 'Alumni Angkatan ' . $data->tahun }}
                                                <span wire:loading wire:target="ExportExcel({{ $data->id_tahun }})"
                                                    class="spinner-border spinner-border-sm text-primary" role="status"
                                                    aria-hidden="true">
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- continer -->
        <section class="content">
            <div class="container-fluid">

                @if ($showLivewireCreate)
                    @livewire('dashboard.alumni.create')
                    <script>
                        $(document).ready(function() {
                            $('#createModal').modal('show');
                        });
                    </script>
                @endif
                @if ($showLivewireUpdate)
                    @livewire('dashboard.alumni.update', ['alumni' => $getAlumni])
                    <script>
                        $(document).ready(function() {
                            $('#editModal').modal('show');
                        });
                    </script>
                @endif
                @if ($showLivewireDelete)
                    @livewire('dashboard.alumni.delete', ['alumni' => $getAlumni])
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
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle;text-align: center;">#</th>
                                            <th style="vertical-align: middle;">Nama</th>
                                            <th style="vertical-align: middle;">Jenis Kelamin</th>
                                            <th style="vertical-align: middle;">Nomor Handphone</th>
                                            <th style="vertical-align: middle;">Pekerjaan</th>
                                            <th style="vertical-align: middle;">Alamat</th>
                                            <th style="vertical-align: middle;">Tahun Angkatan</th>
                                            <th style="width: 150px;text-align: center; vertical-align: middle;">Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alumni as $data)
                                            <tr>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    {{ $loop->iteration }}</td>
                                                <td style="vertical-align: middle;">{{ $data->nama }}</td>
                                                <td style="vertical-align: middle;">{{ $data->jenis_kelamin }}</td>
                                                <td style="vertical-align: middle;">{{ $data->nomor_handphone }}</td>
                                                <td style="vertical-align: middle;">{{ $data->pekerjaan }}</td>
                                                <td style="vertical-align: middle;">{{ $data->alamat }}</td>
                                                <td style="vertical-align: middle;">{{ $data->tahun->tahun }}</td>
                                                </td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    <button class="badge bg-success mb-1 border-0 py-2"
                                                        wire:click="edit({{ $data->id_alumni }})"
                                                        ata-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Ubah">
                                                        <span wire:loading.remove
                                                            wire:target="edit({{ $data->id_alumni }})">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </span>
                                                        <span wire:loading wire:target="edit({{ $data->id_alumni }})"
                                                            class="spinner-border spinner-border-sm text-light"
                                                            role="status" aria-hidden="true"
                                                            style="width: 11px; height: 11px;"></span>
                                                    </button>

                                                    <button class="badge bg-danger mb-1 border-0 py-2"
                                                        wire:click="delete({{ $data->id_alumni }})"
                                                        ata-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Hapus">
                                                        <span wire:loading.remove
                                                            wire:target="delete({{ $data->id_alumni }})">
                                                            <i class="bi  bi-trash"></i>
                                                        </span>
                                                        <span wire:loading
                                                            wire:target="delete({{ $data->id_alumni }})"
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
                            <div class="d-flex justify-content-end">{{ $alumni->links() }}</div>
                        @else
                            <hr>
                            <p class="text-center text-secondary mt-5">Data tidak ditemukan !</p>
                        @endif
                    </div>
                </div>

            </div>
        </section>

        <form action="/dashboard/alumni/import" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Modal import -->
            <div class="modal fade" id="importData" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="importDataLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="importDataLabel"><i class="bi bi-download"></i>
                                Import data alumni</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">


                                    <input type="file"
                                        class="hidden d-inline mb-1 @error('file') is-invalid @enderror"
                                        id="file" name="file" value="{{ old('file') }}">
                                    <label for="file"><span type="submit"
                                            class="badge bg-secondary py-2 px-3">Pilih
                                            File</span></label>
                                    @error('file')
                                        <div class="invalid-feedback mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <small class="text-secondary d-block">Pastikan format file yang dipilih
                                        adalah
                                        xlsx.</small>
                                    <small class="d-block text-secondary">Proses import data tidak akan
                                        berjalan jika penulisan tidak sesuai dengan template.</small>

                                    <p class="mt-3">
                                        <a href="/template-file-import/template-import-alumni.xlsx"
                                            style="text-decoration: none;">
                                            Download
                                        </a> <span><small>template file excel.</small></span>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="badge bg-light border-1 border-primary px-5 py-3"
                                style="font-size: 10pt;">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="modal fade" id="errorImport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="errorImportLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="bi bi-download"></i> Laporan data import</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-secondary"><i class="bi bi-calendar2-check"></i> Data yang berhasil
                            ditambahkan adalah data yang telah terverifikasi oleh sistem</p>
                        <hr>
                        @if (session()->has('failures'))
                            <p class="text-secondary"><i class="bi bi-x-octagon"></i> Tabel perincian data
                                yang terjadi kesalahan :</p>
                            <table class="table">
                                <tr>
                                    <th style="text-align: center">Row</th>
                                    <th>Attribute</th>
                                    <th><i>Error</i></th>
                                    <th><i>Value</i></th>
                                </tr>
                                @foreach (session()->get('failures') as $validation)
                                    <tr>
                                        <td style="text-align: center;">{{ $validation->row() }}</td>
                                        <td>{{ $validation->attribute() }}</td>
                                        <td style="text-align: left;">
                                            @foreach ($validation->errors() as $e)
                                                <span class="text-danger"
                                                    style="font-style: italic;">{{ $e }}</span>
                                            @endforeach
                                        </td>
                                        <td class="text-danger">
                                            <i>{{ $validation->values()[$validation->attribute()] }}</i>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        @error('file')
            <script>
                $(document).ready(function() {
                    $('#importData').modal('show');
                })
            </script>
        @enderror

        @if (session()->has('failures'))
            <script>
                $(document).ready(function() {
                    $('#errorImport').modal('show')
                })
            </script>
        @endif

    </div>

</div>
