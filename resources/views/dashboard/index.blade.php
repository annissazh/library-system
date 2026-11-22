@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>Dashboard Sistem Informasi Perpustakaan</h2>

    <div style="display: flex; gap: 16px; flex-wrap: wrap; margin-top: 20px;">
        
        {{-- Kartu Total Kategori --}}
        <a href="{{ route('categories.index') }}" style="text-decoration: none; color: inherit;">
            <div style="border: 1px solid #ccc; padding: 16px; min-width: 150px; cursor: pointer;">
                <h4>Total Kategori</h4>
                <p style="font-size: 24px; font-weight: bold;">{{ $totalCategories }}</p>
                <small>Lihat Kategori &rarr;</small>
            </div>
        </a>

        {{-- Kartu Total Buku --}}
        <a href="{{ route('books.index') }}" style="text-decoration: none; color: inherit;">
            <div style="border: 1px solid #ccc; padding: 16px; min-width: 150px; cursor: pointer;">
                <h4>Total Buku</h4>
                <p style="font-size: 24px; font-weight: bold;">{{ $totalBooks }}</p>
                <small>Lihat Buku &rarr;</small>
            </div>
        </a>

        {{-- Kartu Total Anggota --}}
        <a href="{{ route('members.index') }}" style="text-decoration: none; color: inherit;">
            <div style="border: 1px solid #ccc; padding: 16px; min-width: 150px; cursor: pointer;">
                <h4>Total Anggota</h4>
                <p style="font-size: 24px; font-weight: bold;">{{ $totalMembers }}</p>
                <small>Lihat Anggota &rarr;</small>
            </div>
        </a>

        {{-- Kartu Total Transaksi --}}
        <a href="{{ route('borrowings.index') }}" style="text-decoration: none; color: inherit;">
            <div style="border: 1px solid #ccc; padding: 16px; min-width: 150px; cursor: pointer;">
                <h4>Total Transaksi</h4>
                <p style="font-size: 24px; font-weight: bold;">{{ $totalBorrowings }}</p>
                <small>Lihat Peminjaman &rarr;</small>
            </div>
        </a>

        {{-- Kartu Sedang Dipinjam --}}
        <a href="{{ route('borrowings.index') }}" style="text-decoration: none; color: inherit;">
            <div style="border: 1px solid #ccc; padding: 16px; min-width: 150px; cursor: pointer;">
                <h4>Sedang Dipinjam</h4>
                <p style="font-size: 24px; font-weight: bold;">{{ $activeBorrowings }}</p>
                <small>Cek Transaksi Aktif &rarr;</small>
            </div>
        </a>

    </div>
@endsection