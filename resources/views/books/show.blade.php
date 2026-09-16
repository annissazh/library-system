@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h2>Detail Buku</h2>
    <p>ID Buku: <strong>{{ $id }}</strong></p>
    <a href="/books">&laquo; Kembali ke Daftar Buku</a>
@endsection