<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // Menampilkan Daftar Buku
    public function index()
    {
        $title = "Daftar Buku";
        $description = "Berikut adalah daftar buku yang tersedia";
        $books = [
            [
                'judul' => 'Pemrograman PHP untuk Pemula',
                'penulis' => 'Budi Santoso',
                'tahun_terbit' => 2021,
            ],
            [
                'judul' => 'Panduan Master Web Development',
                'penulis' => 'Siti Aminah',
                'tahun_terbit' => 2022,
            ],
            [
                'judul' => 'Tutorial Menjadi Orang Sukses',
                'penulis' => 'Andi Pratama',
                'tahun_terbit' => 2019,
            ],
            [
                'judul' => 'Panduan Hidup Sehat & Berkah',
                'penulis' => 'Rahmat Hidayat',
                'tahun_terbit' => 2020,
            ],
            [
                'judul' => 'Strategi Manajemen Keuangan',
                'penulis' => 'Dewi Lestari',
                'tahun_terbit' => 2023,
            ],
        ];

        return view('books.index', compact ('title', 'description', 'books'));
    }

    public function show ($id)
    {
        return "Detail Buku <br>" ."ID: ". $id;
    }
}