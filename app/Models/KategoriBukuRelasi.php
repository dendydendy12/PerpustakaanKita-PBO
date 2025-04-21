<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriBukuRelasi extends Model
{
    use HasFactory, SoftDeletes;
    //
    protected $table = 'kategori_buku_relasis';

    protected $fillable = ['buku_id', 'kategori_id'];

    //relasi ke buku
    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class);
    }

    //relasi ke kategori
    public function kategori (): BelongsTo
    {
        return $this->belongsTo(KategoriBuku::class);
    }


}
