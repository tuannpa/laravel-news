<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TinTuc;

class Comment extends Model
{
    //
    protected $table = "comment";

    public function TinTuc()
    {
    	return $this->belongsTo('App\TinTuc','idTinTuc','id');
    }

    public function User()
    {
    	return $this->belongsTo('App\User','idUser','id');
    }
}
