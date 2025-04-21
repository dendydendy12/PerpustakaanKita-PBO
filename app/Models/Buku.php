<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class Buku extends Model
{
    use HasFactory , SoftDeletes;


    //tabel yang dipakai
    protected $table = 'bukus';

    //mis assignment
    protected $fillable = ['judul','cover', 'penulis', 'penerbit','kategori_id','stok_buku', 'tahun_terbit'];



    public function KategoriBuku (): BelongsTo
    {
        return $this->belongsTo(KategoriBuku::class, 'kategori_id');
    }

    //relasi ke kategori buku
    public function kategoriRelasi(): HasMany
     {
        return $this->hasMany(KategoriBukuRelasi::class);
    }

}