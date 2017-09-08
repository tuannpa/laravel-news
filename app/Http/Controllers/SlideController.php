<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;


class SlideController extends Controller
{
    //

    public function getDanhSach(){
    	$slide = Slide::all();
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }

    public function Them(){
		return view('admin.slide.them');
    }

    public function XuLyThemSlide(Request $request){
    	$this->validate($request,
    		[
    			'slide_name' => 'required|min:6|max:40',
    			'slide_content' => 'required|min:10|max:100'
    		],
    		[
    			'slide_name.required' => 'Bạn chưa nhập Tên Slide',
    			'slide_name.min' => 'Tên Slide gồm ít nhất 6 ký tự',
    			'slide_name.max' => 'Tên Slide không được vượt quá 40 ký tự',
    			'slide_content.required' => 'Bạn chưa nhập Nội Dung cho Slide',
    			'slide_content.min' => 'Nội Dung Slide gồm tối thiểu 10 ký tự',
    			'slide_content.max' => 'Nội Dung Slide không được vượt quá 100 ký tự'
    		]);
    	$slide = new Slide();
    	$slide->Ten = $request->slide_name;
    	$slide->NoiDung = $request->slide_content;
    	if($request->has('slide_url'))
    		$slide->link = $request->slide_url;

    	if($request->hasFile('slide_img')) // Kiểm tra xem người dùng có upload hình hay không
    	{
    		$img_file = $request->file('slide_img'); // Nhận file hình ảnh người dùng upload lên server
    		
    		$img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh

    		if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
    		{
    			return redirect('admin/slide/them')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
    		}

    		$img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh

    		$random_file_name = str_random(4).'_'.$img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL
    		while(file_exists('upload/slide/'.$random_file_name)) // Trường hợp trên gán với 4 ký tự random nhưng vẫn có thể xảy ra trường hợp bị trùng, nên bỏ vào vòng lặp while để kiểm tra với tên tất cả các file hình trong CSDL, nếu bị trùng thì sẽ random 1 tên khác đến khi nào ko trùng nữa thì thoát vòng lặp
    		{
    			$random_file_name = str_random(4).'_'.$img_file_name;
    		}
    		echo $random_file_name;

    		$img_file->move('upload/slide',$random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
    		$slide->Hinh = $random_file_name;
    	}
    	else
    		$slide->Hinh = ''; // Nếu người dùng không upload hình thì sẽ gán đường dẫn là rỗng

    	$slide->save();

    	return redirect('admin/slide/them')->with('message','Thêm Slide thành công!');
    }

    public function Sua($id){
    	$slide = Slide::find($id);
    	return view('admin.slide.sua',['slide'=>$slide]);
    }

    public function XuLySuaSlide(Request $request,$id){
    	$this->validate($request,
    		[
    			'slide_name' => 'required|min:6|max:40',
    			'slide_content' => 'required|min:10|max:100'
    		],
    		[
    			'slide_name.required' => 'Bạn chưa nhập Tên Slide',
    			'slide_name.min' => 'Tên Slide gồm ít nhất 6 ký tự',
    			'slide_name.max' => 'Tên Slide không được vượt quá 40 ký tự',
    			'slide_content.required' => 'Bạn chưa nhập Nội Dung cho Slide',
    			'slide_content.min' => 'Nội Dung Slide gồm tối thiểu 10 ký tự',
    			'slide_content.max' => 'Nội Dung Slide không được vượt quá 100 ký tự'
    		]);
    	$slide = Slide::find($id);
    	$slide->Ten = $request->slide_name;
    	$slide->NoiDung = $request->slide_content;
    	if($request->has('slide_url'))
    		$slide->link = $request->slide_url;

    	if($request->hasFile('slide_img')) // Kiểm tra xem người dùng có upload hình hay không
    	{
    		$img_file = $request->file('slide_img'); // Nhận file hình ảnh người dùng upload lên server
    		
    		$img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh

    		if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
    		{
    			return redirect('admin/slide/them')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
    		}

    		$img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh

    		$random_file_name = str_random(4).'_'.$img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL
    		while(file_exists('upload/slide/'.$random_file_name)) // Trường hợp trên gán với 4 ký tự random nhưng vẫn có thể xảy ra trường hợp bị trùng, nên bỏ vào vòng lặp while để kiểm tra với tên tất cả các file hình trong CSDL, nếu bị trùng thì sẽ random 1 tên khác đến khi nào ko trùng nữa thì thoát vòng lặp
    		{
    			$random_file_name = str_random(4).'_'.$img_file_name;
    		}
    		echo $random_file_name;

    		unlink('upload/slide/'.$slide->Hinh);
    		$img_file->move('upload/slide',$random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
    		$slide->Hinh = $random_file_name;
    	}

    	$slide->save();

    	return redirect('admin/slide/sua/'.$id)->with('message','Sửa Slide thành công!');
    }

    public function Xoa($id){
    	Slide::find($id)->delete();
    	return redirect('admin/slide/danhsach')->with('message','Xóa Slide thành công!');
    }
}
