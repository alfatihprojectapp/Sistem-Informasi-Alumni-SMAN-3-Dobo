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
                                <span wire:loading.remove wire:target="edit"><i class="bi bi-upload"></i> Upload dokumen</span>
                                <span wire:loading wire:target="edit({{ $siswa->id_siswa }})"
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
                    @livewire('dashboard.dokumen.update', ['siswa' => $getSiswa])
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
                            <div class="col-md-12">

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th style="width: 300px;">Pas Foto 3x4 Latar Biru</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="width: 200px;">
                                                @if ($siswa->foto == null)
                                                    <span class="text-danger"><i class="bi bi-x-lg"></i></span>
                                                    <small class="text-secondary">Belum diupload</small>
                                                @else
                                                    <span class="text-success"><i class="bi bi-check-lg"></i></span>
                                                    <small class="text-secondary">Telah diupload</small>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if ($siswa->foto == null)
                                                @else
                                                    <a href="{{ asset('storage/' . $siswa->foto) }}" target="blank"
                                                        class="badge bg-primary text-decoration-none px-3 py-2">Lihat</a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Kartu Keluarga</th>
                                            <td style="width: 10px;">:</td>
                                            <td>
                                                @if ($siswa->kartu_keluarga == null)
                                                    <span class="text-danger"><i class="bi bi-x-lg"></i></span>
                                                    <small class="text-secondary">Belum diupload</small>
                                                @else
                                                    <span class="text-success"><i class="bi bi-check-lg"></i></span>
                                                    <small class="text-secondary">Telah diupload</small>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if ($siswa->kartu_keluarga == null)
                                                @else
                                                    <a href="{{ asset('storage/' . $siswa->kartu_keluarga) }}"
                                                        target="blank"
                                                        class="badge bg-primary text-decoration-none px-3 py-2">Lihat</a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Akta Kelahiran</th>
                                            <td style="width: 10px;">:</td>
                                            <td>
                                                @if ($siswa->akta_kelahiran == null)
                                                    <span class="text-danger"><i class="bi bi-x-lg"></i></span>
                                                    <small class="text-secondary">Belum diupload</small>
                                                @else
                                                    <span class="text-success"><i class="bi bi-check-lg"></i></span>
                                                    <small class="text-secondary">Telah diupload</small>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if ($siswa->akta_kelahiran == null)
                                                @else
                                                    <a href="{{ asset('storage/' . $siswa->akta_kelahiran) }}"
                                                        target="blank"
                                                        class="badge bg-primary text-decoration-none px-3 py-2">Lihat</a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">ijazah/SKL</th>
                                            <td style="width: 10px;">:</td>
                                            <td>
                                                @if ($siswa->ijazah == null)
                                                    <span class="text-danger"><i class="bi bi-x-lg"></i></span>
                                                    <small class="text-secondary">Belum diupload</small>
                                                @else
                                                    <span class="text-success"><i class="bi bi-check-lg"></i></span>
                                                    <small class="text-secondary">Telah diupload</small>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if ($siswa->ijazah == null)
                                                @else
                                                    <a href="{{ asset('storage/' . $siswa->ijazah) }}" target="blank"
                                                        class="badge bg-primary text-decoration-none px-3 py-2">Lihat</a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">KIP</th>
                                            <td style="width: 10px;">:</td>
                                            <td>
                                                @if ($siswa->kartu_kip == null)
                                                    <span class="text-danger"><i class="bi bi-x-lg"></i></span>
                                                    <small class="text-secondary">Belum diupload - Jika ada</small>
                                                @else
                                                    <span class="text-success"><i class="bi bi-check-lg"></i></span>
                                                    <small class="text-secondary">Telah diupload</small>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if ($siswa->kartu_kip == null)
                                                @else
                                                    <a href="{{ asset('storage/' . $siswa->kartu_kip) }}" target="blank"
                                                        class="badge bg-primary text-decoration-none px-3 py-2">Lihat</a>
                                                @endif
                                            </td>
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

    <script>
        function imgPreview() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            const oFReader = new FileReader();

            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>


</div>
