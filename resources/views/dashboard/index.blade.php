@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>{{ $title }}</h2>
    <p>{{ $description }}</p>

    <h3>Statistik Perpustakaan</h3>
    <ul>
        <li>Total Buku: {{ $totalBooks }}</li>
        <li>Total Kategori: {{ $totalCategories }}</li>
        <li>Total Member: {{ $totalMembers }}</li>
    </ul>
@endsection