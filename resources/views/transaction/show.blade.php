<x-auth.layout>

    <x-slot name="title">{{ $transaction->label }} / {{ $transaction->code }}</x-slot>
    <div class="row">
        <!-- Customer Content -->
        <div class="col-xl-8 col-lg-7 col-md-7">
            <div class="d-flex gap-3 mb-3 justify-content-between">
                <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Edit
                </button>
                @include('transaction.destroy')
            </div>

            <div class="collapse mb-3" id="collapseExample">
                <div class="card">
                    @include('transaction.update')
                </div>
            </div>
            <!-- Invoice table -->
            <div class="card mb-4">
                <div class="card-body table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">Tgl. Pinjam</th>
                                <th scope="col">Tgl. Kembali</th>
                                <th scope="col">Buku</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $transaction->borrow_date }}</td>
                                <td>{{ $transaction->return_date }}</td>
                                <td>{{ $transaction->book->title }}</td>
                                <td><span
                                        class="badge
                                @if ($transaction->status == 'Menunggu') bg-warning
                                @elseif($transaction->status == 'Berjalan') bg-primary
                                @elseif($transaction->status == 'Terlambat') bg-danger
                                @elseif($transaction->status == 'Selesai') bg-success @endif
                                ">{{ $transaction->status }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /Invoice table -->
        </div>
        <!--/ Customer Content -->
        <!-- Customer-detail Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- Customer-detail Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="info-container">
                        <small class="d-block text-muted my-3">DETAIL USER</small>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <span class="fw-medium me-2">Nama:</span>
                                <span>{{ $transaction->user->name }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Email:</span>
                                <span>{{ $transaction->user->email }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Role:</span>
                                <span class="badge bg-label-success">{{ $transaction->user->role }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Telp:</span>
                                <span>+62{{ $transaction->user->telp }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">NIS/Etc.:</span>
                                <span>{{ $transaction->user->identify }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Jenis Kelamin:</span>
                                <span>{{ $transaction->user->gender }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Tgl. Lahir:</span>
                                <span>{{ $transaction->user->birthdate }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="info-container">
                        <small class="d-block pt-4 border-top text-muted my-3">DETAIL BUKU</small>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <span class="fw-medium me-2">Judul:</span>
                                <span>{{ $transaction->book->title }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Kategori:</span>
                                <span>{{ $transaction->book->category->name }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">ISBN:</span>
                                <span>+62{{ $transaction->book->isbn }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Penulis:</span>
                                <span>{{ $transaction->book->author }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Tahun Terbit:</span>
                                <span>{{ $transaction->book->year_published }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Penerbit:</span>
                                <span>{{ $transaction->book->publisher }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Jumlah Buku Saat Ini:</span>
                                <span>{{ $transaction->book->book_count }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Customer Sidebar -->
    </div>

</x-auth.layout>
