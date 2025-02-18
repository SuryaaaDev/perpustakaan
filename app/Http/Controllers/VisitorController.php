<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function visitorIndex()
    {
        $books = Book::all();
        return view('visitor.index', compact('books'));
    }

    public function visitorBorrow(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $user = Auth::user();
        $book = Book::findOrFail($request->book_id);

        Borrowing::create([
            'book_id' => $book->id,
            'user_id' => $user->id,
            'borrowed_at' => now()->format('Y-m-d'),
        ]);

        return redirect()->route('borrowing.index');
    }
}
