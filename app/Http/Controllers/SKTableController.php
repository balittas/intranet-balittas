<?php

namespace App\Http\Controllers;

use App\Models\SK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class SKTableController extends Controller
{
    public function index(Request $request)
    {
        $sk = SK::all();
        return view('sk-table', compact('sk'));
    }
}
