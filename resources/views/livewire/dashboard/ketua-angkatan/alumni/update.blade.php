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
        @csrf
        <div wire:ignore.self class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="bi bi-pencil"></i> Ubah data alumni</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nama_alumni')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Nama Alumni" name="nama_alumni" id="nama_alumni"
                                            wire:model.defer="nama_alumni">
                                        <label for="nama_alumni">Nama Alumni</label>
                                        @error('nama_alumni')
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
                                            placeholder="No. Handphone" name="nomor_handphone" id="nomor_handphone"
                                            wire:model.defer="nomor_handphone">
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
                                            placeholder="Pekerjaan" name="pekerjaan" id="pekerjaan"
                                            wire:model.defer="pekerjaan">
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
                                            placeholder="Alamat" name="alamat" id="alamat"
                                            wire:model.defer="alamat">
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
                            <span wire:loading.remove wire:target="update">Simpan</span>
                            <span wire:loading wire:target="update" class="spinner-border spinner-border-sm text-light"
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
                $('#editModal').modal('hide');
            })
        </script>
    @endif


</div>
