<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class KategoriBuku extends Model
{
    use HasFactory, SoftDeletes;
    //tabel
    protected $table = 'kategori_bukus';

    //miss
    protected $fillable = ['nama_kategori', 'icon'];

    //relasi kategori
    public function kategoriRelasi (): HasMany{
        return $this->hasMany(KategoriBukuRelasi::class);
    }

    public function buku (): HasMany
    {
        return $this->hasMany(Buku::class);
    }
}
