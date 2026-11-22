@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
    <h2>Tambah Anggota Baru</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <p>
            <label>Kode Anggota:</label><br>
            <input type="text" name="member_code" value="{{ old('member_code') }}" placeholder="Contoh: MBR-001" required>
        </p>

        <p>
            <label>Nama Lengkap:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </p>

        <p>
            <label>No. Telepon:</label><br>
            <input type="text" name="phone" value="{{ old('phone') }}" required>
        </p>

        <p>
            <label>Alamat:</label><br>
            <textarea name="address" rows="3" required>{{ old('address') }}</textarea>
        </p>

        <button type="submit">Simpan Anggota</button>
        <a href="{{ route('members.index') }}">Batal</a>
    </form>
@endsection