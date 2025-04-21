<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Peminjaman extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'peminjamans';

    protected $fillable = ['user_id', 'buku_id', 'tanggal_peminjaman', 'tanggal_pengembalian', 'status_peminjaman'];

    //relasi ke model Buku

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class);
    }

    //relasi ke model user (misal user pinjam buku)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function returnBook(): void
    {
    $this->tanggal_pengembalian = now();
    $this->save();
    }
}
