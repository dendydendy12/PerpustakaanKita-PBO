<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;


class FrontController extends Controller
{
    public function book()
    {
        $bukus = Buku::all(); // Ambil semua buku dari database
        return view('front.book', compact('bukus')); // Kirim data ke view
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_kembali' => 'required|date'
        ]);

        $buku = Buku::findOrFail($request->buku_id);

        if ($buku->stok_buku > 0) {
            Peminjaman::create([
                // 'user_id' => auth()->id(),
                'buku_id' => $buku->id,
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => $request->tanggal_kembali,
                'status' => 'Dipinjam'
            ]);

            $buku->decrement('stok_buku');
            return response()->json(['message' => 'Buku berhasil dipinjam!']);
        }

        return response()->json(['message' => 'Stok buku habis!'], 400);
    }

    public function returnBook($id)
    {
        $peminjaman = Peminjaman::where('id', $id)->where('status', 'Dipinjam')->firstOrFail();
        $peminjaman->update(['status' => 'Dikembalikan']);

        $peminjaman->buku->increment('stok_buku');

        return response()->json(['message' => 'Buku berhasil dikembalikan!']);
    }
}
