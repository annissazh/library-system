<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Menampilkan Daftar Buku
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show ($id)
    {
        return view('books.show', compact('id'));
    }
}