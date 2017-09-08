@section('title')
	Quản lý Thông tin Người Dùng
@endsection

@extends('index')

@section('content')
<script src="admin_asset/dist/js/extra.js"></script>
<!-- Page Content -->
<div class="container">

	<!-- slider -->
	<div class="row carousel-holder">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Thông tin tài khoản</h4></div>
				<div class="panel-body">
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
					<form action="quan-ly-thong-tin" method="POST">
						{{ csrf_field() }}
						<div>
							<label>Tên Người Dùng</label>
							<input type="text" class="form-control" name="username" aria-describedby="basic-addon1" value="{{ $user_info->name }}">
						</div>
						<br>
						<div>
							<label>Địa Chỉ Email</label>
							<input type="email" class="form-control" name="email" aria-describedby="basic-addon1" value="{{ $user_info->email }}" 
							readonly
							>
						</div>
						<br>	
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
						<br>
						<button type="submit" class="btn btn-primary">Thực Hiện
						</button>

					</form>
				</div>
			</div>
		</div>
		<div class="col-md-2">
		</div>
	</div>
	<!-- end slide -->
</div>
<!-- end Page Content -->
@endsection