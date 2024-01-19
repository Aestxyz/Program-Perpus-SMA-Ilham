<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Penalty;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $onTransactions = Transaction::where('status', 'Berjalan')->count();
        $books = Book::count();
        $members = User::where('role', 'Anggota')
            ->whereNotNull('email_verified_at')
            ->count();

        $penalties = Penalty::get();
        $total = 0;

        foreach ($penalties as $penalty) {
            $total += $penalty->amount;
        }

        $transactions = Transaction::get();
        return view('home', compact(
            'onTransactions',
            'books',
            'members',
            'total',
            'transactions'
        ));
    }
}
