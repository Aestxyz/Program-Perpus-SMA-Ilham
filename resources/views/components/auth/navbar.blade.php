<ul class="menu-inner py-1">

    <li class="menu-item {{ request()->is('home') ? 'active' : '' }}">
        <a href="/home" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
            <div data-i18n="Beranda">Beranda</div>
        </a>
    </li>

    @if (auth()->user()->role == 'Kepala')
        <li class="menu-item {{ request()->is('/users/officers') ? 'active' : '' }}">
            <a href="{{ route('users.officers') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-human"></i>
                <div data-i18n="Petugas">Petugas</div>
            </a>
        </li>
    @else
        <li class="menu-item {{ request()->is('/users/members') ? 'active' : '' }}">
            <a href="{{ route('users.members') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-human"></i>
                <div data-i18n="Anggota">Anggota</div>
            </a>
        </li>

        {{-- <li
        class="menu-item {{ request()->is(['users/officers', 'users/members', 'confirmation-account']) ? 'active' : '' }}">
        <a class="menu-link menu-toggle">
            <i class="menu-icon tf-icons mdi mdi-human"></i>
            <div data-i18n="Users">Manajemen Users</div>
            <div class="badge bg-danger rounded-pill ms-auto {{ $pending == null ? 'd-none' : '' }}">
                {{ $pending }}
            </div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('users.officers') }}" class="menu-link">
                    <div data-i18n="Data-User">Admin</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('users.members') }}" class="menu-link">
                    <div data-i18n="Data-User">Anggota</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('confirmations.index') }}" class="menu-link">
                    <div data-i18n="Konfirmasi-Akun">Konfirmasi Akun</div>
                    <div class="badge bg-danger rounded-pill ms-auto {{ $pending == null ? 'd-none' : '' }}">
                        {{ $pending }}
                    </div>
                </a>
            </li>
        </ul>
    </li> --}}

        <li class="menu-item {{ request()->is(['categoires', 'books']) ? 'active' : '' }}">
            <a class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-shape"></i>
                <div data-i18n="Users">Manajemen Buku</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('categories.index') }}" class="menu-link">
                        <div data-i18n="categories">Kategori</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('bookshelves.index') }}" class="menu-link">
                        <div data-i18n="Rak Buku">Rak Buku</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('books.index') }}" class="menu-link">
                        <div data-i18n="Books">Buku</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->is(['transactions/waiting', 'transactions/walking']) ? 'active' : '' }}">
            <a class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-sync-circle"></i>
                <div data-i18n="borrow">Peminjaman</div>
                <div class="badge bg-danger rounded-pill ms-auto {{ $waiting == null ? 'd-none' : '' }}">
                    {{ $waiting }}
                </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('transactions.waiting') }}" class="menu-link">
                        <div data-i18n="Data-User">Konfirmasi</div>
                        <div class="badge bg-danger rounded-pill ms-auto {{ $waiting == null ? 'd-none' : '' }}">
                            {{ $waiting }}
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('transactions.walking') }}" class="menu-link">
                        <div data-i18n="Data-User">Pinjam Buku</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->is(['transactions/completed', 'penalties']) ? 'active' : '' }}">
            <a class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-sync"></i>
                <div data-i18n="return">Pengembalian</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('transactions.completed') }}" class="menu-link">
                        <div data-i18n="Data-User">Buku Kembali</div>
                        <div class="badge bg-danger rounded-pill ms-auto {{ $late_days == null ? 'd-none' : '' }}">
                            {{ $late_days }}
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('penalties.index') }}" class="menu-link">
                        <div data-i18n="Data-User">Denda</div>
                        <div class="badge bg-danger rounded-pill ms-auto {{ $late_days == null ? 'd-none' : '' }}">
                            {{ $late_days }}
                        </div>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    <li class="menu-item {{ request()->is(['reports']) ? 'active' : '' }}">
        <a class="menu-link menu-toggle">
            <i class="menu-icon tf-icons mdi mdi-text"></i>
            <div data-i18n="Users">Laporan</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('reports.users') }}" class="menu-link">
                    <div data-i18n="Data-User">User</div>
                </a>
            </li>
        </ul>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('reports.books') }}" class="menu-link">
                    <div data-i18n="Data-User">Buku</div>
                </a>
            </li>
        </ul>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('reports.transactions') }}" class="menu-link">
                    <div data-i18n="Data-User">Transaksi</div>
                </a>
            </li>
        </ul>
    </li>
</ul>
