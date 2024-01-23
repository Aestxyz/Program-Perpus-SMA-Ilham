<!-- Modal trigger button -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal"
    data-bs-target="#destroy-{{ Str::slug($book->title) }}">
    Hapus
</button>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="destroy-{{ Str::slug($book->title) }}" tabindex="-1" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h4 class="text-wrap">Yakin ingin menghapus data buku <span
                        class="text-danger">{{ $book->title }}</span>?</h4>
                <p class="text-wrap">Penghapusan data akan mempengaruhi data-data lainnya. Pastikan untuk
                    memikirkannya terlebih dahulu sebelum penghapusan data terjadi.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('books.destroy', $book->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
