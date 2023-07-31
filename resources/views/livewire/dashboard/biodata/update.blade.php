<div>
    <?php include 'function/time.php'; ?>

    @if (session()->has('message'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Biodata siswa berhasil disimpan',
                    allowOutsideClick: false
                })
            </script>
        </div>
    @endif

    <form wire:submit.prevent="update({{ $idEdit }})">
        @csrf
        <div wire:ignore.self class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="bi bi-pencil-square"></i> Biodata pendaftaran</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <h5>Data Peserta</h5>
                                        <label for="jurusan" class="col-sm-4 col-form-label">Pilih
                                            Jurusan</label>
                                        <div class="col-sm-8">
                                            <select
                                                class="form-select @error('jurusan')
                                            is-invalid
                                            @enderror"
                                                id="jurusan" name="jurusan" aria-label="Default select example"
                                                wire:model.defer="jurusan">
                                                <option value=" ">-</option>
                                                @foreach ($dataJurusan as $data)
                                                    <option value="{{ $data->id_jurusan }}">
                                                        {{ $data->nama_jurusan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('jurusan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="nisn" class="col-sm-4 col-form-label">NISN</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('nisn')
                                          is-invalid
                                          @enderror"
                                                id="nisn" name="nisn" wire:model.defer="nisn" readonly
                                                onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                            @error('nisn')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nama" class="col-sm-4 col-form-label">Nama
                                            Lengkap</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('nama')
                                              is-invalid
                                            @enderror"
                                                id="nama" name="nama" wire:model.defer="nama" readonly>
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat
                                            Lahir</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('tempat_lahir')
                                          is-invalid
                                          @enderror"
                                                id="tempat_lahir" autofocus name="tempat_lahir"
                                                wire:model.defer="tempat_lahir">
                                            @error('tempat_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="tahun" class="col-sm-4 col-form-label">Tanggal
                                            Lahir</label>
                                        <div class="col-sm-8">
                                            <select class="form-select mb-1 @error('tanggal') is-invalid @enderror"
                                                id="tanggal" name="tanggal" wire:model.defer="tanggal"
                                                style="width: 100px;display: inline-block;">
                                                <option value="">-</option>
                                                <?php for($i=1; $i<=31; $i++) : ?>
                                                <?php if($i>=1 && $i<=9) : ?>
                                                <option value="<?php echo '0' . $i; ?>" <?php if ($i == $tgl) {
                                                    echo 'selected';
                                                } ?>>
                                                    <?php echo '0' . $i; ?>
                                                </option>
                                                <?php else : ?>
                                                <option value="<?php echo $i;
                                                ?>" <?php if ($i == $tgl) {
                                                    echo 'selected';
                                                } ?>>
                                                    <?php echo $i; ?>
                                                </option>
                                                <?php endif; ?>
                                                <?php endfor; ?>
                                            </select>
                                            <select class="form-select @error('bulan') is-invalid @enderror"
                                                id="bulan" name="bulan" wire:model.defer="bulan"
                                                style="width: 170px;display: inline-block;">
                                                <option value="">-</option>
                                                <?php for ($i=1; $i <= 12 ; $i++) : ?>
                                                <option value="<?php echo $namaBulan[$i]; ?>" <?php if ($i == $bulan) {
                                                    echo 'selected';
                                                } ?>>
                                                    <?php echo $namaBulan[$i]; ?>
                                                </option>
                                                <?php endfor; ?>
                                            </select>

                                            <input type="text"
                                                class="form-control @error('tahun')
                                        is-invalid
                                        @enderror"
                                                name="tahun" id="tahun" placeholder="Tahun"
                                                style="width: 100px; display: inline-block;display: inline-block;"
                                                wire:model.defer="tahun">
                                            <br>
                                            @error('tanggal')
                                                <div class="invalid-feedback d-inline">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            @error('bulan')
                                                <div class="invalid-feedback d-inline ml-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            @error('tahun')
                                                <div class="invalid-feedback d-inline ml-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="agama" class="col-sm-4 col-form-label">Agama</label>
                                        <div class="col-sm-8">
                                            <select
                                                class="form-select @error('agama')
                                            is-invalid
                                            @enderror"
                                                id="agama" name="agama" wire:model.defer="agama"
                                                aria-label="Default select example">
                                                <option value="">-</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Protestan">Protestan</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Khonghucu">Khonghucu
                                                </option>
                                                <option value="Lain-Lain">Lain-Lain
                                                </option>
                                            </select>
                                            @error('agama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis
                                            Kelamin</label>
                                        <div class="col-sm-8">
                                            <select
                                                class="form-select @error('jenis_kelamin')
                                            is-invalid
                                            @enderror"
                                                id="jenis_kelamin" name="jenis_kelamin" wire:model.defer="jenis_kelamin"
                                                aria-label="Default select example">
                                                <option value="">-</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="asal_sekolah" class="col-sm-4 col-form-label">Asal
                                            Sekolah</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('asal_sekolah')
                                          is-invalid
                                          @enderror"
                                                id="asal_sekolah" name="asal_sekolah" wire:model.defer="asal_sekolah">
                                            @error('asal_sekolah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="nomor_telepon" class="col-sm-4 col-form-label">Nomor
                                            Telepon/WA</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('nomor_telepon')
                                          is-invalid
                                          @enderror"
                                                id="nomor_telepon" name="nomor_telepon" wire:model.defer="nomor_telepon">
                                            @error('nomor_telepon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="alamat" class="col-sm-4 col-form-label">Alamat
                                            Tinggal</label>
                                        <div class="col-sm-8">
                                            <textarea
                                                class="form-control @error('alamat')
                                          is-invalid
                                          @enderror"
                                                name="alamat" id="alamat" wire:model.defer="alamat">$alamat</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <h5>Data Orang Tua/Wali</h5>
                                    <div class="mb-3 row">
                                        <label for="nama_ayah" class="col-sm-4 col-form-label">Nama Ayah</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('nama_ayah')
                                          is-invalid
                                          @enderror"
                                                id="nama_ayah" name="nama_ayah" wire:model.defer="nama_ayah">
                                            @error('nama_ayah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nama_ibu" class="col-sm-4 col-form-label">Nama Ibu</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('nama_ibu')
                                          is-invalid
                                          @enderror"
                                                id="nama_ibu" name="nama_ibu" wire:model.defer="nama_ibu">
                                            @error('nama_ibu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nomor_telepon_orang_tua" class="col-sm-4 col-form-label">Nomor
                                            Telepon</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('nomor_telepon_orang_tua')
                                          is-invalid
                                          @enderror"
                                                id="nomor_telepon_orang_tua" name="nomor_telepon_orang_tua"
                                                wire:model.defer="nomor_telepon_orang_tua">
                                            @error('nomor_telepon_orang_tua')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="alamat_orang_tua" class="col-sm-4 col-form-label">Alamat
                                            Tinggal</label>
                                        <div class="col-sm-8">
                                            <textarea
                                                class="form-control @error('alamat_orang_tua')
                                          is-invalid
                                          @enderror"
                                                name="alamat_orang_tua" id="alamat_orang_tua" wire:model.defer="alamat_orang_tua">$alamat_orang_tua</textarea>
                                            @error('alamat_orang_tua')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" id="closeModal" class="btn bg-secondary px-4"
                            data-bs-dismiss="modal">Batal</button>
                        <button class="btn bg-primary px-4" style="width: 120px;">
                            <span wire:loading.remove wire:target="update">Simpan</span>
                            <span wire:loading wire:target="update"
                                class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"
                                style="width: 12px; height: 12px;"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if ($closeModal)
        <script>
            $(document).ready(function() {
                $('#editModal').modal('hide');
            })
        </script>
    @endif

</div>
