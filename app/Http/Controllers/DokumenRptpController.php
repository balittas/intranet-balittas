<?php

namespace App\Http\Controllers;

use App\Models\Dokumen_rptp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class DokumenRptpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('dokumen_rptp')
                ->select(['dokumen_rptp.id', 'dokumen_rptp.judul', 'dokumen_rptp.penanggung_jawab', 'dokumen_rptp.dokumen_file']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<td class="dropdown"><div class="ik ik-more-vertical dropdown-toggle" data-toggle="dropdown"></div><ul class="dropdown-menu" role="menu"><a class="dropdown-item" href="' . url('dokumen_rptp/' . $data->id . '/edit') . '"><li> <i class="ik ik-edit" style="color: green;font-size:16px;padding-right:5px"></i><span style="font-size:14px"> Edit</span></li></a><a class="dropdown-item delete" href="#" data-toggle="modal"
                    data-target="#exampleModal" data-id=' . $data->id . '><li><i class="ik ik-trash-2" style="color: red;font-size:16px;padding-right:5px"></i><span style="font-size:14px"> Hapus</span></li></a></ul></td>';
                    return $btn;
                })
                ->addColumn('dokumen_file', function ($data) {
                    $btn = '<td><a href=' . $data->dokumen_file . ' style="color:#0000D7">Lihat Dokumen</a></td>';
                    return $btn;
                })
                ->rawColumns(['action', 'dokumen_file'])
                ->make(true);
        }
        return view('admin.dokumen_rptp.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dokumen_rptp.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Dokumen_rptp();
        $table->id = Str::random(10);
        $table->judul = $request->judul;
        $table->penanggung_jawab = $request->penanggung_jawab;

        $dokumen_name = 'dokumen_rptp' . Str::random(10) . '.' . $request->dokumen_file->getClientOriginalExtension();
        $request->dokumen_file->move(public_path('images'), $dokumen_name);
        $table->dokumen_file = 'images/' . $dokumen_name;

        $table->save();
        return redirect()->route('dokumen_rptp.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokumen_rptp  $dokumen_rptp
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokumen_rptp  $dokumen_rptp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dokumen_rptp::find($id);
        return view('admin.dokumen_rptp.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokumen_rptp  $dokumen_rptp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $table = Dokumen_rptp::find($id);
        $table->judul = $request->judul;
        $table->penanggung_jawab = $request->penanggung_jawab;
        if (!empty($request->dokumen_file)) {
            $dokumen_name = 'dokumen_rptp' . Str::random(10) . '.' . $request->dokumen_file->getClientOriginalExtension();
            $request->dokumen_file->move(public_path('images'), $dokumen_name);
            $table->dokumen_file = 'images/' . $dokumen_name;
        } else {
            $table->dokumen_file = $table->dokumen_file;
        }
        $table->save();
        return redirect()->route('dokumen_rptp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokumen_rptp  $dokumen_rptp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Dokumen_rptp::find($id);
        $table->delete();
        return redirect()->route('dokumen_rptp.index');
    }
}
