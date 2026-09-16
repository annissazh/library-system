<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $title = "Library System Dashboard";
        $description = "Selamat datang di Sistem Informasi Perpustakaan Sederhana.";
        $totalBooks = 8;
        $totalCategories = 5;
        $totalMembers = 5;
        return view('dashboard.index', compact ('title', 'description', 'jumlahBuku', 'jumlahMember'));
    }
}
