<x-auth.layout>
    <x-slot name="title">Laporan Buku Perpustakaan</x-slot>
    @include('layouts.report')
    <div class="card">
        <div class="card-body table-responsive">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>ISBN</th>
                        <th>Penulis</th>
                        <th>Tahun Publis</th>
                        <th>Penerbit</th>
                        <th>Stok Buku</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $no => $book)
                        <tr>
                            <td>{{ ++$no }}.</td>
                            <td>{{ Str::limit($book->title, 30, '...') }}</td>
                            <td>{{ Str::limit($book->category->name, 20, '...') }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>{{ Str::limit($book->author, 20, '...') }}</td>
                            <td>{{ $book->year_published }}</td>
                            <td>{{ Str::limit($book->publisher, 30, '...') }}</td>
                            <td>{{ $book->book_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-auth.layout>
