<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranPanitia extends Model
{
    protected $table = 'pendaftaran_panitia';

    protected $fillable = [
        'user_id',
        'kegiatan_id',
        'nama',
        'npm',
        'no_wa',
        'divisi',
        'role',
        'panitia'
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
}
