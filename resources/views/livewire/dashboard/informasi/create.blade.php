<div>
    @if (session()->has('message'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Informasi berhasil ditambahkan',
                    allowOutsideClick: false
                })
            </script>
        </div>
    @endif

    <form wire:submit.prevent="store">
        @csrf
        <div wire:ignore.self class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5> <i class="bi bi-plus-lg"></i> Buat informasi pendaftaran</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div wire:ignore>
                                            <textarea wire:model.defer="isi_informasi" class="form-control" name="isi_informasi" id="isi_informasi"></textarea>
                                        </div>
                                        @error('isi_informasi')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
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

    <script>
        $(document).ready(function() {
            $('#isi_informasi').summernote({
                placeholder: 'Isi informasi',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['groupName', ['list of button']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['picture', 'math']]
                ],
                callbacks: {
                    onChange: function(contents) {
                        @this.set('isi_informasi', contents);
                    }
                },
            });

        });
    </script>

    @if ($closeModal)
        <script>
            $(document).ready(function() {
                $('#createModal').modal('hide');
            })
        </script>
    @endif


</div>
