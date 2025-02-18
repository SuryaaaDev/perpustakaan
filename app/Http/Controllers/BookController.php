<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('types')->get(); //types ambil dari model/book function types
        return view('book.index', compact('books'));
    }

    public function create()
    {
        $types = Type::all();
        return view('book.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required',
            'types' => 'required|array',
            'types.*' => 'exists:types,id', // Validasi bahwa ID tipe ada di tabel types
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2024',
        ]);
        
        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('uploads', 'public');
        } else {
            $imagePath = null;
        }

        $book = Book::create([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'year' => $validated['year'],
            'image' => $imagePath,
        ]);
        $book->types()->attach($request->types);

        return redirect()->route('book.index');
    }

    public function edit($id)
    {
        $types = Type::all();
        $book = Book::find($id);
        return view('book.edit', compact('book', 'types'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required',
            'types' => 'required|array',
            'types.*' => 'exists:types,id', // Validasi bahwa ID tipe ada di tabel types
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2024',
        ]);

        if($request->hasFile('image')){
            if($book->image){
                Storage::delete(['public/' . $book->image]);
            }

            $imagePath = $request->file('image')->store('uploads', 'public');
            $validated['image'] = $imagePath;
        }

        $book->update($validated);
        $book->types()->sync($validated['types']);
        return redirect()->route('book.index');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('book.index');
    }
}
