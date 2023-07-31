<div>
    @php
        $openRegister = \App\Models\TahunPendaftaran::where('is_actived', 1)->count();
    @endphp

    <title>Login - SMA Negeri 8 Buru</title>

    {{-- @if (session()->has('message'))
        <div>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Login gagal',
                    allowOutsideClick: false
                }).then(() => {
                    // window.location.href = '/login';
                })
            </script>
        </div>
    @endif --}}

    <main id="main">

        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Beranda</a></li>
                    <li>Login</li>
                </ol>
                <h2>Login</h2>

            </div>
        </section>

        <section wire:ignore.self id="kontak" class="services" data-aos="fade-up" data-aos-duration="1000">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h3 class="text-dark text-center"><i class="bi bi-box-arrow-in-right"></i> Silahkan Login</h3>

                        <div class="card px-4 py-3 mt-3">
                            <div class="row g-0">
                                <div class="col-md-7">
                                    <div class="card-body">
                                        @if (session()->has('message'))
                                            <script>
                                                Swal.fire({
                                                    position: 'top-end',
                                                    icon: 'error',
                                                    title: 'Login gagal',
                                                    showConfirmButton: false,
                                                    timer: 1000
                                                })
                                            </script>
                                        @endif
                                        <form wire:submit.prevent="auth" class="mt-4">
                                            @csrf
                                            <div class="mb-3">
                                                <div class="form-floating">
                                                    <input type="text" wire:model.defer="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        placeholder="email" value="{{ old('email') }}" name="email"
                                                        id="email" autofocus>
                                                    <label for="email">Email</label>
                                                    @error('email')
                                                        <div class="invalid-feedback d-flex justify-content-star">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-floating">
                                                    <input wire:ignore type="password" wire:model.defer="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        id="password" name="password" placeholder="password"
                                                        value="">
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
                                                    style="font-weight: normal;margin-top:0px;margin-left: 5px;">
                                                    <small class="text-dark">Lihat Password</small>
                                                </label>
                                            </div>

                                            <button type="submit"
                                                class="w-100 btn border-0 btn-primary mt-5 btn-get-started py-3"
                                                name="login">
                                                <span wire:loading.remove wire:target="auth">
                                                    <i class="bi bi-box-arrow-in-right"></i> LOGIN
                                                </span>
                                                <span wire:loading wire:target="auth"
                                                    class="spinner-border spinner-border-sm text-light" role="status"
                                                    aria-hidden="true" style="width: ; height: ;"></span>
                                            </button>

                                            <div class="icheck-primary d-flex align-items-center"
                                                style="margin-top:10px;">
                                                <input type="checkbox" id="remember_me" wire:model.defer="remember_me">
                                                <label for="remember_me"
                                                    style="font-weight: normal;margin-top:0px;margin-left: 5px;">
                                                    <small class="text-dark">Ingat Saya !</small>
                                                </label>
                                            </div>

                                        </form>
                                        @if ($openRegister)
                                            <div class="mt-3 d-flex justify-content-end">
                                                <a href="/registrasi"><i class="bi bi-tags"></i> Registrasi akun</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-5">
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
