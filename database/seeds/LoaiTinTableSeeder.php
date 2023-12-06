<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiTinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('LoaiTin')->insert([
        	['idTheLoai'=>'1','Ten' => 'Giáo Dục','TenKhongDau' => 'Giao-Duc'],
        	['idTheLoai'=>'1','Ten' => 'Nhịp Điệu Trẻ','TenKhongDau' => 'Nhip-Dieu-Tre'],
        	['idTheLoai'=>'1','Ten' => 'Du Lịch','TenKhongDau' => 'Du-Lich'],
        	['idTheLoai'=>'1','Ten' => 'Du Học','TenKhongDau' => 'Du-Hoc'],
        	['idTheLoai'=>'2','Ten' => 'Cuộc Sống Đó Đây','TenKhongDau' => 'Cuoc-Song-Do-Day'],
        	['idTheLoai'=>'2','Ten' => 'Ảnh','TenKhongDau' => 'Anh'],
        	['idTheLoai'=>'2','Ten' => 'Người Việt 5 Châu','TenKhongDau' => 'Nguoi-Viet-5-Chau'],
        	['idTheLoai'=>'2','Ten' => 'Phân Tích','TenKhongDau' => 'Phan-Tich'],
        	['idTheLoai'=>'3','Ten' => 'Chứng Khoán','TenKhongDau' => 'Chung-Khoan'],
        	['idTheLoai'=>'3','Ten' => 'Bất Động Sản','TenKhongDau' => 'Bat-Dong-San'],
        	['idTheLoai'=>'3','Ten' => 'Doanh Nhân','TenKhongDau' => 'Doanh-Nhan'],
        	['idTheLoai'=>'3','Ten' => 'Quốc Tế','TenKhongDau' => 'Quoc-Te'],
        	['idTheLoai'=>'3','Ten' => 'Mua Sắm','TenKhongDau' => 'Mua-Sam'],
        	['idTheLoai'=>'3','Ten' => 'Doanh Nghiệp Viết','TenKhongDau' => 'Doanh-Nghiep-Viet'],
        	['idTheLoai'=>'4','Ten' => 'Hoa Hậu','TenKhongDau' => 'Hoa-Hau'],
        	['idTheLoai'=>'4','Ten' => 'Nghệ Sỹ','TenKhongDau' => 'Nghe-Sy'],
        	['idTheLoai'=>'4','Ten' => 'Âm Nhạc','TenKhongDau' => 'Am-Nhac'],
        	['idTheLoai'=>'4','Ten' => 'Thời Trang','TenKhongDau' => 'Thoi-Trang'],
        	['idTheLoai'=>'4','Ten' => 'Điện Ảnh','TenKhongDau' => 'Dien-Anh'],
        	['idTheLoai'=>'4','Ten' => 'Mỹ Thuật','TenKhongDau' => 'My-Thuat'],
        	['idTheLoai'=>'5','Ten' => 'Bóng Đá','TenKhongDau' => 'Bong-Da'],
        	['idTheLoai'=>'5','Ten' => 'Tennis','TenKhongDau' => 'Tennis'],
        	['idTheLoai'=>'5','Ten' => 'Chân Dung','TenKhongDau' => 'Chan-Dung'],
        	['idTheLoai'=>'5','Ten' => 'Ảnh','TenKhongDau' => 'Anh-TT'],
        	['idTheLoai'=>'6','Ten' => 'Hình Sự','TenKhongDau' => 'Hinh-Su']
    	]);
    }
}


