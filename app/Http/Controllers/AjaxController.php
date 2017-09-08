<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;

class AjaxController extends Controller
{
    //
    public function getLoaiTin($idTheLoai){
    	$loaitin = LoaiTin::where('idTheLoai',$idTheLoai)->get();
    	foreach($loaitin as $chitiet)
    		echo "<option value='".$chitiet->id."'>".$chitiet->Ten."</option>";
    }

    public function timestamp(){
    	return date('H:i:s');
    }
}
