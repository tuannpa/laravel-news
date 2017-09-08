@section('title')
    Tìm Kiếm với từ khóa "{{ $keyword }}"
@endsection

@extends('index')

@section('content')

<!-- Page Content -->
<div class="container">
    <div class="row">

        @include('block.menu')

        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4><b>Tìm thấy tổng cộng {{ count($tintuc) }} tin tức có liên quan đến từ khóa "{{ $keyword }}".</b></h4>
                </div>

                @foreach($tintuc as $chitiet)
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="tin-tuc/{{ $chitiet->TieuDeKhongDau }}.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{ $chitiet->Hinh }}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3><a href="tin-tuc/{{ $chitiet->TieuDeKhongDau }}.html">{!! keywordHighlight($keyword,$chitiet->TieuDe) !!}</a></h3>
                            <p>{!! keywordHighlight($keyword,$chitiet->TomTat) !!}</p>
                            <a class="btn btn-primary" href="tin-tuc/{{ $chitiet->TieuDeKhongDau }}.html">Xem Thêm.. <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="row text-center">
                    {{ $tintuc->links() }}
                </div>
                <!-- /.row -->

            </div>
        </div> 

    </div>

</div>
<!-- end Page Content -->

@endsection
