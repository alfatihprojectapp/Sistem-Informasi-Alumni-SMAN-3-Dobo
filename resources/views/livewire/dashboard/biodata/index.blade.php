<div>
    <?php include 'function/time.php'; ?>

    <title>{{ $title }} | Dashboard - SMA Negeri 8 Buru</title>

    @if (session()->has('message'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Pengisian biodata berhasil',
                    allowOutsideClick: false
                })
            </script>
        </div>
    @endif

    <div class="content-wrapper">
        <!-- title page -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">{!! $icon !!} {{ $title_page }}
                            <button id="button" wire:click="edit({{ $siswa->id_siswa }})"
                                class="badge bg-primary border-0 px-3 py-2" style="width: 150px; font-size: 10pt;font-weight: normal;">
                                <span wire:loading.remove wire:target="edit"><i class="bi bi-pencil-square"></i> Lengkapi biodata</span>
                                <span wire:loading wire:target="edit"
                                    class="spinner-border spinner-border-sm text-light" role="status"
                                    aria-hidden="true" style="width: 13px; height: 13px;"></span>
                            </button>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- continer -->
        <section class="content">
            <div class="container-fluid">

                @if ($showLivewireUpdate)
                    @livewire('dashboard.biodata.update', ['siswa' => $getSiswa])
                    <script>
                        $(document).ready(function() {
                            $('#editModal').modal('show');
                        });
                    </script>
                @endif
                <script>
                    $(document).on('click', '#closeModal', function(){
                        Livewire.emit('closeLivewire');
                    });
                </script>

                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3 d-flex justify-content-center">
                                @if ($siswa->foto == null)
                                    <img src="/assets/img/avatar.png" class="img-fluid img-thumbnail mb-3"
                                        style="width: 160px; height: 200px;">
                                @else
                                    <img src="{{ asset('storage/' . $siswa->foto) }}"
                                        class="img-fluid img-thumbnail mb-3" style="width: 160px; height: 200px;">
                                @endif
                            </div>
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table table-striped" style="width: 100%;">
                                        <tr>
                                            <th colspan="3">DATA PESERTA :</th>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Nomor Induk Siswa Nasional</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $siswa->nisn }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Nama Lengkap</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;font-weight: bold;">
                                                {{ strtoupper($siswa->nama) }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Jurusan</th>
                                            <td style="width: 10px;">:</td>
                                            @if ($siswa->id_jurusan == null)
                                                <td style="text-align: left;"></td>
                                            @else
                                                <td style="text-align: left;">{{ $siswa->jurusan->nama_jurusan }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Tempat Lahir</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $siswa->tempat_lahir }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Tanggal Lahir</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $siswa->tanggal_lahir }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Agama</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $siswa->agama }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Jenis Kelamin</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $siswa->jenis_kelamin }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Asal Sekolah</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $siswa->asal_sekolah }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Nomor Telepon/WA</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $siswa->nomor_telepon }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Alamat Lengkap</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $siswa->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <th style="height: 50px;vertical-align: bottom;" colspan="3">DATA
                                                ORANG TUA/WALI :</th>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Nama Ayah</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $siswa->nama_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Nama Ibu</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $siswa->nama_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Nomor Telepon</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $siswa->nomor_ortu_wali }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Alamat</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $siswa->alamat_ortu_wali }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>

    @if ($siswa->completed == 1)
        <script>
            $(document).ready(function() {
                $('#button').attr('disabled', 'true');
            });
        </script>
    @endif


</div>
