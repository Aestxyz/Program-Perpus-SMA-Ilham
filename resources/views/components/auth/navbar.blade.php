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
        <li class="menu-item {{ request()->is(['users/members', 'confirmations/index']) ? 'active' : '' }}">
            <a class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-human"></i>
                <div data-i18n="Users">Master Data Anggota</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('users.members') }}" class="menu-link">
                        <div data-i18n="members">Data Anggota</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('confirmations.index') }}" class="menu-link">
                        <div data-i18n="confirmations">Konfirmasi Anggota</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->is(['categoires', 'books']) ? 'active' : '' }}">
            <a class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-shape"></i>
                <div data-i18n="Users">Master Data Buku</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('categories.index') }}" class="menu-link">
                        <div data-i18n="categories">Kategori</div>
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
                <div data-i18n="borrow">Transaksi</div>
                <div class="badge bg-danger rounded-pill ms-auto {{ $waiting == null ? 'd-none' : '' }}">
                    !
                </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('transactions.waiting') }}" class="menu-link">
                        <div data-i18n="Konfirmasi">Konfirmasi</div>
                        <div class="badge bg-danger rounded-pill ms-auto {{ $waiting == null ? 'd-none' : '' }}">
                            {{ $waiting }}
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('transactions.create') }}" class="menu-link">
                        <div data-i18n="Peminjaman">Peminjaman</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('transactions.index') }}" class="menu-link">
                        <div data-i18n="Pengembalian">Pengembalian</div>
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
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('penalties.index') }}" class="menu-link">
                    <div data-i18n="Data-User">Denda</div>
                </a>
            </li>
        </ul>
    </li>
</ul>
