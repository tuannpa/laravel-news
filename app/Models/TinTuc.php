<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    //
    protected $table = "tintuc";

    public function LoaiTin()
    {
    	return $this->belongsTo('App\LoaiTin','idLoaiTin','id');
    }

    public function Comment()
    {
    	return $this->hasMany('App\Comment','idTinTuc','id');
    }
}
