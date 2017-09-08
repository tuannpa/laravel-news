<!-- Header -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="font-size: 1.4em;" href="{{ url('/') }}">tinnhanh.net</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="lien-he">Liên hệ</a>
                    </li>
                </ul>

                <form method="GET" action="tim-kiem" class="navbar-form navbar-left" role="search">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="text" name="keyword" class="form-control" placeholder="Bạn cần tìm gì?">
                    </div>
                    <button type="submit" class="btn btn-default">Tìm Kiếm</button>
                </form>
                @if(Auth::user())
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        
                        <span class="usr-name"></span>  
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="nav navbar-nav pull-right">
                        <li class="nav-item dropdown">
                            <a style="cursor: pointer;" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user fa-fw" style="margin-right: 0.5em;"></i>{{ Auth::user()->name }}<i style="margin-left: 0.5em;" class="fa fa-caret-down"></i>
                            </a>
                            <div style="left: -5px; padding: 0.5em 1em; text-align: center;" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="quan-ly-thong-tin">Thiết Lập Tài Khoản</a>
                                <div class="divider"></div>
                                <a class="dropdown-item" href="dang-xuat">Đăng Xuất</a>
                            </div>
                        </li>
                    </ul>
                    
                @else
                    <ul class="nav navbar-nav pull-right">
                        <li>
                            <a href="dang-ky-tai-khoan">Đăng ký</a>
                        </li>
                        @if(!Request::is('dang-nhap'))
                        <li>
                            <a style="cursor: pointer;" class="login-sec" data-toggle="modal" data-target="#myModal">Đăng Nhập</a>
                        </li>
                        @endif
                    </ul>
                @endif
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<!-- End Header -->