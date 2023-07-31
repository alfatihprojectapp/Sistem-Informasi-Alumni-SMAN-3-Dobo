<div>
    @if (session()->has('message'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Data berhasil diubah',
                    allowOutsideClick: false
                })
            </script>
        </div>
    @endif

    <form wire:submit.prevent="update({{ $idEdit }})">
        <div wire:ignore.self class="modal fade" id="showModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="bi bi-person-fill"></i> Data calon siswa</h5>
                        <button id="closeModal" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ asset('storage/' . $foto) }}" target="blank" class="">
                                        <img src="{{ asset('storage/' . $foto) }}" class="img-fluid img-thumbnail mb-3"
                                            style="width: 160px; height: 200px;">
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped" style="width: 100%;">
                                        <tr>
                                            <th style="width: 300px;">Kartu Keluarga</th>
                                            <td style="width: 10px;">:</td>
                                            <td>
                                                <span class="text-success"><i class="bi bi-check-lg"></i></span>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ asset('storage/' . $kartu_keluarga) }}" target="blank"
                                                    class="badge bg-primary text-decoration-none px-3 py-2">Lihat</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Akta Kelahiran</th>
                                            <td style="width: 10px;">:</td>
                                            <td>
                                                <span class="text-success"><i class="bi bi-check-lg"></i></span>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ asset('storage/' . $akta_kelahiran) }}" target="blank"
                                                    class="badge bg-primary text-decoration-none px-3 py-2">Lihat</a>
                                            </td>
                                        <tr>
                                            <th style="width: 300px;">Ijazah/SKL</th>
                                            <td style="width: 10px;">:</td>
                                            <td>
                                                <span class="text-success"><i class="bi bi-check-lg"></i></span>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ asset('storage/' . $ijazah) }}" target="blank"
                                                    class="badge bg-primary text-decoration-none px-3 py-2">Lihat</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">KIP</th>
                                            <td style="width: 10px;">:</td>
                                            <td>
                                                <span class="text-success"><i class="bi bi-check-lg"></i></span>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ asset('storage/' . $kip) }}" target="blank"
                                                    class="badge bg-primary text-decoration-none px-3 py-2">Lihat</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
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
                                            <td style="text-align: left;">{{ $nisn }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Nama Lengkap</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;font-weight: bold;">
                                                {{ strtoupper($nama) }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Jurusan</th>
                                            <td style="width: 10px;">:</td>
                                            @if ($jurusan == null)
                                                <td style="text-align: left;"></td>
                                            @else
                                                <td style="text-align: left;">{{ $jurusan }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Tempat Lahir</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $tempat_lahir }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Tanggal Lahir</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $tanggal_lahir }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Agama</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $agama }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Jenis Kelamin</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $jenis_kelamin }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Asal Sekolah</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $asal_sekolah }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Nomor Telepon/WA</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $nomor_telepon }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Alamat Lengkap</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $alamat }}</td>
                                        </tr>
                                        <tr>
                                            <th style="height: 50px;vertical-align: bottom;" colspan="3">DATA
                                                ORANG TUA/WALI :</th>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Nama Ayah</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $nama_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Nama Ibu</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $nama_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Nomor Telepon</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $telepon_ortu }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 300px;">Alamat</th>
                                            <td style="width: 10px;">:</td>
                                            <td style="text-align: left;">{{ $alamat_ortu }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        {{-- <button type="button" wire:click="showModalFalse" class="btn bg-secondary px-4"
                            data-bs-dismiss="modal">Batal</button>
                        <button class="btn bg-primary px-4">Update</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if ($closeModal)
        <script>
            $(document).ready(function() {
                $('#showModal').modal('hide');
            })
        </script>
    @endif


</div>
