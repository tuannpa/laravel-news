@extends('admin.layout.index')

@section('content')
<script src="admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lý Người Dùng
                            <small>> {{ $user->name }}</small>
                        </h1>
                    </div>
                    
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    <strong>{{ $err }}</strong><br/>                          
                                @endforeach
                            </div>
                        @endif

                        @if(session('message'))
                            <div class="alert alert-success">
                                <strong>{{ session('message') }}</strong>
                            </div>
                        @endif
                        <form action="admin/user/sua/{{ $user->id }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <p><label>Tên Người Dùng</label></p>
                                <input class="form-control input-width" type="text" name="username" placeholder="Nhập tên người dùng" value="{{ $user->name }}" />
                            </div>

                            <div class="form-group">
                                <p><label>Email</label></p>
                                <input class="form-control input-width" type="email" name="email" placeholder="Nhập địa chỉ Email" value="{{ $user->email }}" readonly="" />
                            </div>

                            <div class="form-group">
                                <p><label>Bạn có muốn thay đổi mật khẩu?</label></p>
                                <p>
                                    <label class="radio-inline">
                                        <input name="change_password" id="yes" class="radio-change" value="1"
                                         type="radio"><span for="yes">Có</span>
                                    </label>
                                    <label class="radio-inline">
                                        <input name="change_password" id="no" class="radio-change" value="0"
                                         type="radio" checked=""><span for="no">Không</span>
                                    </label>
                                </p>
                                <input class="form-control input-width disabled-field" type="password" name="password" placeholder="Nhập mật khẩu" disabled="" />
                            </div>

                            <div class="form-group">
                                <p><label>Xác nhận Mật khẩu</label></p>
                                <input class="form-control input-width disabled-field" type="password" name="password_again" placeholder="Nhập lại mật khẩu" disabled="" />
                            </div>

                            <div class="form-group">
                                <p><label>Phân Quyền Tài Khoản</label></p>
                                <label class="radio-inline">
                                    <input name="account_type" value="0"
                                    @if($user->quyen == 0)
                                        {{ 'checked' }}
                                    @endif
                                     type="radio">Tài khoản thường
                                </label>
                                <label class="radio-inline">
                                    <input name="account_type" value="1" 
                                    @if($user->quyen == 1)
                                        {{ 'checked' }}
                                    @endif
                                     type="radio">Admin
                                </label>
                            </div>

                            <button type="submit" class="btn btn-default">Thực Hiện</button>
                            <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection