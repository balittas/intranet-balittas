<?php

namespace App\Http\Controllers;

use App\Models\Dokumen_rdhp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class RDHPTableController extends Controller
{
    public function index(Request $request)
    {
        $rdhp = Dokumen_rdhp::all();
        return view('rdhp-table', compact('rdhp'));
    }
}
