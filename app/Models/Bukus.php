<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukus extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'thn_terbit',
        'image',
        'kategori_id',
        'penerbit_id',
        'rak_id'
    ];
    
    public function kategori()
    {
        return $this->belongsTo(Kategoris::class, 'kategori_id', 'id');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbits::class, 'penerbit_id', 'id');
    }

    public function rak_buku()
    {
        return $this->belongsTo(RakBuku::class, 'rak_id', 'id');
    }
}
