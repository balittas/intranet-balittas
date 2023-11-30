<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class KepegawaianController extends Controller
{
    public function index(Request $request)
    {
        $dokumen = DB::table('dokumen')
        ->join('kategori', 'kategori.id', '=', 'dokumen.kategori_id')
        ->select(['dokumen.judul', 'dokumen.dokumen_file', 'kategori.nama AS kategori_nama'])
        ->where('kategori.nama','=','Kepegawaian')
        ->get();
        return view('kepegawaian', compact('dokumen'));
    }
}
