<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\collection;
use Illuminate\Support\Carbon;
use App\Bill;
use App\BillDetail;
use App\Product;
use App\Customer;

class BillController extends Controller
{
    //
    function __construct()
    {
    	$Customer = Customer::all();
        $Bill = Bill::all();
    	view()->share('Bill', $Bill);
    	view()->share('Customer', $Customer);
    }
    public function getDanhSach()
    {
    	// $bill = Bill::all()->customer();
    	return view('admin.bill.danhsach');
    }
    public function postDanhSach(Request $Request)
    {
        $bill = Bill::find($Request->id);
        $bill->status = $Request->select;
        $bill->save();
        return view('admin.bill.danhsach',['thongbao'=> 'Sửa trạng thái thành công']);
    }
    public function getDetail(Request $Request)
    {
    	$Bill = Bill::find($Request->id)->id_customer;
    	$bill = Customer::find($Bill);
    	$BillDetail = BillDetail::where('id_bill', $Request->id)->get();
    	$array = array();
    	foreach ($BillDetail as $value) {
    		$Product = Product::find($value->id_product);
    		$array = array_add($array, $value->id_product, $Product->name);
    	}
    	$product = collect($array);
    	return view('admin/bill/detail',['bill'=>$bill, 'BillDetail'=>$BillDetail, 'product'=>$product]);
    }
    public function getXoa(Request $Request)
    {
    	$bill = Bill::find($Request->id);
    	$bill->delete();
    	return view('admin/bill/danhsach',['thongbao'=> 'Xóa thành công']);
    }
    public function getSua(Request $Request)
    {
    	$bill = Bill::find($Request->id);
    	return view('admin/bill/sua', ['bill'=> $bill]);
    }
    public function postSua(Request $Request)
    {
    	$this->validate($Request,['total'=> "required"], ['total.required'=> 'Nhập tổng số tiền']);
    	$bill = Bill::find($Request->id);
    	$customer = Customer::find($Request->select);
    	$date = getdate();
    	$bill->id_customer = $customer->id;
    	$bill->date_order = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
    	$bill->total = $Request->total;
    	$bill->payment = $Request->payment;
    	$bill->note = $Request->note;
    	$bill->save();
    	return view('admin/bill/sua',['thongbao'=> 'Sửa đơn hàng thành công']);
    }
    public function getThem()
    {
    	return view('admin.bill.them');
    }
    public function postThem(Request $Request)
    {
    	$this->validate($Request,['total'=> "required"], ['total.required'=> 'Nhập tổng số tiền']);
    	$bill = new Bill;
    	$customer = Customer::find($Request->select);
    	$date = getdate();
    	$bill->id_customer = $customer->id;
    	$bill->date_order = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
    	$bill->total = $Request->total;
    	$bill->payment = $Request->payment;
    	$bill->note = $Request->note;
        $bill->status = 'Chưa thanh toán';
    	$bill->save();
    	return view('admin/bill/them',['thongbao'=> 'Thêm đơn hàng thành công']);
    }
}
