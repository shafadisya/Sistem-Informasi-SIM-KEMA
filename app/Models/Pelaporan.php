<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'isi',
        'status',
        'balasan',
        'admin_id',
    ];
}
