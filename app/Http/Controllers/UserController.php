<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Comment;

class UserController extends Controller
{
    //
    public function getDanhSach(){
    	$user = User::all();
    	return view('admin.user.danhsach',['user' => $user]);
    }

    public function Them(){
    	return view('admin.user.them');
    }

    public function XuLyThemUser(Request $request){
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
    	$user->quyen = $request->account_type;

    	$user->save();
    	return redirect('admin/user/them')->with('message','Thêm Người Dùng thành công!');
    }

    public function Sua($id){
    	$user = User::find($id);
    	return view('admin.user.sua',['user' => $user]);
    }

    public function XuLySuaUser(Request $request,$id){
    	$this->validate($request,
    		[
    			'username' => 'required|min:3|max:50',
    		],
    		[
    			'username.required' => 'Bạn chưa nhập Tên tài khoản!',
    			'username.min' => 'Tên tài khoản gồm tối thiểu 3 ký tự!',
    			'username.max' => 'Tên tài khoản không được vượt quá 50 ký tự!',
    		]);

    	$user = User::find($id);
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
    	$user->quyen = $request->account_type;

    	$user->save();
    	return redirect('admin/user/sua/'.$id)->with('message','Thay Đổi thông tin Người Dùng thành công!');
    }

    public function Xoa($id){
        $user = User::find($id);
        $user->Comment()->delete();
    	$user->delete();
    	return redirect('admin/user/danhsach')->with('message','Xóa Người Dùng thành công!');
    }

    public function Login(){
        if(Auth::user())
            return redirect('admin/');
        else
            return view('admin.login');
    }

    public function LoginAuth(Request $request){
        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required|min:6|max:32'
            ],
            [
                'email.required' => 'Bạn chưa nhập Địa chỉ Email!',
                'password.required' => 'Bạn chưa nhập Mật khẩu!',
                'password.min' => 'Mật Khẩu gồm tối thiểu 6 ký tự!',
                'password.max' => 'Mật Khẩu gồm tối đa 32 ký tự!'
            ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return redirect('admin/');
        else
            return redirect('admin/login')->with('message','Đăng Nhập không thành công!');
    }

    public function Logout(){
        Auth::logout();
        return redirect('admin/login');
    }
}
