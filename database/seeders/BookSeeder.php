<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::truncate();

        $books = [
            [
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'year' => 2005,
                'stock' => 12,
            ],
            [
                'title' => 'Bumi',
                'author' => 'Tere Liye',
                'year' => 2014,
                'stock' => 8,
            ],
            [
                'title' => 'Cantik Itu Luka',
                'author' => 'Eka Kurniawan',
                'year' => 2002,
                'stock' => 5,
            ],
            [
                'title' => 'Filosofi Teras',
                'author' => 'Henry Manampiring',
                'year' => 2018,
                'stock' => 15,
            ],
            [
                'title' => 'Laut Bercerita',
                'author' => 'Leila S. Chudori',
                'year' => 2017,
                'stock' => 10,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
