@extends('admin.layouts.app')
@section('titleHeader')
Data Dokumen RPTP
@endsection
@section('subtitleHeader')
Edit Dokumen
@endsection
@section('breadcrumb')
Data Dokumen RPTP
@endsection
@section('content-wrapper')

<div class="row">
    <div class="col-sm-12" style="margin-bottom:20%">
        <div class="card">
            <div class="box-body" style="padding-bottom:50px">
                <form class="text-left border border-light p-5" action="{{route('dokumen_rptp.update', $data->id)}}" method="POST"
                    enctype="multipart/form-data" style="padding-bottom: 50px;">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Judul Dokumen RDHP</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                            </span>
                            <input type="text" class="form-control form-control-capitalize " placeholder="Judul Dokumen RDHP"
                                name="judul" value="{{$data->judul}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Penanggung Jawab</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                            </span>
                            <input type="text" class="form-control form-control-capitalize " placeholder="Penanggung Jawab"
                                name="penanggung_jawab" value="{{$data->penanggung_jawab}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>File Dokumen</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                            </span>
                            <input type="file" class="form-control form-control-capitalize " name="dokumen_file">
                        </div>
                    </div>
                    <div class="footer-buttons">
                        <a class="fixedButtonRefresh" href="{{route('dokumen_rptp.index')}}">
                            <button data-toggle="tooltip" data-placement="top" title="" type="button"
                                class="btn btn-icon btn-secondary " data-original-title="Back">
                                <i class="ik ik-arrow-left"></i>
                            </button>
                        </a>
                        <a class="fixedButtonAdd">
                            <button data-toggle="tooltip" type="submit" data-placement="top" title="" href=""
                                class="btn btn-icon btn-info" data-original-title="Save">
                                <i class="ik ik-save"></i>
                            </button>
                        </a>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>

@endsection
@section('fixedButton')

@endsection
