<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;

class BorrowingController extends Controller
{
    // Menampilkan daftar seluruh transaksi peminjaman
    public function index()
    {
        $borrowings = Borrowing::with(['member', 'user', 'details.book'])->latest()->get();
        return view('borrowings.index', compact('borrowings'));
    }

    // Menampilkan form transaksi peminjaman baru
    public function create()
    {
        $members = Member::all();
        $books   = Book::where('stock', '>', 0)->get(); // Hanya tampilkan buku yang stoknya tersedia
        return view('borrowings.create', compact('members', 'books'));
    }

    // Menyimpan transaksi peminjaman & mengurangi stok buku
    public function store(Request $request)
    {
        // 1. Validasi input form
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id'   => 'required|exists:books,id',
            'quantity'  => 'required|integer|min:1',
        ]);

        // 2. Periksa ketersediaan stok buku
        $book = Book::findOrFail($request->book_id);

        if ($book->stock < $request->quantity) {
            return back()
                ->withErrors(['quantity' => 'Stok buku tidak mencukupi.'])
                ->withInput();
        }

        // 3. Catat transaksi utama peminjaman
        $borrowing = Borrowing::create([
            'user_id'        => auth()->id(),
            'member_id'      => $request->member_id,
            'borrowing_date' => now()->toDateString(),
            'due_date'       => now()->addDays(7)->toDateString(),
            'status'         => 'borrowed',
        ]);

        // 4. Catat detail buku yang dipinjam
        $borrowing->details()->create([
            'book_id'  => $book->id,
            'quantity' => $request->quantity,
        ]);

        // 5. Kurangi stok buku
        $book->decrement('stock', $request->quantity);

        return redirect()->route('borrowings.index')
            ->with('success', 'Transaksi peminjaman berhasil disimpan.');
    }

    // Memproses pengembalian buku & mengembalikan stok
    public function returnBook(Borrowing $borrowing)
    {
        // Cegah pengembalian ganda jika status sudah returned
        if ($borrowing->status === 'returned') {
            return back()->with('error', 'Transaksi ini sudah dikembalikan sebelumnya.');
        }

        // 1. Perbarui tanggal kembali dan status transaksi
        $borrowing->update([
            'return_date' => now()->toDateString(),
            'status'      => 'returned',
        ]);

        // 2. Tambah kembali stok buku sesuai jumlah yang dipinjam
        foreach ($borrowing->details as $detail) {
            $detail->book->increment('stock', $detail->quantity);
        }

        return redirect()->route('borrowings.index')
            ->with('success', 'Buku berhasil dikembalikan dan stok telah diperbarui.');
    }
}
