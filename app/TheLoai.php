<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table = "theloai";

    public function LoaiTin(){
    	return $this->hasMany('App\LoaiTin','idTheLoai','id');
    }

    public function TinTuc(){
    	return $this->hasManyThrough('App\TinTuc','App\LoaiTin','idTheLoai','idLoaiTin','id');
    }

    public function Delete(){
        $this->TinTuc()->delete(); // Vì có ràng buộc khóa ngoại nên phải xóa dữ liệu có khóa ngoại trước

        $this->LoaiTin()->delete();

        return parent::delete();
    }
}
