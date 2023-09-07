<div>
    @if (session()->has('message'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Data berhasil ditambahkan',
                    allowOutsideClick: false
                })
            </script>
        </div>
    @endif

    <form wire:submit.prevent="store">
        @csrf
        <div wire:ignore.self class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5> <i class="bi bi-plus-lg"></i> Tambah ketua angkatan</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <select
                                            class="form-select form-select-md @error('tahun_akademik')
                                            is-invalid
                                            @enderror"
                                            id="tahun_akademik" name="tahun_akademik" wire:model="tahun_akademik"
                                            style="height: 58px;">
                                            <option value=" ">-- Tahun Akademik --</option>
                                            @foreach ($dataTahun as $data)
                                                <option value="{{ $data->id_tahun }}">{{ $data->tahun }}</option>
                                            @endforeach
                                        </select>
                                        @error('tahun_akademik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nama_ketua_angkatan')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Nama Ketua Angkatan" name="nama_ketua_angkatan"
                                            id="nama_ketua_angkatan" wire:model.defer="nama_ketua_angkatan">
                                        <label for="nama_ketua_angkatan">Nama Ketua Angkatan</label>
                                        @error('nama_ketua_angkatan')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <select
                                            class="form-select form-select-md @error('jenis_kelamin')
                                            is-invalid
                                            @enderror"
                                            id="jenis_kelamin" name="jenis_kelamin" wire:model="jenis_kelamin"
                                            style="height: 58px;">
                                            <option value=" ">-- Jenis Kelamin --</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nomor_handphone')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="No. Handphone" name="nomor_handphone"
                                            id="nomor_handphone" wire:model.defer="nomor_handphone">
                                        <label for="nomor_handphone">No. Handphone</label>
                                        @error('nomor_handphone')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('pekerjaan')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Pekerjaan" name="pekerjaan"
                                            id="pekerjaan" wire:model.defer="pekerjaan">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        @error('pekerjaan')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('alamat')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Alamat" name="alamat"
                                            id="alamat" wire:model.defer="alamat">
                                        <label for="alamat">Alamat</label>
                                        @error('alamat')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" id="closeModal" class="btn bg-secondary px-4"
                            data-bs-dismiss="modal">Batal</button>
                        <button class="btn bg-primary px-4" style="width: 100px;">
                            <span wire:loading.remove wire:target="store">Simpan</span>
                            <span wire:loading wire:target="store" class="spinner-border spinner-border-sm text-light"
                                role="status" aria-hidden="true" style="width: 12px; height: 12px;">
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if ($closeModal)
        <script>
            $(document).ready(function() {
                $('#createModal').modal('hide');
            })
        </script>
    @endif


</div>
