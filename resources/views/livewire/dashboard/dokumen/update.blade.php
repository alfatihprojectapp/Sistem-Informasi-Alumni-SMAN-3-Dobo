<div>
    @if (session()->has('message'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Upload berkas berhasil',
                    allowOutsideClick: false
                })
            </script>
        </div>
    @endif

    <form wire:submit.prevent="update({{ $idEdit }})">
        @csrf
        <div wire:ignore.self class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="bi
                bi-upload"></i> Upload dokumen pendaftaran</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">

                                    <input type="hidden" wire:model="kartu_keluarga_old">
                                    <input type="hidden" wire:model="akta_kelahiran_old">
                                    <input type="hidden" wire:model="ijazah_old">
                                    <input type="hidden" wire:model="image_old">
                                    <input type="hidden" wire:model="kip_old">

                                    <div class="mb-4 mt-3">
                                        <input type="file" class="hidden d-inline mb-1" id="image"
                                            wire:model="image" style="" onchange="imgPreview()">
                                        <label for="image"><span type="submit"
                                                class="badge bg-secondary py-2 px-3">Pilih
                                                Image</span></label>
                                        <span wire:loading wire:target="image" wire:key="image">
                                            <i class="spinner-border" role="status"
                                                style="margin-bottom: -7px; margin-left: 5px;"></i>
                                        </span>
                                        @error('image')
                                            <small class="text-danger d-block">{{ $message }}</small>
                                        @enderror
                                        <div wire:ignore>
                                            <img class="img-preview img-fluid d-block mt-2" style="width: 100px;"
                                                height="100">
                                        </div>
                                    </div>
                                    <div class="mb-4 mt-3">
                                        <input type="file" class="hidden d-inline mb-1" id="kartu_keluarga"
                                            wire:model="kartu_keluarga" style="">
                                        <label for="kartu_keluarga"><span type="submit"
                                                class="badge bg-secondary py-2 px-3">Pilih
                                                File Kartu Keluarga</span></label>
                                        <span wire:loading wire:target="kartu_keluarga" wire:key="kartu_keluarga">
                                            <i class="spinner-border" role="status"
                                                style="margin-bottom: -7px; margin-left: 5px;"></i>
                                        </span>
                                        @error('kartu_keluarga')
                                            <small class="text-danger d-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-4 mt-3">
                                        <input type="file" class="hidden d-inline mb-1" id="akta_kelahiran"
                                            wire:model="akta_kelahiran" style="">
                                        <label for="akta_kelahiran"><span type="submit"
                                                class="badge bg-secondary py-2 px-3">Pilih
                                                File Akta Kelahiran</span></label>
                                        <span wire:loading wire:target="akta_kelahiran" wire:key="akta_kelahiran">
                                            <i class="spinner-border" role="status"
                                                style="margin-bottom: -7px; margin-left: 5px;"></i>
                                        </span>
                                        @error('akta_kelahiran')
                                            <small class="text-danger d-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-4 mt-3">
                                        <input type="file" class="hidden d-inline mb-1" id="ijazah"
                                            wire:model="ijazah" style="">
                                        <label for="ijazah"><span type="submit"
                                                class="badge bg-secondary py-2 px-3">Pilih
                                                File Ijazah</span></label>
                                        <span wire:loading wire:target="ijazah" wire:key="ijazah">
                                            <i class="spinner-border" role="status"
                                                style="margin-bottom: -7px; margin-left: 5px;"></i>
                                        </span>
                                        @error('ijazah')
                                            <small class="text-danger d-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-4 mt-3">
                                        <input type="file" class="hidden d-inline mb-1" id="kip"
                                            wire:model="kip" style="">
                                        <label for="kip"><span type="submit"
                                                class="badge bg-secondary py-2 px-3">Pilih
                                                File KIP</span></label>
                                        <span wire:loading wire:target="kip" wire:key="kip">
                                            <i class="spinner-border" role="status"
                                                style="margin-bottom: -7px; margin-left: 5px;"></i>
                                        </span>
                                        @error('kip')
                                            <small class="text-danger d-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" id="closeModal" class="btn bg-secondary px-4"
                            data-bs-dismiss="modal">Batal</button>
                        <button class="btn bg-primary px-4" style="width: 110px;">
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
