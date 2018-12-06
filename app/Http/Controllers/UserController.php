<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function __construct()
    {
    	$user = User::all();
    	view()->share('user',$user);
    }
    public function getDanhSach()
    {
    	return view('admin/user/danhsach');
    }
    public function getThem()
    {
    	return view('admin/user/them');
    }
    public function postThem(Request $Request)
    {
    	$this->validate($Request,['full_name'=> 'required|min:3|max:50', 'password'=>'required|min:4|max:50', 'phone'=> 'required|min:10|max:12', 'address'=> 'required|min:5|max:100', 'email'=> 'required|min:5|max:20'], 
    		['full_name.required' => 'Bạn chưa nhập tên', 'full_name.min' => 'Tên quá ngắn', 'full_name.max'=> 'Tên quá dài', 'password.required'=>'Bạn chưa nhập mật khẩu', 'password.min'=>'Mật khẩu quá ngắn', 'password.max'=>'Mật khẩu quá dài', 'phone.required'=>'Hãy nhập số điện thoại', 'address.required'=>'Hãy nhập địa chỉ', 'email.required'=>'Email không được bỏ trống']);
    	$users = new User;
    	$users->full_name = $Request->full_name;
    	$users->password = bcrypt($Request->password);
    	$users->phone = $Request->phone;
    	$users->email = $Request->email;
    	$users->address = $Request->address;
    	$users->quyen = $Request->level;
    	$users->save();
    	return view('admin/user/them', ['thongbao'=> 'Tạo tài khoản thành công']);
    }
    public function getSua(Request $Request)
    {
    	$users = User::find($Request->id);
    	return view('admin/user/sua', ['users'=>$users]);
    }
    public function postSua(Request $Request)
    {
    	$users = User::find($Request->id);
    	$this->validate($Request,['full_name'=> 'required|min:3|max:50', 'password'=>'required|min:4|max:50', 'phone'=> 'required|min:10|max:12', 'address'=> 'required|min:5|max:100'], 
    		['full_name.required' => 'Bạn chưa nhập tên', 'full_name.min' => 'Tên quá ngắn', 'full_name.max'=> 'Tên quá dài', 'password.required'=>'Bạn chưa nhập mật khẩu', 'password.min'=>'Mật khẩu quá ngắn', 'password.max'=>'Mật khẩu quá dài', 'phone.required'=>'Hãy nhập số điện thoại', 'phone.min|phone.max'=> 'Số điện thoại không đúng', 'address.required'=>'Hãy nhập địa chỉ', 'address.min|address.max'=>'Địa chỉ trong khoảng 5 đến 100 kí tự']);
    	$users->full_name = $Request->full_name;
    	$users->password = bcrypt($Request->password);
    	$users->phone = $Request->phone;
    	$users->address = $Request->address;
    	$users->quyen = $Request->level;
    	$users->save();
    	return view('admin/user/sua', ['thongbao'=> 'Thay đổi thành công','users'=>$users]);
    }
    public function getXoa(Request $Request)
    {
    	$idUser = User::find($Request->id);
    	$idUser->delete();
    	return view('admin/user/danhsach',['thongbao'=> 'Đã xóa']);
    }
}
