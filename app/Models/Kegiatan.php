<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    // Jika tabel kamu bernama 'kegiatans', tidak perlu apa-apa.
    // Jika tabel kamu bernama 'kegiatan' (singular), tambahkan:
    // protected $table = 'kegiatan';

    protected $fillable = [
        'judul',
        'deskripsi',
        // ...field lain jika ada...
    ];
}
