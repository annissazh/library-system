<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // Menampilkan Daftar Buku
    public function index()
    {
        $books = [
        ['id' => 1, 'title' => 'Pemrograman PHP', 'author' => 'Budi Santoso', 'year' => 2020],
        ['id' => 2, 'title' => 'Laravel untuk Pemula', 'author' => 'Eko Kurniawan', 'year' => 2022],
        ['id' => 3, 'title' => 'Basis Data Lanjut', 'author' => 'Siti Aminah', 'year' => 2019],
        ['id' => 4, 'title' => 'Algoritma dan Pemrograman', 'author' => 'Rian Hidayat', 'year' => 2021],
        ['id' => 5, 'title' => 'Pemrograman Berorientasi Objek', 'author' => 'Deni Prasetyo', 'year' => 2023],
    ];

    $stock = 7;

    return view('books.index', compact('books', 'stock'));
    }

    public function show ($id)
    {
        return view('books.show', compact('id'));
    }
}