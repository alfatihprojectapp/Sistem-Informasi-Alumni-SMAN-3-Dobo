<div>

    <title>{{ $title }} | Dashboard - SMA Negeri 8 Buru</title>

    @if (session()->has('error'))
        <div>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Maaf data pendaftaran masih belum lengkap',
                    allowOutsideClick: false
                }).then(() => {
                    window.location.reload();
                })
            </script>
        </div>
    @endif

    @if (session()->has('message'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Pendaftaran berhasil & terimakasih',
                    allowOutsideClick: false
                }).then(() => {
                    window.location.reload();
                })
            </script>
        </div>
    @endif

    @if (session()->has('batal'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Pendaftaran dibatalkan',
                    allowOutsideClick: false,
                }).then(() => {
                    window.location.reload();
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
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- continer -->
        <section class="content">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12">

                                <form wire:submit.prevent="finish({{ $siswa->id_siswa }})" class="d-inline">
                                    @csrf

                                    <div class="alert alert-primary" role="alert">
                                        <h5 class="wf-bold"><i class="bi bi-exclamation-circle-fill"></i> Catatan :</h5>
                                        <p><i class="bi bi-check2-square"></i> Sebelum menekan tombol selesai pastikan
                                            semua data yang dimasukan telah benar.</p>

                                        <p> <i class="bi bi-check2-square"></i> Data pendaftaran siswa akan didaftarkan
                                            ke panitia penerimaan siswa baru setelah menekan tombol selesai.</p>

                                        <p> <i class="bi bi-check2-square"></i> Informasi mengenai pendaftaran siswa
                                            akan di informasikan melalui website ini atau melalui email, sms, atau
                                            whastapp</p>

                                        <p> <i class="bi bi-check2-square"></i> Pastikan untuk selalu mengecek
                                            informasi.</p>

                                        <p> <i class="bi bi-check2-square"></i> Klik batal jika ingin kembali merubah
                                            data pendaftaran.</p>

                                    </div>

                                    <button type="submit" class="btn btn-primary selesai mb-5 mt-3"
                                        style="width: 150px;">
                                        <span wire:loading.remove wire:target="finish">Selesai</span>
                                        <span wire:loading wire:target="finish"
                                            class="spinner-border spinner-border-sm text-light" role="status"
                                            aria-hidden="true" style="width: 13px; height: 13px;"></span>
                                    </button>

                                </form>

                                @if ($siswa->completed == 1)
                                    <form wire:submit.prevent="batal({{ $siswa->id_siswa }})" class="d-inline">
                                        @method('put')
                                        @csrf
                                        @if ($openRegister)
                                            <button type="submit" class="btn btn-danger mb-5 mt-3"
                                                style="width: 150px;">
                                                <span wire:loading.remove wire:target="batal">Batal</span>
                                                <span wire:loading wire:target="batal"
                                                    class="spinner-border spinner-border-sm text-light" role="status"
                                                    aria-hidden="true" style="width: 13px; height: 13px;"></span>
                                            </button>
                                            </button>
                                        @endif
                                    </form>
                                @endif

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
                $('.selesai').attr('disabled', 'true');
            });
        </script>
    @endif

</div>
