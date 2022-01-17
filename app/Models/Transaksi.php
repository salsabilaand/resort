<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'kamar_id', 'harga', 'nama', 'telepon', 'email', 'tgl_masuk', 'tgl_keluar', 'jml_tamu', 'catatan'
    ];

    public function kamar(){
        return $this->belongsTo(Kamar::class);
    }
}
