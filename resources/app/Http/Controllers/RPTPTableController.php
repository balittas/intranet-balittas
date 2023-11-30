<?php

namespace App\Http\Controllers;

use App\Models\Dokumen_rptp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class RPTPTableController extends Controller
{
    public function index(Request $request)
    {
        $rptp = Dokumen_rptp::all();
        return view('rptp-table', compact('rptp'));
    }
}
