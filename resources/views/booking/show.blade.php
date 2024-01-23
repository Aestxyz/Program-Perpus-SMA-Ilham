<div class="modal fade" id="show-{{ $item->user->slug }}" aria-hidden="true"
    aria-labelledby="show-{{ $item->user->slug }}Label" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <div>
                    <h5 class="mb-0">Informasi Pengguna</h5>
                    <p>Pengguna terdaftar sejak {{ $item->user->created_at }}</p>
                    <div class="row">
                        <div class="col-md">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="fw-bold">Nama lengkap: </span> {{ $item->user->name }}
                                </li>
                                <li>
                                    <span class="fw-bold">NIS/Etc.: </span> {{ $item->user->identify }}
                                </li>
                                <li>
                                    <span class="fw-bold">Status: </span> {{ $item->user->role }}
                                </li>
                                <li>
                                    <span class="fw-bold">Tanggal Lahir: </span>
                                    {{ Carbon\Carbon::parse($item->user->birthdate)->format('d, M Y') }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-md">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="fw-bold">Email: </span> {{ $item->user->email }}
                                </li>
                                <li>
                                    <span class="fw-bold">Telp: </span>+62 {{ $item->user->telp }}
                                </li>
                                <li>
                                    <span class="fw-bold">Jenis Kelamin: </span> {{ $item->user->gender }}
                                </li>
                                <li>
                                    <span class="fw-bold">Jurusan: </span> {{ $item->user->majors ?? '-' }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <h5 class="mb-0">Informasi Buku</h5>
                    <div class="row">
                        <div class="col-md">
                            <ul class="list-unstyled" style="text-wrap: balance;">
                                <li>
                                    <span class="fw-bold">Judul Buku: </span> {{ $item->book->title }}
                                </li>
                                <li>
                                    <span class="fw-bold">Kategori Buku: </span> {{ $item->book->category->name }}
                                </li>
                                <li>
                                    <span class="fw-bold">ISBN: </span>
                                    {{ $item->book->isbn }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-md">
                            <ul class="list-unstyled" style="text-wrap: balance;">
                                <li>
                                    <span class="fw-bold">Penulis: </span> {{ $item->book->author }}
                                </li>
                                <li>
                                    <span class="fw-bold">Tahun Terbit: </span>+62 {{ $item->book->publisher }}
                                </li>
                                <li>
                                    <span class="fw-bold">Tahun Terbit: </span>+62 {{ $item->book->year_published }}
                                </li>
                                <li>
                                    <span class="fw-bold">Jumlah Tersedia: </span> {{ $item->book->book_count }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button class="btn btn-danger" data-bs-target="#show-{{ $item->user->slug }}-destroy"
                    data-bs-toggle="modal">Tolak</button>
                <button class="btn btn-success" data-bs-target="#show-{{ $item->user->slug }}-confirmation"
                    data-bs-toggle="modal">Terima</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="show-{{ $item->user->slug }}-destroy" aria-hidden="true"
    aria-labelledby="show-{{ $item->user->slug }}-destroy" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="text-wrap: wrap;">
                    <h5>Yakin ingin menolak peminjaman buku oleh
                        <strong class="text-danger">{{ $item->user->name }}</strong>?
                    </h5>
                    <p>Setelah di peminjaman buku akan dihapus dari sistem.</p>
                </div>
            </div>
            <div class="modal-footer row">
                <form action="{{ route('transactions.reject', $item->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger btn-sm">OKE</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="show-{{ $item->user->slug }}-confirmation" aria-hidden="true"
    aria-labelledby="show-{{ $item->user->slug }}-confirmation" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="text-wrap: wrap;">
                    <h5>Yakin ingin menerima peminjaman buku oleh <strong
                            class="text-success">{{ $item->user->name }}</strong>
                        ?</h5>
                    <p>Setelah ini peminjaman buku akan terdaftar pada sistem.</p>
                </div>
            </div>
            <div class="modal-footer row">
                <form action="{{ route('transactions.confirmation', $item->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
                </form>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" href="#show-{{ $item->user->slug }}"
    role="button">Detail</a>
