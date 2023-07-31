<div>

    <title>Registrasi - SMA Negeri 8 Buru</title>

    @if (session()->has('message'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Registrasi akun pendaftaran berhasil !',
                    allowOutsideClick: false
                }).then(() => {
                    window.location.href = '/login';
                })
            </script>
        </div>
    @endif

    <main id="main">

        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Beranda</a></li>
                    <li>Registrasi</li>
                </ol>
                <h2>Registrasi</h2>

            </div>
        </section>

        <section wire:ignore.self id="kontak" class="services" data-aos="fade-up" data-aos-duration="1000">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h4 class="text-dark text-center"><i class="bi bi-tags"></i> Registrasi Data Calon Siswa Baru
                        </h4>
                        <div class="card px-4 py-3">
                            <div class="row g-0">
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <form wire:submit.prevent="registrasi" class="mt-3">
                                            @csrf
                                            <div class="mb-3">
                                                <div class="form-floating">
                                                    <input type="text"
                                                        class="form-control @error('nisn')
                                                      is-invalid
                                                  @enderror"
                                                        placeholder="nisn" wire:model.defer="nisn" name="nisn"
                                                        id="nisn" autofocus>
                                                    <label for="nisn">NISN</label>
                                                    @error('nisn')
                                                        <div class="invalid-feedback d-flex justify-content-star">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <small style="font-size: 8.5pt;" class="text-secondary">NISN sesuai
                                                        Ijazah</small>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-floating">
                                                    <input type="text"
                                                        class="form-control @error('nama')
                                                      is-invalid
                                                  @enderror"
                                                        placeholder="nama" wire:model.defer="nama" name="nama"
                                                        id="nama">
                                                    <label for="nama">Nama Lengkap</label>
                                                    @error('nama')
                                                        <div class="invalid-feedback d-flex justify-content-star">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <small style="font-size: 8.5pt;" class="text-secondary">Nama sesuai
                                                        Ijazah</small>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-floating">
                                                    <input type="text"
                                                        class="form-control @error('email')
                                                      is-invalid
                                                  @enderror"
                                                        placeholder="email" wire:model.defer="email" name="email"
                                                        id="email">
                                                    <label for="email">Email</label>
                                                    @error('email')
                                                        <div class="invalid-feedback d-flex justify-content-star">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <small style="font-size: 8.5pt;" class="text-secondary">E-Mail
                                                        aktif</small>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-floating">
                                                    <input wire:ignore type="password"
                                                        class="form-control @error('password')
                                                  is-invalid
                                                  @enderror"
                                                        id="password" name="password" placeholder="password"
                                                        wire:model.defer="password">
                                                    <label for="password">Password</label>
                                                    @error('password')
                                                        <div class="invalid-feedback d-flex justify-content-star">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="icheck-primary d-flex justify-content-star align-items-center"
                                                style="margin-top:-10px;">
                                                <input type="checkbox" id="lihatPassword">
                                                <label for="lihatPassword"
                                                    style="font-weight: normal;margin-top:px;margin-left: 5px;">
                                                    <small class="text-dark">Lihat Password</small>
                                                </label>
                                            </div>

                                            <button type="submit"
                                                class="w-100 btn btn-primary mt-5 btn-get-started border-0 py-3"
                                                name="login">
                                                <span wire:loading.remove wire:target="registrasi"><i class="bi bi-check-lg"></i> REGISTRASI</span>
                                                <span wire:loading wire:target="registrasi"
                                                    class="spinner-border spinner-border-sm text-light" role="status"
                                                    aria-hidden="true" style="width: ; height: ;"></span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-5 d-flex align-items-center">
                                    <img src="/assets/img/hero-img.png" class="img-fluid">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        $(document).on('click', '#lihatPassword', function() {

            const password = document.querySelector('#password');

            if (password.type == 'password') {
                password.type = 'text'
            } else {
                password.type = 'password';
            }

        })
    </script>

</div>
