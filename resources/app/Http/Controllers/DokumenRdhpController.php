<?php

namespace App\Http\Controllers;

use App\Models\Dokumen_rdhp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class DokumenRdhpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('dokumen_rdhp')
                ->select(['dokumen_rdhp.id', 'dokumen_rdhp.judul', 'dokumen_rdhp.penanggung_jawab', 'dokumen_rdhp.dokumen_file']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<td class="dropdown"><div class="ik ik-more-vertical dropdown-toggle" data-toggle="dropdown"></div><ul class="dropdown-menu" role="menu"><a class="dropdown-item" href="' . url('admin-page/dokumen_rdhp/' . $data->id . '/edit') . '"><li> <i class="ik ik-edit" style="color: green;font-size:16px;padding-right:5px"></i><span style="font-size:14px"> Edit</span></li></a><a class="dropdown-item delete" href="#" data-toggle="modal"
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
        return view('admin.dokumen_rdhp.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dokumen_rdhp.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Dokumen_rdhp();
        $table->id = Str::random(10);
        $table->judul = $request->judul;
        $table->penanggung_jawab = $request->penanggung_jawab;

        $dokumen_name = 'dokumen_rdhp' . Str::random(10) . '.' . $request->dokumen_file->getClientOriginalExtension();
        $request->dokumen_file->move(public_path('images'), $dokumen_name);
        $table->dokumen_file = 'images/' . $dokumen_name;

        $table->save();
        return redirect()->route('dokumen_rdhp.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokumen_rdhp  $dokumen_rdhp
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokumen_rdhp  $dokumen_rdhp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dokumen_rdhp::find($id);
        return view('admin.dokumen_rdhp.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokumen_rdhp  $dokumen_rdhp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $table = Dokumen_rdhp::find($id);
        $table->judul = $request->judul;
        $table->penanggung_jawab = $request->penanggung_jawab;
        if (!empty($request->dokumen_file)) {
            $dokumen_name = 'dokumen_rdhp' . Str::random(10) . '.' . $request->dokumen_file->getClientOriginalExtension();
            $request->dokumen_file->move(public_path('images'), $dokumen_name);
            $table->dokumen_file = 'images/' . $dokumen_name;
        } else {
            $table->dokumen_file = $table->dokumen_file;
        }
        $table->save();
        return redirect()->route('dokumen_rdhp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokumen_rdhp  $dokumen_rdhp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $table = Dokumen_rdhp::find($request->id);
        $table->delete();
        return redirect()->route('dokumen_rdhp.index');
    }
}
