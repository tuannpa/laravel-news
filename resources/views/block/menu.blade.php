<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Danh Sách Thể Loại
        </li>
        @foreach($data['theloai'] as $cate)
            @if(count($cate->LoaiTin) > 0)
            <li class="list-group-item menu1 cate-list">
                {{ $cate->Ten }}
            </li>
            <ul>
                @foreach($cate->LoaiTin as $subcate)
                    <li class="list-group-item">
                        <a href="loai-tin/{{ $subcate->TenKhongDau }}">{{ $subcate->Ten }}</a>
                    </li>
                @endforeach
            </ul>
            @endif
        @endforeach
    </ul>
</div>