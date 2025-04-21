<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class KoleksiPribadi extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'koleksi_pribadis';

    protected $fillable = ['user_id', 'buku_id'];

    public function user (): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function buku (): BelongsTo
    {
        return$this->belongsTo(Buku::class);
    }


}