<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\User;
use App\Slide;

class HomeConTroller extends Controller
{
    //
	public function __construct(){ // Trang chủ và trang liên hệ đều cần dữ liệu của thanh menu và slide để hiển thị ra, nên ta dùng view share để cả 2 trang đều có biến này để sử dụng.
		$data = [
			'theloai' => TheLoai::all(),
			'slide' => Slide::all()
		];
		view()->share('data',$data);
	}

    public function index(){
    	return view('page.home');
    }

    public function Contact(){
    	return view('page.contact');
    }

    public function LoaiTin($unsigned_name){
    	$loaitin = LoaiTin::where('TenKhongDau',$unsigned_name)->first(); // first dùng để lấy một dữ liệu duy nhất, get dùng để lấy nhiều dòng dữ liệu.
    	$tintuc = TinTuc::where('idLoaiTin',$loaitin->id)->paginate(5);
    	return view('page.category',['loaitin' => $loaitin, 'tintuc' => $tintuc]);
    }

    public function TinTuc($unsigned_name){
    	$tintuc = TinTuc::where('TieuDeKhongDau',$unsigned_name)->first();
    	$tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
    	$tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
    	return view('page.detail',['tintuc' => $tintuc, 'tinnoibat' => $tinnoibat, 'tinlienquan' => $tinlienquan]);
    }

    public function Login(){
    	return view('page.login');
    }

    public function LoginAuth(Request $request)
    {
    	// Cách sử dụng validator nếu muốn dùng if để kiểm tra lỗi dữ liệu đầu vào trước khi kiểm tra đăng nhập (Tham khảo mục #Manually Creating Validators tại trang chủ Laravel)
    	$validator = Validator::make($request->all(),
    		[
    			'email' => 'required',
    			'password' => 'required|min:6',
    		],
    		[
    			'email.required' => 'Bạn chưa nhập địa chỉ Email!',
    			'password.required' => 'Bạn chưa nhập mật khẩu!',
    			'password.min' => 'Mật khẩu gồm tối thiểu 6 ký tự!',
    		]);

    	if($validator->fails())
    		return redirect('dang-nhap')->withErrors($validator)->withInput();
    	else
    	{
    		if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
	    		return redirect('/');
	    	else
	    		return redirect('dang-nhap')->with('message','Đăng nhập không thành công!');
    	}
    }
    	

    public function Logout(){
    	Auth::logout();
    	return redirect('/');
    }

    public function UserConf(){
    	if(Auth::check())
    		return view('page.user-profile',['user_info' => Auth::user()]);
    	else
    		return redirect('dang-nhap')->with('message','Bạn chưa Đăng Nhập!');
    }

    public function ExUserConf(Request $request){
    	$this->validate($request,
    		[
    			'username' => 'required|min:3|max:50',
    		],
    		[
    			'username.required' => 'Bạn chưa nhập Tên tài khoản!',
    			'username.min' => 'Tên tài khoản gồm tối thiểu 3 ký tự!',
    			'username.max' => 'Tên tài khoản không được vượt quá 50 ký tự!',
    		]);

    	$user = Auth::user();
    	$user->name = $request->username;
    	if($request->has('password'))
    	{
    		$this->validate($request,
    		[
    			'password' => 'required|min:6|max:32',
    			'password_again' => 'required|same:password'
    		],
    		[
    			'password.required' => 'Bạn chưa nhập mật khẩu!',
    			'password.min' => 'Mật khẩu gồm tối thiểu 6 ký tự!',
    			'password.max' => 'Mật khẩu không được vượt quá 32 ký tự!',
    			'password_again.required' => 'Bạn chưa xác nhận mật khẩu!',
    			'password_again.same' => 'Mật khẩu xác nhận chưa khớp với mật khẩu đã nhập!'
    		]);
    		$user->password = bcrypt($request->password_again);
    	}

    	$user->save();
    	return redirect('quan-ly-thong-tin')->with('message','Thay Đổi thông tin Người Dùng thành công!');
    }

    public function Register(){
    	return view('page.register');
    }

    public function DoRegister(Request $request){
    	$this->validate($request,
    		[
    			'username' => 'required|min:3|max:50',
    			'email' => 'required|email|unique:users,email',
    			'password' => 'required|min:6|max:32',
    			'password_again' => 'required|same:password'
    		],
    		[
    			'username.required' => 'Bạn chưa nhập Tên tài khoản!',
    			'username.min' => 'Tên tài khoản gồm tối thiểu 3 ký tự!',
    			'username.max' => 'Tên tài khoản không được vượt quá 50 ký tự!',
    			'email.required' => 'Bạn chưa nhập địa chỉ Email!',
    			'email.email' => 'Bạn chưa nhập đúng định dạng Email!',
    			'email.unique' => 'Địa chỉ Email đã tồn tại!',
    			'password.required' => 'Bạn chưa nhập mật khẩu!',
    			'password.min' => 'Mật khẩu gồm tối thiểu 6 ký tự!',
    			'password.max' => 'Mật khẩu không được vượt quá 32 ký tự!',
    			'password_again.required' => 'Bạn chưa xác nhận mật khẩu!',
    			'password_again.same' => 'Mật khẩu xác nhận chưa khớp với mật khẩu đã nhập!'
    		]);

    	$user = new User;
    	$user->name = $request->username;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password_again);
    	$user->quyen = 0;

    	$user->save();
    	return redirect('dang-ky-tai-khoan')->with('message','Đăng ký tài khoản thành công!');
    }

    public function Search(Request $request){
    	$keyword = $request->keyword;
    	$tintuc = TinTuc::where('TieuDe','like',"%$request->keyword%")->orWhere('TomTat','like',"%$request->keyword%")->orWhere('TomTat','like',"%$request->keyword%")->paginate(5)->appends(['keyword' => $keyword]);

    	return view('page.search',['tintuc' => $tintuc, 'keyword' => $request->keyword]);
    }
}
