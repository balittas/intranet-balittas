<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProposalTableController extends Controller
{
    public function index()
    {
        $dokumen = DB::table('dokumen')
            ->join('kategori', 'kategori.id', '=', 'dokumen.kategori_id')
            ->select(['dokumen.id', 'dokumen.judul', 'dokumen.dokumen_file', 'kategori.nama AS kategori_nama'])
            ->where('kategori.nama', '=', 'Format Proposal')
            ->get();
        return view('format-proposal', compact('dokumen'));
    }
}
