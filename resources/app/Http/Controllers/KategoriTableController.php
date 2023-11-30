<?php

namespace App\Http\Controllers;


use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class KategoriTableController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        return view('kategori-table', compact('kategori'));
    }
}
