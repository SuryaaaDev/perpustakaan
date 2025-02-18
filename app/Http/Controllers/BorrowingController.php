<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function borrowingBook()
    {
        $user = auth()->user();
        $borrowedBooks = $user->book;
        return view('borrowing.borrowings', compact('borrowedBooks'));
    }

    public function borrowingDestroy($id) {
        $user = auth()->user();
        $user->book()->detach($id);
        return redirect()->route('borrowing.index');
    }
}
