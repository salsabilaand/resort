<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $table = "kamar";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'jenis_kamar', 'image', 'tipe_kamar', 'harga', 'deskripsi'
    ];
}