<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'sertifikat';

    protected $fillable = ['nama_kegiatan', 'file', 'tanggal_terbit'];
}
