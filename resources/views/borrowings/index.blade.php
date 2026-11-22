@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

<h2>Daftar Transaksi Peminjaman</h2>

@if (session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<a href="{{ route('borrowings.create') }}">+ Tambah Peminjaman</a>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Anggota</th>
            <th>Buku & Jumlah</th>
            <th>Tgl Pinjam</th>
            <th>Jatuh Tempo</th>
            <th>Tgl Kembali</th>
            <th>Petugas</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrowings as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->member->name }}</td>
                <td>
                    <ul>
                        @foreach ($item->details as $detail)
                            <li>{{ $detail->book->title }} ({{ $detail->quantity }} eks)</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ $item->borrowing_date }}</td>
                <td>{{ $item->due_date }}</td>
                <td>{{ $item->return_date ?? '-' }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    @if ($item->status === 'borrowed')
                        <form action="{{ route('borrowings.return', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" onclick="return confirm('Proses pengembalian buku ini?')">
                                Kembalikan
                            </button>
                        </form>
                    @else
                        <span>Selesai</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>