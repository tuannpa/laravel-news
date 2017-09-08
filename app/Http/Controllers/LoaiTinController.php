<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;

class LoaiTinController extends Controller
{
    //
	public function getDanhSach(){
		$loaitin = LoaiTin::all();
		return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
	}

	public function Them(){
		$theloai = TheLoai::all();
		return view('admin.loaitin.them',['theloai'=>$theloai]);
	}

	public function XuLyThemLT(Request $request){
		$this->validate($request,
			[
				'cate' => 'required',
				'sub_cate' => 'required|unique:LoaiTin,Ten|min:3|max:100'
			],
			[
				'cate.required' => 'Vui lòng chọn Thể Loại!',
				'sub_cate.required' => 'Bạn chưa nhập tên Loại Tin!',
				'sub_cate.unique' => 'Tên Loại Tin đã tồn tại, vui lòng nhập tên khác!',
				'sub_cate.min' => 'Tên Loại Tin gồm ít nhất 3 ký tự!',
				'sub_cate.max' => 'Tên Loại Tin gồm tối đa 100 ký tự!'
			]);
		$loaitin = new LoaiTin;
		$loaitin->idTheLoai = $request->cate;
		$loaitin->Ten = $request->sub_cate;
		$loaitin->TenKhongDau = changeTitle($request->sub_cate);
		$loaitin->save();

		return redirect('admin/loaitin/them')->with('message','Thêm Loại Tin thành công!');
	}

	public function Sua($id){
		$theloai = TheLoai::all();
		$loaitin = LoaiTin::find($id);
		return view('admin.loaitin.sua',['loaitin'=>$loaitin, 'theloai'=>$theloai]);
	}

	public function XuLySuaLT(Request $request,$id){
		$this->validate($request,
			[
				'cate' => 'required',
				'scate_changed' => 'required|unique:LoaiTin,Ten|min:3|max:100'
			],
			[
				'cate.required' => 'Vui lòng chọn Thể Loại!',
				'scate_changed.required' => 'Bạn chưa nhập tên Loại Tin!',
				'scate_changed.unique' => 'Tên Loại Tin đã tồn tại, vui lòng thay đổi tên khác!',
				'scate_changed.min' => 'Tên Loại Tin gồm ít nhất 3 ký tự!',
				'scate_changed.max' => 'Tên Loại Tin gồm tối đa 100 ký tự!'
			]);
		$loaitin = LoaiTin::find($id);
		$loaitin->Ten = $request->scate_changed;
		$loaitin->TenKhongDau = changeTitle($request->scate_changed);
		$loaitin->idTheLoai = $request->cate;
		$loaitin->save();

		return redirect('admin/loaitin/sua/'.$id)->with('message','Sửa Loại Tin thành công!');
	}

	public function Xoa($id){
		LoaiTin::find($id)->delete();

		return redirect('admin/loaitin/danhsach')->with('message','Xóa Loại Tin thành công!');
	}
}
