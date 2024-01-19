<x-auth.layout>
    <x-slot name="title">Home</x-slot>
    <div class="card mb-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-body">
                    <h4 class="card-title display-6 mb-4 text-truncate lh-sm">Hello {{ Auth()->user()->name }}!🎉</h4>
                    <p class="mb-0">Selamat menjalankan tugas dan semoga harimu menyenangkan.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 position-relative text-center">
                <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/illustrations/illustration-2.png"
                    class="card-img-position bottom-0 w-25 end-0 scaleX-n1-rtl" alt="View Profile">
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Master Data</h5>
            </div>
            <p class="mt-3"><span class="fw-medium">Rekap Data Perpustakaan</span> 😎</p>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="avatar-initial bg-primary rounded shadow">
                                <i class="mdi mdi-trending-up mdi-24px"></i>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="small mb-1">Peminjaman</div>
                            <h5 class="mb-0">{{ $onTransactions }} Transaksi</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="avatar-initial bg-success rounded shadow">
                                <i class="mdi mdi-account-outline mdi-24px"></i>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="small mb-1">Anggota</div>
                            <h5 class="mb-0">{{ $members }} Terdaftar</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="avatar-initial bg-warning rounded shadow">
                                <i class="mdi mdi-cellphone-link mdi-24px"></i>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="small mb-1">Buku</div>
                            <h5 class="mb-0">{{ $books }} Tersedia</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="avatar-initial bg-info rounded shadow">
                                <i class="mdi mdi-currency-usd mdi-24px"></i>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="small mb-1">Denda</div>
                            <h5 class="mb-0">{{ 'Rp. ' . $total }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Rekap Transaksi Perpustakaan (Status)</h5>
        </div>
        <div class="card-body row g-3">
            <div class="col-md" style="position: relative;">
                <div class="demo-vertical-spacing demo-only-element">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar"
                            style="width: {{ $transactions->where('status', 'Menunggu')->count() }}%"
                            aria-valuenow="{{ $transactions->where('status', 'Menunggu')->count() }}" aria-valuemin="0"
                            aria-valuemax="100">Menunggu</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width: {{ $transactions->where('return_date', '>', now())->count() }}%"
                            aria-valuenow="{{ $transactions->where('return_date', '>', now())->count() }}"
                            aria-valuemin="0" aria-valuemax="100">Berjalan</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar"
                            style="width: {{ $transactions->where('return_date', '<=', now())->where('status', '!=', 'Selesai')->where('status', '!=', 'Tolak')->where('status', '!=', 'Menunggu')->count() }}%"
                            aria-valuenow="{{ $transactions->where('return_date', '<=', now())->where('status', '!=', 'Selesai')->where('status', '!=', 'Tolak')->where('status', '!=', 'Menunggu')->count() }}"
                            aria-valuemin="0" aria-valuemax="100">Terlambat</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-secondary" role="progressbar"
                            style="width: {{ $transactions->where('status', 'Selesai')->count() }}%"
                            aria-valuenow="{{ $transactions->where('status', 'Selesai')->count() }}" aria-valuemin="0"
                            aria-valuemax="100">Selesai</div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex justify-content-around align-items-center">
                <div>
                    <div class="d-flex align-items-baseline">
                        <span class="text-primary me-2"><i class="mdi mdi-circle mdi-14px"></i></span>
                        <div>
                            <p class="mb-1">Menunggu</p>
                            <h5>{{ $transactions->where('status', 'Menunggu')->count() }}</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline my-3">
                        <span class="text-success me-2"><i class="mdi mdi-circle mdi-14px"></i></span>
                        <div>
                            <p class="mb-1">Berjalan</p>
                            <h5>{{ $transactions->where('return_date', '>', now())->count() }}</h5>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="d-flex align-items-baseline">
                        <span class="text-info me-2"><i class="mdi mdi-circle mdi-14px"></i></span>
                        <div>
                            <p class="mb-1">Terlambat</p>
                            <h5>{{ $transactions->where('return_date', '<=', now())->where('status', '!=', 'Selesai')->where('status', '!=', 'Tolak')->where('status', '!=', 'Menunggu')->count() }}
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline my-3">
                        <span class="text-secondary me-2"><i class="mdi mdi-circle mdi-14px"></i></span>
                        <div>
                            <p class="mb-1">Selesai</p>
                            <h5>{{ $transactions->where('status', 'Selesai')->count() }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-auth.layout>
