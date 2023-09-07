<div>

    <title>{{ $title }}</title>

    @if ($showUpdateNama)
        @livewire('dashboard.profil.update-nama')
        <script>
            $(document).ready(function() {
                $('#updateNamaModal').modal('show');
            });
        </script>
    @endif
    @if ($showUpdateEmail)
        @livewire('dashboard.profil.update-email')
        <script>
            $(document).ready(function() {
                $('#updateUsernameModal').modal('show');
            });
        </script>
    @endif
    @if ($showUpdatePassword)
        @livewire('dashboard.profil.update-password')
        <script>
            $(document).ready(function() {
                $('#updatePasswordModal').modal('show');
            });
        </script>
    @endif
    <script>
        $(document).on('click', '#closeModal', function() {
            Livewire.emit('closeLivewire');
        });
    </script>

    <div class="content-wrapper">
        <!-- title page -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">{!! $icon !!} {{ $title_page }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- continer -->
        <section class="content">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body mb-5">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="info-box">
                                    <span class="info-box-icon elevation-1 bg-primary"><i
                                            class="bi bi-person-check-fill"></i></span>
                                    <div class="info-box-content">
                                        <span class="fw-bold">Nama</span>
                                        <span class="info-box-text">
                                            <input type="input" class="form-control" id="foto" name="foto"
                                                required readonly value="{{ strtoupper(auth()->user()->nama) }}">
                                        </span>
                                        <span class="info-box-number">
                                            <!-- 1 -->
                                        </span>
                                        <small>
                                            <button class="badge bg-light border-1 px-4 py-2 mt-2 w-100"
                                                wire:click="updateNama"
                                                style="font-size: 10pt; font-weight: normal;height: 35px;border-color: rgb(47, 160, 252);">
                                                <span wire:loading.remove wire:target="updateNama"><i
                                                        class="bi bi-pencil"></i> Ubah</span>
                                                <span wire:loading wire:target="updateNama"
                                                    class="spinner-border spinner-border-sm text-primary" role="status"
                                                    aria-hidden="true"></span>
                                            </button>
                                        </small>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="info-box">
                                    <span class="info-box-icon elevation-1 bg-primary"><i
                                            class="bi bi-person-check-fill"></i></span>
                                    <div class="info-box-content">
                                        <span class="fw-bold">Username</span>
                                        <span class="info-box-text">
                                            <input type="input" class="form-control" id="foto" name="foto"
                                                required readonly value="{{ auth()->user()->username }}">
                                        </span>
                                        <span class="info-box-number">
                                            <!-- 1 -->
                                        </span>
                                        <small>
                                            <button class="badge bg-light border-1 px-4 py-2 mt-2 w-100"
                                                wire:click="updateEmail"
                                                style="font-size: 10pt; font-weight: normal;height: 35px;border-color: rgb(47, 160, 252);">
                                                <span wire:loading.remove wire:target="updateEmail"><i
                                                        class="bi bi-pencil"></i> Ubah</span>
                                                <span wire:loading wire:target="updateEmail"
                                                    class="spinner-border spinner-border-sm text-primary" role="status"
                                                    aria-hidden="true"></span>
                                            </button>
                                        </small>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="info-box">
                                    <span class="info-box-icon elevation-1 bg-primary"><i
                                            class="bi bi-lock-fill"></i></span>
                                    <div class="info-box-content">
                                        <span class="fw-bold">Password</span>
                                        <span class="info-box-text">
                                            <input type="input" class="form-control" id="foto" name="foto"
                                                required readonly value="*********">
                                        </span>
                                        <span class="info-box-number">
                                            <!-- 1 -->
                                        </span>
                                        <small>
                                            <button class="badge bg-light border-1 px-4 py-2 mt-2 w-100"
                                                wire:click="updatePassword"
                                                style="font-size: 10pt; font-weight: normal;height: 35px;border-color: rgb(47, 160, 252);">
                                                <span wire:loading.remove wire:target="updatePassword"><i
                                                        class="bi bi-pencil"></i> Ubah</span>
                                                <span wire:loading wire:target="updatePassword"
                                                    class="spinner-border spinner-border-sm text-primary" role="status"
                                                    aria-hidden="true"></span>
                                            </button>
                                        </small>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>

</div>
