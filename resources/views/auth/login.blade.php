<x-auth>
    <x-slot name="title">Login Pages</x-slot>
    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                        <h4 class="alert-heading d-flex align-items-center"><i
                                class="mdi mdi-check-circle-outline mdi-24px me-2"></i>Oopps :(</h4>
                        <hr>
                        <p class="mb-0">{{ session('error') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif

                <!-- Login -->
                <div class="card p-2">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mt-5">
                        <a href="#" class="app-brand-link gap-2">
                            <img class="img-fluid" src="/image/logo.png" alt="" width="60px" height="60px">
                        </a>
                    </div>
                    <p class="text-center fw-bold">SMAN 8 Batang Hari</p>
                    <!-- /Logo -->

                    <div class="card-body mt-2">
                        <h4 class="mb-2">Selamat datang kembali! 👋</h4>
                        <p class="mb-4">Silakan masuk ke akun perpustakaan Anda untuk mengakses koleksi buku yang
                            menarik.</p>

                        <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" id="email"
                                    placeholder="Enter your email" autofocus />
                                <label for="email">Email</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            <label for="password">Password</label>
                                        </div>
                                        <span class="input-group-text cursor-pointer"><i
                                                class="mdi mdi-eye-off-outline"></i></span>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="mb-3 d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }} />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div> --}}
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Belum punya akun?</span>
                            <a href="/register">
                                <span>Buat akun baru</span>
                            </a>
                            <br>
                            <a href="/" class="text-center">Kembali Beranda</a>
                        </p>
                    </div>
                </div>
                <!-- /Login -->
                <img src="/assets/img/illustrations/tree-3.png" alt="auth-tree"
                    class="authentication-image-object-left d-none d-lg-block" />
                <img src="/assets/img/illustrations/auth-basic-mask-light.png"
                    class="authentication-image d-none d-lg-block" alt="triangle-bg"
                    data-app-light-img="illustrations/auth-basic-mask-light.png"
                    data-app-dark-img="illustrations/auth-basic-mask-dark.png" />
                <img src="/assets/img/illustrations/tree.png" alt="auth-tree"
                    class="authentication-image-object-right d-none d-lg-block" />
            </div>
        </div>
    </div>
</x-auth>
