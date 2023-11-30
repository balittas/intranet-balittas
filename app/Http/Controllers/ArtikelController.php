<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ArtikelController extends Controller
{
    public function article($id){
        $artikel= Artikel::find($id);
        return view('artikel',['artikel'=>$artikel]);
    }
    public function index(){
        $artikel = Artikel::paginate(6);
        return view('artikel', compact('artikel'));
    }

    public function detailartikel($id){
        $artikel= Artikel::with('dokumen')->where('slug','=',$id)->first();
        return view('detail-artikel',['artikel'=>$artikel]);
    }

    public function search(Request $request){
        $keyword = $request->search;
        $artikel = Artikel::where('judul', 'like', '%'.$keyword.'%')->paginate(5);
        return view('artikel', compact('artikel'));
    }
}
