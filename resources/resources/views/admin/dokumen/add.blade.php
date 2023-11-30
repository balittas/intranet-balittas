@extends('admin.layouts.app')
@section('titleHeader')
Data Dokumen
@endsection
@section('subtitleHeader')
Tambah Dokumen
@endsection
@section('breadcrumb')
Data Dokumen
@endsection
@section('content-wrapper')

<div class="row">
    <div class="col-sm-12" style="margin-bottom:20%">
        <div class="card">
            <div class="box-body" style="padding-bottom:50px">
                <form class="text-left border border-light p-5" action="{{route('dokumen.store')}}" method="POST"
                    enctype="multipart/form-data" style="padding-bottom: 50px;">
                    @csrf
                    <div class="form-group">
                        <label>Judul Dokumen</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                            </span>
                            <input type="text" class="form-control  " placeholder="Judul Dokumen"
                                name="judul" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                            </span>
                                <select name="kategori_id" class="select2 form-control" id="default-select">
                                        @foreach ($kategori as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                        @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tipe Dokumen</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                            </span>
                                <select id="tipe_dokumen" name="tipe_dokumen" class="select2 form-control" id="default-select">
                                        <option value="file">File</option>
                                        <option value="link">Link</option>
                                </select>
                        </div>
                    </div>

                    <div class="file_tipe1 form-group">
                        <label>File Dokumen</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                            </span>
                            <input type="file" class="form-control  " name="dokumen_file">
                        </div>
                    </div>

                    <div class="file_tipe2 form-group d-none">
                        <label>File Dokumen</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <label class="input-group-text"><i class="ik ik-edit-1"></i></label>
                            </span>
                            <input type="text" class="form-control  " name="dokumen_link">
                        </div>
                    </div>


                    <div class="footer-buttons">
                        <a class="fixedButtonRefresh" href="{{route('dokumen.index')}}">
                            <button data-toggle="tooltip" data-placement="top" title="" type="button"
                                class="btn btn-icon btn-secondary " data-original-title="Back">
                                <i class="ik ik-arrow-left"></i>
                            </button>
                        </a>
                        <a class="fixedButtonAdd">
                            <button data-toggle="tooltip" type="submit" data-placement="top" title="" href=""
                                class="btn btn-icon btn-info" data-original-title="Tambah">
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
@section('footer')
    <script>
        $('#tipe_dokumen').change(function(){

            if($('#tipe_dokumen').val() == "file"){
                if($('.file_tipe1').hasClass('d-none')){
                    $('.file_tipe1').removeClass('d-none')
                    $('.file_tipe2').addClass('d-none')
                }else{
                    $('.file_tipe1').addClass('d-none')
                    $('.file_tipe2').removeClass('d-none')
                }
            }

            if($('#tipe_dokumen').val() == "link"){
                if($('.file_tipe2').hasClass('d-none')){
                    $('.file_tipe2').removeClass('d-none')
                    $('.file_tipe1').addClass('d-none')
                }else{
                    $('.file_tipe2').removeClass('d-none')
                    $('.file_tipe1').addClass('d-none')
                }

            }
        });
    </script>
@endsection
