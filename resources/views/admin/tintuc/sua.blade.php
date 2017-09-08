@extends('admin.layout.index')

@section('content')
<script src="admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>> {{ $tintuc->TieuDe }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    <strong>{{$err}}</strong><br>
                                @endforeach
                            </div>
                        @endif
                        
                        @if(session('error'))
                            <div class="alert alert-danger">
                                <strong>{{session('error')}}</strong>
                            </div>
                        @endif

                        @if(session('message'))
                            <div class="alert alert-success">
                                <strong>{{session('message')}}</strong>
                            </div>
                        @endif
                        <form action="admin/tintuc/sua/{{ $tintuc->id }}" method="POST" enctype="multipart/form-data"> <!-- Form bắt buộc phải có thuộc tính enctype thì mới up được file lên -->
                            {{ csrf_field() }}
                            <div class="form-group">
                                <p><label>Chọn Thể Loại</label></p>
                                <select class="form-control input-width catefield" name="cate">
                                    @foreach($theloai as $chitietTL)
                                        <option
                                        @if($tintuc->LoaiTin->TheLoai->id == $chitietTL->id)
                                            {{ 'selected' }}
                                        @endif
                                         value="{{ $chitietTL->id }}">{{ $chitietTL->Ten }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <p><label>Chọn Loại Tin</label></p>
                                <select class="form-control input-width subcatefield" name="sub_cate">
                                    @foreach($loaitin as $chitietLT)
                                        <option
                                        @if($tintuc->LoaiTin->id == $chitietLT->id)
                                            {{ 'selected' }}
                                        @endif
                                         value="{{ $chitietLT->id }}">{{ $chitietLT->Ten }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <p><label>Tiêu Đề</label></p>
                                <input class="form-control input-width" name="article_title" value="{{ $tintuc->TieuDe }}" />
                            </div>

                            <div class="form-group">
                                <p><label>Tóm Tắt Nội Dung</label></p>
                                <textarea name="article_desc" id="demo" class="form-control ckeditor" rows="3">
                                    {{ $tintuc->TomTat }}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <p><label>Nội Dung Bài Viết</label></p>
                                <textarea name="article_content" id="demo" class="form-control ckeditor" rows="3">
                                    {{ $tintuc->NoiDung }}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <p><label>Thêm Hình Ảnh</label></p>
                                <p>
                                    <img width="400px" src="upload/tintuc/{{ $tintuc->Hinh }}">
                                </p>
                                <input type="file" class="form-control" name="article_img">
                            </div>

                            <div class="form-group">
                                <p><label>Tin Tức Nổi Bật?</label></p>
                                <label class="radio-inline">
                                    <input name="article_rep" value="1"
                                    @if($tintuc->NoiBat == 1)
                                        {{ 'checked' }}
                                    @endif
                                     type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="article_rep" value="0"
                                    @if($tintuc->NoiBat == 0)
                                        {{ 'checked' }}
                                    @endif
                                     type="radio">Không
                                </label>
                            </div>

                            <button type="submit" class="btn btn-default">Thực hiện</button>
                            <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Tên Người Bình Luận</th>
                                <th class="text-center">Nội Dung</th>
                                <th class="text-center">Ngày Đăng</th>
                                <th class="text-center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc->Comment as $binhluan)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $binhluan->id }}</td>
                                <td>{{ $binhluan->User->name }}</td>
                                <td>{{ $binhluan->NoiDung }}</td>
                                <td>{{ dateTimeFormat($binhluan->created_at) }}</td>
                                <td class="center">
                                    <i class="fa fa-trash-o  fa-fw"></i>
                                    <input type="hidden" value="{{$binhluan->id}}">

                                    <a href="#" class="btnDel" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal{{$binhluan->id}}">Xóa</a>
                                        
                                        <div style="text-align: left;" id="myModal{{$binhluan->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Xác Nhận</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Bạn muốn xóa Bình luận có nội dung: "{{$binhluan->NoiDung}}"?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-casetype="binhluan" class="btn btn-default btnConf">Có</button>
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

                <!-- end row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection