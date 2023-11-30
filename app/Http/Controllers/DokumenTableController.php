<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class DokumenTableController extends Controller
{
    public function index(Request $request)
    {
        $dokumen = DB::table('dokumen')
        ->join('kategori', 'kategori.id', '=', 'dokumen.kategori_id')
        ->select(['dokumen.id', 'dokumen.judul', 'dokumen.dokumen_file', 'kategori.nama AS kategori_nama'])
        ->get();
        return view('dokumen-table', compact('dokumen'));
    }
}
