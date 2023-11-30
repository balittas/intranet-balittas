<?php

namespace App\Http\Controllers;

use App\Models\SK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class SKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('s_k_s')
                ->select(['s_k_s.id', 's_k_s.nomor_sk', 's_k_s.perihal', 's_k_s.dokumen_file']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<td class="dropdown"><div class="ik ik-more-vertical dropdown-toggle" data-toggle="dropdown"></div><ul class="dropdown-menu" role="menu"><a class="dropdown-item" href="' . url('admin-page/sk/' . $data->id . '/edit') . '"><li> <i class="ik ik-edit" style="color: green;font-size:16px;padding-right:5px"></i><span style="font-size:14px"> Edit</span></li></a><a class="dropdown-item delete" href="#" data-toggle="modal"
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
        return view('admin.sk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sk.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new SK();
        $table->id = Str::random(10);
        $table->nomor_sk = $request->nomor_sk;
        $table->perihal = $request->perihal;

        $dokumen_name = 'sk' . Str::random(10) . '.' . $request->dokumen_file->getClientOriginalExtension();
        $request->dokumen_file->move(public_path('images'), $dokumen_name);
        $table->dokumen_file = 'images/' . $dokumen_name;

        $table->save();
        return redirect()->route('sk.index');
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
        $data = SK::find($id);
        return view('admin.sk.edit', compact('data'));
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
        $table = SK::find($id);
        $table->nomor_sk = $request->nomor_sk;
        $table->perihal = $request->perihal;
        if (!empty($request->dokumen_file)) {
            $dokumen_name = 'sk' . Str::random(10) . '.' . $request->dokumen_file->getClientOriginalExtension();
            $request->dokumen_file->move(public_path('images'), $dokumen_name);
            $table->dokumen_file = 'images/' . $dokumen_name;
        } else {
            $table->dokumen_file = $table->dokumen_file;
        }
        $table->save();
        return redirect()->route('sk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $table = SK::find($request->id);
        $table->delete();
        return redirect()->route('sk.index');
    }
}
