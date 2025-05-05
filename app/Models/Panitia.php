<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panitia extends Model
{
    use HasFactory;
    
    protected $table = 'panitia';
    
    protected $fillable = [
        'user_id',
        'nama',
        'npm',
        'email',
        'kegiatan_id',
        'divisi_id',
        'status',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
    
    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}