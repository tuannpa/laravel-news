@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
                            <small>> {{$loaitin->Ten}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/loaitin/sua/{{$loaitin->id}}" method="POST">
                            {{ csrf_field() }}
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        <strong>{{$err}}</strong><br/>
                                    @endforeach
                                </div>
                            @endif

                            @if(session('message'))
                                <div class="alert alert-success">
                                    <strong>{{ session('message') }}</strong>
                                </div>
                            @endif
                            <div class="form-group">
                                <p><label>Chọn Thể Loại</label></p>
                                <select class="form-control input-width" name="cate">
                                    @foreach($theloai as $chitiet)
                                        <option 
                                        @if($loaitin->idTheLoai == $chitiet->id)
                                            {{ 'selected' }}
                                        @endif
                                        value="{{ $chitiet->id }}">{{ $chitiet->Ten }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <p>
                                    <label>Tên hiện tại của Loại Tin</label>
                                    <input class="form-control input-width" name="current_scate" value="{{$loaitin->Ten}}" disabled="true" />
                                </p>

                                <p>
                                    <label>Thay đổi tên Loại Tin</label>
                                    <input class="form-control input-width" name="scate_changed" placeholder="Nhập tên mới cho Loại Tin" value="{{ $loaitin->Ten }}" />
                                </p>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Thực hiện</button>

                            <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection