<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UlasanBuku extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $table = 'ulasan_bukus';

    protected $fillable = ['user_id', 'buku_id', 'ulasan', 'rating'];

    //relasi ke buku yaa
    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class);
    }

    //relasi ke user ya
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}