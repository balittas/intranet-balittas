<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen_rptp extends Model
{
    use HasFactory;
    protected $table = "dokumen_rptp";
    public $timestamps = true;
    public $incrementing = false;
    public $keyType = 'char';
    protected $fillable = ['id', 'judul', 'penanggung_jawab', 'dokumen_file'];
}
