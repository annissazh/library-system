<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $books = Book::with('category')->get();

    return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Buku";
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact ('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'  => 'required|string|min:4|max:255',
            'author' => 'required|string|min:4|max:255',
            'year'   => 'required|integer|min:1900|digits:4|max:' . date('Y'),
            'stock'  => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        Book::create($validated);

        return redirect()
        ->route('books.index')
        ->with('success','Data buku berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $title = "Detail Buku";

        return view ('books.show', compact('title', 'book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $title = "Edit Buku";
        $categories = Category::orderBy('name')->get();

        return view ('books.edit', compact('title', 'book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
        'title'  => 'required|string|min:4|max:255',
        'author' => 'required|string|min:4|max:255',
        'year'   => 'required|integer|min:1900|digits:4|max:' . date('Y'),
        'stock'  => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
    ]);
    $book->update($validated);

    return redirect()
        ->route('books.index')
        ->with('success', 'Data buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
