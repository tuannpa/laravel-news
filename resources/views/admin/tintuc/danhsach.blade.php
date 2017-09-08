@extends('admin.layout.index')

@section('content')
<script src="admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>> Danh Sách</small>
                        </h1>
                    </div>
                    <div class="clearfix"></div>
                    <!-- /.col-lg-12 -->
                    @if(session('message'))
                        <div class="alert alert-success">
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Tiêu Đề Tin Tức</th>
                                <th class="text-center">Tóm Tắt</th>
                                <th class="text-center">Thể Loại</th>
                                <th class="text-center">Loại Tin</th>
                                <th class="text-center">Lượt Xem</th>
                                <th class="text-center">Nổi Bật</th>
                                <th class="text-center">Sửa</th>
                                <th class="text-center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc as $chitiet)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $chitiet->id }}</td>
                                <td>
                                    <p>{{ $chitiet->TieuDe }}</p>
                                    <img width="100px" src="upload/tintuc/{{ $chitiet->Hinh }}">
                                </td>
                                <td>{{ $chitiet->TomTat }}</td>
                                <td>{{ $chitiet->LoaiTin->TheLoai->Ten }}</td>
                                <td>{{ $chitiet->LoaiTin->Ten }}</td>
                                <td>{{ $chitiet->SoLuotXem }}</td>
                                <td>
                                    @if($chitiet->NoiBat == 0)
                                        {{ 'Không' }}
                                    @else
                                        {{ 'Có' }}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{ $chitiet->id }}">Sửa</a></td>
                                <td class="center">
                                    <i class="fa fa-trash-o  fa-fw"></i>

                                    <input type="hidden" class="hiddenID" value="{{ $chitiet->id }}">
                                    
                                    <a href="#" class="btnDel" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal{{$chitiet->id}}">Xóa</a>
                                        
                                        <div style="text-align: left;" id="myModal{{$chitiet->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Xác Nhận</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Bạn muốn xóa Tin Tức: "{{$chitiet->TieuDe}}"?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-casetype="tintuc" class="btn btn-default btnConf">Có</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection