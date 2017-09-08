@section('title')
    Trang Chủ
@endsection

@extends('index')

@section('content')
<!-- Page Content -->
    <div class="container">

        @include('block.slide')

        <div class="space20"></div>


        <div class="row main-left">
            @include('block.menu')

            <div class="col-md-9">
                <div class="panel panel-default">            
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
                    </div>

                    <div class="panel-body">
                        @foreach($data['theloai'] as $theloai)
                            @if(count($theloai->LoaiTin) > 0)
                            <!-- item -->
                            <div class="row-item row">
                                <h3>
                                    <a class="cate-list">{{ $theloai->Ten }}</a> |  
                                    @foreach($theloai->LoaiTin as $loaitin)
                                        <small><a href="loai-tin/{{ $loaitin->TenKhongDau }}"><i>{{ $loaitin->Ten }}</i></a>/</small>
                                    @endforeach
                                </h3>
                                <?php
                                    $data = $theloai->TinTuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
                                    $chosen_article = $data->shift();
                                ?>
                                <div class="col-md-8 border-right">
                                    <div class="col-md-5">
                                        <a href="tin-tuc/{{ $chosen_article['TieuDeKhongDau'] }}.html">
                                            <img class="img-responsive" src="upload/tintuc/{{ $chosen_article['Hinh'] }}" alt="Hình ảnh đại diện của bài viết">
                                        </a>
                                    </div>

                                    <div class="col-md-7">
                                        <h3><a href="tin-tuc/{{ $chosen_article['TieuDeKhongDau'] }}.html">{{ $chosen_article['TieuDe'] }}</a></h3>
                                        <p>{!! $chosen_article['TomTat'] !!}</p>
                                        <a class="btn btn-primary" href="tin-tuc/{{ $chosen_article['TieuDeKhongDau'] }}.html">Xem Thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                                    </div>

                                </div>
                                

                                <div class="col-md-4">
                                    @foreach($data->all() as $remaining_article)
                                        <a href="tin-tuc/{{ $remaining_article['TieuDeKhongDau'] }}.html">
                                            <h4>
                                                <span class="glyphicon glyphicon-list-alt"></span>
                                                {{ $remaining_article['TieuDe'] }}
                                            </h4>
                                        </a>
                                    @endforeach
                                </div>
                                
                                <div class="break"></div>
                            </div>
                            <!-- end item -->
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection