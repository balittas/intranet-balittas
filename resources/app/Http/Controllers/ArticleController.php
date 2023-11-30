<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\ArtikelKategori;
use App\Models\Dokumen;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('artikel')
                ->leftJoin('kategori_artikel', 'artikel.kategori_artikel_id', '=', 'kategori_artikel.id')
                ->select(['artikel.id', 'artikel.judul', 'artikel.gambar', 'artikel.konten', 'kategori_artikel.nama AS kategori_nama']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<td class="dropdown"><div class="ik ik-more-vertical dropdown-toggle" data-toggle="dropdown"></div><ul class="dropdown-menu" role="menu"><a class="dropdown-item" href="' . url('admin-page/article/' . $data->id . '/edit') . '"><li> <i class="ik ik-edit" style="color: green;font-size:16px;padding-right:5px"></i><span style="font-size:14px"> Edit</span></li></a><a class="dropdown-item delete" href="#" data-toggle="modal"
                    data-target="#exampleModal" data-id=' . $data->id . '><li><i class="ik ik-trash-2" style="color: red;font-size:16px;padding-right:5px"></i><span style="font-size:14px"> Hapus</span></li></a></ul></td>';
                    return $btn;
                })
                // ->addColumn('dokumen_file', function ($data) {
                //     $btn = '<td><a href=' . $data->dokumen_file . ' style="color:#0000D7">Lihat Dokumen</a></td>';
                //     return $btn;
                // })
                ->addColumn('gambar', function ($data) {
                    $btn = '<td><a href=' . url($data->gambar) . ' target="_blank" style="color:#0000D7">Lihat Gambar</a></td>';
                    return $btn;
                })
                ->rawColumns(['action', 'gambar',])
                ->make(true);
        }
        return view('admin.article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $artikel_kategori = ArtikelKategori::all();
        $dokumen = Dokumen::all();
        return view('admin.article.add', compact('kategori', 'dokumen', 'artikel_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Artikel();
        $table->id = Str::random(10);
        $table->dokumen_id = $request->dokumen_id;
        $table->kategori_artikel_id = $request->kategori_artikel_id;
        $table->judul = $request->judul;
        $table->konten = $request->konten;
        $table->slug = Str::slug($request->judul);

        $dokumen_name = 'gambar' . Str::random(10) . '.' . $request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('images'), $dokumen_name);
        $table->gambar = 'images/' . $dokumen_name;

        $table->save();
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = ArtikelKategori::all();
        $dokumen = Dokumen::all();
        $data = Artikel::find($id);
        return view('admin.article.edit', compact('data', 'kategori', 'dokumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $table = Artikel::find($id);
        $table->dokumen_id = $request->dokumen_id;
        $table->kategori_artikel_id = $request->kategori_artikel_id;
        $table->judul = $request->judul;
        $table->konten = $request->konten;
        $table->slug = Str::slug($request->judul);

        if (!empty($request->gambar)) {
            $dokumen_name = 'gambar' . Str::random(10) . '.' . $request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('images'), $dokumen_name);
            $table->gambar = 'images/' . $dokumen_name;
        } else {
            $table->gambar = $table->gambar;
        }
        $table->save();

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $table = Artikel::find($request->id);
        $table->delete();
        return redirect()->route('article.index');
    }
}
