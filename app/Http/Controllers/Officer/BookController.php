<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        return view('book.index', [
            'books' => Book::latest()->select('id', 'image', 'title', 'category_id')->get(),
            'categories' => Category::select('id', 'name')->get(),
            'transactions' => Transaction::where('status', 'Berjalan')
                ->orWhere('status', 'Terlambat')
                ->count()
        ]);
    }

    public function store(BookRequest $request)
    {
        $validate = $request->validated();
        $request->file('image')->getClientOriginalName();
        $validate['image'] = $request->file('image')->store('public/images');

        Book::create($validate);

        return back()->with('success', 'Proses penambahan data telah berhasil dilakukan.');
    }

    public function show($id)
    {
        return view('book.show', [
            'book' => Book::findOrFail($id),
            'categories' => Category::select('id', 'name')->get(),
            ]);
    }

    public function update(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $validate = $request->validated();

        if ($request->hasFile('image')) {

            Storage::delete($book->image);
            $request->file('image')->getClientOriginalName();
            $validate['image'] = $request->file('image')->store('public/images');
        }

        $book->update($validate);

        return back()->with('success', 'Proses perubahan data telah berhasil dilakukan.');
    }

    public function destroy($id)
    {
        $book = Book::findOrfail($id);
        $book->delete();

        Storage::delete($book->image);

        return redirect()->route('books.index')->with('success', 'Proses penghapusan data telah berhasil dilakukan.');
    }
}
