@section('title')
	Đăng Nhập
@endsection

@extends('index')

@section('content')
<!-- Page Content -->
<div class="container">

	<!-- slider -->
	<div class="row carousel-holder">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Đăng nhập</h4></div>
				<div class="panel-body">
					
				
					@if(session('message'))
						<div class="alert alert-danger">
							<strong>{{ session('message') }}</strong>
						</div>
					@endif
					<form action="dang-nhap" method="POST">
                        {{ csrf_field() }}
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control input" placeholder="Địa Chỉ Email" name="email" value="{{ old('email') }}"
                            >
                        </div>
                        @if($errors->first('email'))
                            <div class="alert alert-danger error-sec">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                        <br>    
                        <div>
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Mật Khẩu" name="password">
                        </div>
                        @if($errors->first('password'))
                            <div class="alert alert-danger error-sec">
                                <strong>{{ $errors->first('password') }}</strong><br/>
                            </div>
                        @endif
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Đăng nhập
                            </button>    
                        </div>
                        <div class="form-group" style="text-align: right; margin-bottom: 3em;">
                            <a href="">Quên Mật Khẩu?</a>    
                        </div>
                    </form>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
	<!-- end slide -->
</div>
<!-- end Page Content -->
@endsection