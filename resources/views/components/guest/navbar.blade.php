<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container position-relative py-lg-4">

            <!-- Mobile Logo -->
            <a editable="inline" class="navbar-brand text-white d-lg-none" href="/">
                <img src="/image/logo.png" width="48" height="48" class="align-middle me-1" alt="My Website">
                Perpustakaan</a>
            <!-- end -->

            <!-- Desktop Logo -->
            <div class="lc-block position-absolute start-50 translate-middle top-50 d-none d-lg-block">
                <a editable="inline" class="navbar-brand text-white mx-auto" href="/">
                    <img src="/image/logo.png" width="48" height="48" class="d-block mx-auto" alt="My Website">
                    SMAN 8 Batang Hari</a>
            </div>
            <!-- end -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar5"
                aria-controls="myNavbar5" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="lc-block collapse navbar-collapse" id="myNavbar5">
                <div lc-helper="shortcode" class="live-shortcode me-auto"> <!--  lc_nav_menu -->
                    <ul id="menu-menu-1" class="navbar-nav me-auto mb-2 mb-md-0 navbar-nav">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-32739"><a
                                href="/" class="nav-link ">Beranda</a>
                        </li>
                        <li
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738">
                            <a href="{{ route('catalog.index') }}" class="nav-link ">Koleksi Buku</a>
                        </li>
                    </ul> <!-- /lc_nav_menu -->
                </div>

                <div lc-helper="shortcode" class="live-shortcode ms-auto"> <!--  lc_nav_menu -->
                    <ul id="menu-secondary" class="navbar-nav me-auto mb-2 mb-md-0 navbar-nav">
                        @auth
                            @if (Auth()->user()->role == 'Anggota')
                                <li
                                    class="menu-item menu-item-type-taxonomy menu-item-object-post_tag nav-item nav-item-33142">
                                    <a href="{{ route('catalog.history') }}" class="nav-link ">Transaksi</a>
                                </li>
                                <li
                                    class="menu-item menu-item-type-taxonomy menu-item-object-post_tag nav-item nav-item-33142">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"
                                        class="nav-link ">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <li
                                    class="menu-item menu-item-type-taxonomy menu-item-object-post_tag nav-item nav-item-33142">
                                    <a href="/home" class="nav-link ">Dashboard</a>
                                </li>
                            @endif
                        @else
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-post_tag nav-item nav-item-33142">
                                <a href="/login" class="nav-link ">Masuk</a>
                            </li>
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-post_tag nav-item nav-item-33142">
                                <a href="/register" class="nav-link ">Daftar</a>
                            </li>
                        @endauth
                    </ul> <!-- /lc_nav_menu -->
                </div>

            </div>
        </div>
    </nav>
</div>
