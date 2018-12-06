<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    //
    public function __construct()
    {
    	$customer = Customer::all();
    	view()->share('customer',$customer);
    }
    public function getDanhSach()
    {
    	return view('admin/customer/danhsach');
    }
    public function getThem()
    {
    	return view('admin/customer/them');
    }
    public function postThem(Request $Request)
    {
    	$this->validate($Request,['name'=> 'required|min:3|max:50', 'phone_number'=> 'required|min:10|max:12', 'address'=> 'required|min:5|max:100', 'email'=> 'required|min:5|max:40', 'note'=> 'required|max:100'], 
    		['name.required' => 'Bạn chưa nhập tên', 'name.min' => 'Tên quá ngắn', 'name.max'=> 'Tên quá dài', 'phone_number.required'=>'Hãy nhập số điện thoại', 'address.required'=>'Hãy nhập địa chỉ', 'email.required'=>'Email không được bỏ trống']);
    	$Customer = new Customer;
    	$Customer->name = $Request->name;
    	$Customer->phone_number = $Request->phone_number;
    	$Customer->email = $Request->email;
    	$Customer->address = $Request->address;
    	$Customer->gender = $Request->gender;
    	$Customer->note = $Request->note;
    	$Customer->save();
    	return view('admin/customer/them', ['thongbao'=> 'Tạo khách hàng thành công']);
    }
    public function getSua(Request $Request)
    {
    	$Customer = Customer::find($Request->id);
    	return view('admin/customer/sua', ['Customer'=>$Customer]);
    }
    public function postSua(Request $Request)
    {
    	$Customer = Customer::find($Request->id);
    	$this->validate($Request,['name'=> 'required|min:3|max:50', 'phone_number'=> 'required|min:10|max:12', 'address'=> 'required|min:5|max:100', 'email'=> 'required|min:5|max:40', 'note'=> 'required|max:100'], 
    		['name.required' => 'Bạn chưa nhập tên', 'name.min' => 'Tên quá ngắn', 'name.max'=> 'Tên quá dài', 'phone_number.required'=>'Hãy nhập số điện thoại', 'address.required'=>'Hãy nhập địa chỉ', 'email.required'=>'Email không được bỏ trống']);
    	$Customer->name = $Request->name;
    	$Customer->phone_number = $Request->phone_number;
    	$Customer->email = $Request->email;
    	$Customer->address = $Request->address;
    	$Customer->gender = $Request->gender;
    	$Customer->note = $Request->note;
    	$Customer->save();
    	return view('admin/customer/sua', ['thongbao'=> 'Thay đổi thành công','Customer'=>$Customer]);
    }
    public function getXoa(Request $Request)
    {
    	$idCustomer = Customer::find($Request->id);
    	$idCustomer->delete();
    	return view('admin/customer/danhsach',['thongbao'=> 'Đã xóa']);
    }
}
