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

    <div wire:ignore.self class="modal fade" id="tahunRegisterModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-center mt-3 mb-3">
                        <i class="bi bi-calendar-check text-success fs-1"></i>
                    </div>
                    <p class="text-center" style="font-size: 14pt;">Tahun pendaftaran {{ $tahun }} dibuka</p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button wire:click="showModalFalse" class="btn btn-primary px-4" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    @if ($showModal)
        <script>
            $(document).ready(function() {
                $('#tahunRegisterModal').modal('show');
            });
        </script>
    @endif

    @if ($closeModal)
        <script>
            $(document).ready(function() {
                $('#tahunRegisterModal').modal('hide');
            })
        </script>
    @endif


</div>
