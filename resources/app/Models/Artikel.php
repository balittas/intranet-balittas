<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = "artikel";
    public $timestamps = true;
    public $incrementing = false;
    public $keyType = 'char';
    protected $fillable = ['id', 'judul', 'konten', 'gambar', 'slug', 'kategori_artikel_id', 'dokumen_id'];

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class);
    }
}
