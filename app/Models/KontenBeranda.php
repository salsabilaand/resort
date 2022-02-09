<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenBeranda extends Model
{
    use HasFactory;
    protected $table = "konten_berandas";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'judul_konten', 'deskripsi_konten', 'image'
    ];
}
