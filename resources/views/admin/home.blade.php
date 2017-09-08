@extends('admin.layout.index')

@section('content')
<script src="admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
				<h1>Chào {{ Auth::user()->name }}</h1>
				<div class="col-md-6">
					<div class="panel panel-default calen">
	                    <div class="panel-heading">
	                        <strong style="font-size: 20px;">Lịch</strong>
	                   	</div>
	                    <div class="panel-body">
	                        <p>Hôm nay là: {{ getWeekDay() }}, Ngày {{ date('d/m/Y') }}.</p>
	                        <p>Thời gian hiện tại: <span id="timestamp"></span></p>
	                    </div>
	                </div>
				</div>
				
				<div class="clearfix"></div>
				<div class="col-lg-12">
					<div class="panel panel-default calen">
	                    <div class="panel-heading">
	                        <strong style="font-size: 20px;">Danh Sách các Bình luận mới</strong>
	                   	</div>
	                    <div class="panel-body">
	                    	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>
		                            <tr align="center">
		                                <th class="text-center">ID</th>
		                                <th class="text-center">Nội Dung</th>
		                                <th class="text-center">Tên Người Dùng</th>
		                                <th class="text-center">Tiêu Đề Bài Viết</th>
		                                <th class="text-center">Thời Gian Đăng</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            @foreach($comment as $binhluan)
		                                <tr class="odd gradeX" align="center">
		                                    <td>{{ $binhluan->id }}</td>
		                                    <td>{{ $binhluan->NoiDung }}</td>
		                                    <td>{{ $binhluan->User->name }}</td>
		                                    <td>{{ $binhluan->TinTuc->TieuDe }}</td>
		                                    <td>{{ dateTimeFormat($binhluan->created_at) }}</td>
		                                </tr>
		                            @endforeach
		                        </tbody>
		                    </table>
	                    </div>
	                </div>
					
				</div>

				<div class="col-lg-12">
					<div class="panel panel-default calen">
	                    <div class="panel-heading">
	                        <strong style="font-size: 20px;">Danh Sách Bài viết mới cập nhật</strong>
	                   	</div>
	                    <div class="panel-body">
	                    	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>
		                            <tr align="center">
		                                <th class="text-center">ID</th>
		                                <th class="text-center">Tiêu Đề</th>
		                                <th class="text-center">Tóm Tắt</th>
		                                <th class="text-center">Thuộc Loại Tin</th>
		                                <th class="text-center">Thuộc Thể Loại</th>
		                                <th class="text-center">Ngày Đăng</th>
		                                <th class="text-center">Số Lượt Xem</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            @foreach($tintuc as $article)
		                                <tr class="odd gradeX" align="center">
		                                    <td>{{ $article->id }}</td>
		                                    <td>{{ $article->TieuDe }}</td>
		                                    <td>{{ $article->TomTat }}</td>
		                                    <td>{{ $article->LoaiTin->Ten }}</td>
		                                    <td>{{ $article->LoaiTin->TheLoai->Ten }}</td>
		                                    <td>
		                                    	@if(empty($article->created_at))
		                                    		{{ 'Không xác định' }}
		                                    	@else
		                                    		{{ dateTimeFormat($article->created_at) }}
		                                    	@endif
		                                    </td>
		                                    <td>{{ $article->SoLuotXem }}</td>
		                                </tr>
		                            @endforeach
		                        </tbody>
		                    </table>
	                    </div>
	                </div>
					
				</div>
            </div>
        </div>
    </div>
</div>
@endsection

