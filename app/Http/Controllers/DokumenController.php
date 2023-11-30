<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use PhpOffice\PhpSpreadsheet\Reader\Xls\RC4;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('dokumen')
                ->join('kategori', 'kategori.id', '=', 'dokumen.kategori_id')
                ->select(['dokumen.id', 'dokumen.judul', 'dokumen.dokumen_file', 'kategori.nama AS kategori_nama']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<td class="dropdown"><div class="ik ik-more-vertical dropdown-toggle" data-toggle="dropdown"></div><ul class="dropdown-menu" role="menu"><a class="dropdown-item" href="' . url('dokumen/' . $data->id . '/edit') . '"><li> <i class="ik ik-edit" style="color: green;font-size:16px;padding-right:5px"></i><span style="font-size:14px"> Edit</span></li></a><a class="dropdown-item delete" href="#" data-toggle="modal"
                    data-target="#exampleModal" data-id=' . $data->id . '><li><i class="ik ik-trash-2" style="color: red;font-size:16px;padding-right:5px"></i><span style="font-size:14px"> Hapus</span></li></a></ul></td>';
                    return $btn;
                })
                ->addColumn('dokumen_file', function ($data) {
                    $btn = '<td><a href=' . url($data->dokumen_file) . ' style="color:#0000D7">Lihat Dokumen</a></td>';
                    return $btn;
                })
                ->rawColumns(['action', 'dokumen_file'])
                ->make(true);
        }
        return view('admin.dokumen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.dokumen.add', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Dokumen();
        $table->id = Str::random(10);
        $table->judul = $request->judul;
        $table->kategori_id = $request->kategori_id;

        if ($request->dokumen_file == null) {
            $table->dokumen_file = $request->dokumen_link;
        } else if ($request->dokumen_link == null) {
            $dokumen_name = 'dokumen' . Str::random(10) . '.' . $request->dokumen_file->getClientOriginalExtension();
            $request->dokumen_file->move(public_path('images'), $dokumen_name);
            $table->dokumen_file = 'images/' . $dokumen_name;
        }

        $table->save();
        return redirect()->route('dokumen.index');
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
        $kategori = Kategori::all();
        $data = Dokumen::find($id);
        return view('admin.dokumen.edit', compact('data', 'kategori'));
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
        $table = Dokumen::find($id);
        $table->judul = $request->judul;
        $table->kategori_id = $request->kategori_id;

        if ($request->dokumen_file == null) {
            if ($request->dokumen_link == null) {
                $table->dokumen_file = $table->dokumen_file;
            } else {
                $table->dokumen_file = $request->dokumen_link;
            }
        } else if ($request->dokumen_link == null) {
            if (!empty($request->dokumen_file)) {
                $dokumen_name = 'dokumen' . Str::random(10) . '.' . $request->dokumen_file->getClientOriginalExtension();
                $request->dokumen_file->move(public_path('images'), $dokumen_name);
                $table->dokumen_file = 'images/' . $dokumen_name;
            } else {
                $table->dokumen_file = $table->dokumen_file;
            }
        }


        $table->save();
        return redirect()->route('dokumen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $table = Dokumen::find($request->id);
        $table->delete();
        return redirect()->route('dokumen.index');
    }

    public function getDokumen(Request $request)
    {
        $data = Dokumen::where('kategori_id', '=', $request->id_dokumen)->get();
        return response()->json($data);
    }
}
