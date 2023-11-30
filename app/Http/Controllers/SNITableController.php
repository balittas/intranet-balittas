<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SNITableController extends Controller
{
    public function index()
    {
        $dokumen = DB::table('dokumen')
        ->join('kategori', 'kategori.id', '=', 'dokumen.kategori_id')
        ->select(['dokumen.id', 'dokumen.judul', 'dokumen.dokumen_file', 'kategori.nama AS kategori_nama'])
        ->where('kategori.nama', '=' , 'Dokumen SNI')
        ->get();
        return view('sni', compact('dokumen'));
    }
}