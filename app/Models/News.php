<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // Menambahkan kolom-kolom yang bisa diisi massal
    protected $fillable = [
        'title',
        'description',
        'link',
    ];
}
