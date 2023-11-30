<!doctype html>

@extends('user.layouts.app')

<body>

    @section('header')

	<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="dataTable" class="table table-striped table-bordered nowrap" style="width: 102%">
                                <thead>
                                    <tr>
                                        <th colspan="3">Daftar Keputusan Kepala Balai Pengujian Standar Instrumen Tanaman Pemanis dan Serat</th>
                                    </tr>
                                    <tr>
                                        <th>Nomor SK</th>
                                        <th>Perihal</th>
                                        <th>Dokumen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sk as $sk)
                                    <tr>
                                        <td>
                                            <span>{{ $sk -> nomor_sk}}</span>
                                        </td>
                                        <td>
                                            <span>{{ $sk -> perihal}}</span>
                                        </td>
                                        <td>
                                        <span><a href="{{ $sk -> dokumen_file}}" style="color: blue;"><button class="btn" style="background-color: DodgerBlue;
                                            border: none;
                                            color: white;
                                            padding: 12px;
                                            cursor: pointer;
                                            font-size: 10px;"><i class="fa fa-download"></i> Download</button></a></span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</div>
@endsection
<!-- /.content-wrapper -->

@section('footer')
@endsection
</body>
</html>
