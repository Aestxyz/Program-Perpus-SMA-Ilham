<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function waiting()
    {
        $waiting = Transaction::where('status', 'Menunggu')
            ->orderBy('updated_at', 'DESC')
            ->get();


        return view('transaction.table.waiting', [
            'waiting' => $waiting,
        ]);
    }
    public function walking()
    {
        $walking = Transaction::whereIn('status', ['Berjalan', 'Terlambat'])
            ->orderBy('updated_at', 'DESC')
            ->get();

        $borrow_date = Carbon::now()->format('Y-m-d');

        $return_date = Carbon::now()->addDays(7)->format('Y-m-d');

        $users = User::whereRole('Anggota')->select('id', 'name')->get();
        $books = Book::get();

        return view('transaction.table.walking', [
            'walking' => $walking,
            'borrow_date' => $borrow_date,
            'return_date' => $return_date,
            'users' => $users,
            'books' => $books,
        ]);
    }
    public function completed()
    {
        $completed = Transaction::where('status', 'Selesai')
            ->orderBy('updated_at', 'DESC')
            ->get();

        $borrow_date = Carbon::now()->format('Y-m-d');

        $return_date = Carbon::now()->addDays(7)->format('Y-m-d');

        $users = User::whereRole('Anggota')->select('id', 'name')->get();
        $books = Book::get();

        return view('transaction.table.completed', [
            'completed' => $completed,
            'borrow_date' => $borrow_date,
            'return_date' => $return_date,
            'users' => $users,
            'books' => $books,
        ]);
    }

    public function store(TransactionRequest $request)
    {
        $validate = $request->validated();

        $transaction = Transaction::where('user_id', $request->user_id)
            ->where(function ($query) {
                $query->where('status', 'Berjalan')
                    ->orWhere('status', 'Terlambat');
            })->orWhere(function ($query) {
                $query->where('status', 'Berjalan')
                    ->Where('status', 'Terlambat');
            })
            ->count();


        if ($transaction >= 3) {
            return back()->with('warning', 'Peminjaman melebihi batas yang telah ditentukan 😀');
        } else {
            $book = Book::find($request->book_id);
            $book->book_count -= 1;
            $book->save();

            $user = User::findOrFail($request->user_id);

            $validate['code'] = $user->slug . '-' . Str::random(10);

            Transaction::create($validate);

            return back()->with('success', 'Proses penambahan data telah berhasil dilakukan.');
        }
    }

    public function confirmation(Request $request, $id)
    {
        $validate = $request->validate([
            'status' => 'required|string',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date',
        ]);

        $transaction = Transaction::findOrfail($id);

        $transaction->update($validate);

        return back()->with('success', 'Proses penambahan data peminjaman dan pengembalian buku berhasil telah berhasil dilakukan.');
    }
    public function finished($id)
    {
        $transaction = Transaction::findOrfail($id);

        $transaction->update([
            'status' => 'Selesai',
            'return_date' => Carbon::now()->format('Y-m-d'),
        ]);

        $book = Book::findOrfail($transaction->book->id);
        $book->book_count++;
        $book->save();

        return back()->with('success', 'Proses peminjaman dan pengembalian buku telah selesai dilakukan.');
    }

    public function reject($id)
    {
        $transaction = Transaction::findOrfail($id);

        $transaction->update([
            'status' => 'Tolak',
            'borrow_date' => null,
            'return_date' => null,
        ]);

        $book = Book::findOrfail($transaction->book->id);
        $book->book_count++;
        $book->save();

        return back()->with('success', 'Proses peminjaman dan pengembalian buku berhasil di tolak.');
    }

    public function extratime($id)
    {
        $transaction = Transaction::findOrfail($id);

        $transaction->update([
            'status' => 'Berjalan',
            'return_date' => Carbon::parse($transaction->return_date)
                ->addDays(7)
                ->format('Y-m-d'),
        ]);

        return back()->with('success', 'Proses perpanjangan waktu peminjaman dan pengembalian buku telah dilakukan.');
    }

    public function update(TransactionRequest $request, $id)
    {
        $validate = $request->validated();

        $transaction = Transaction::findOrFail($id);

        // Check if there are changes in the books
        if ($request->book_id != $transaction->book->id) {
            // Increase book_count for the books that were previously associated
            Book::where('id', $transaction->book->id)->increment('book_count');

            // Decrease book_count for the newly selected books
            Book::where('id', $request->book_id)->decrement('book_count');
        }

        // Update the transaction with the validated data
        $transaction->update($validate);

        return back()->with('success', 'Proses perubahan data peminjaman dan pengembalian buku telah dilakukan.');
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        $users = User::whereRole('Anggota')->select('id', 'name')->get();
        $books = Book::get();

        return view(
            'transaction.show',
            compact('transaction', 'users', 'books')
        );
    }
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);

        Book::where('id', $transaction->book->id)->increment('book_count');

        $transaction->delete();

        return redirect()->route('transactions.walking')->with('success', 'Proses penghapusan data telah berhasil dilakukan.');
    }
}
