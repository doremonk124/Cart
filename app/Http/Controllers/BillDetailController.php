<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
use App\Product;
use App\Customer;


class BillDetailController extends Controller
{
    //
    function __construct()
    {
    	$Bill = Bill::all();
        $BillDetail = BillDetail::all();
    	view()->share('BillDetail', $BillDetail);
    	view()->share('Bill', $Bill);
    }
    public function getDanhSach()
    {
    	// $bill = Bill::all()->customer();
    	return view('admin.billdetail.danhsach');
    }
    public function postDanhSach(Request $Request)
    {
        $billdetail = BillDetail::find($Request->id);
        $billdetail->status = $Request->select;
        $billdetail->save();
        return view('admin.billdetail.danhsach',['thongbao'=> 'Sửa trạng thái thành công']);
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
    	$billdetail = BillDetail::find($Request->id);
    	$billdetail->delete();
    	return view('admin/billdetail/danhsach',['thongbao'=> 'Xóa thành công']);
    }
    public function getSua(Request $Request)
    {
    	$billdetail = BillDetail::find($Request->id);
    	return view('admin/billdetail/sua', ['billdetail'=> $billdetail]);
    }
    public function postSua(Request $Request)
    {
    	$this->validate($Request,['id_product'=> "required", 'quantity'=>"required"], ['total.required'=> 'Nhập tổng loại sản phẩm', 'quantity.required'=> 'Nhập tổng số lượng']);
    	$product = Product::find($Request->id_product);
    	$billdetail = new BillDetail;
    	$billdetail->id_bill = $Request->select;
    	$billdetail->id_product = $Request->id_product;
    	$billdetail->quantity = $Request->quantity;
    	$billdetail->unit_price = $product->unit_price;
    	$billdetail->save();
    	return view('admin/billdetail/sua',['thongbao'=> 'Sửa chi tiết đơn hàng thành công']);
    }
    public function getThem()
    {
    	return view('admin.billdetail.them');
    }
    public function postThem(Request $Request)
    {
    	$this->validate($Request,['id_product'=> "required", 'quantity'=>"required"], ['total.required'=> 'Nhập tổng loại sản phẩm', 'quantity.required'=> 'Nhập tổng số lượng']);
    	$product = Product::find($Request->id_product);
    	$billdetail = new BillDetail;
    	$billdetail->id_bill = $Request->select;
    	$billdetail->id_product = $Request->id_product;
    	$billdetail->quantity = $Request->quantity;
    	$billdetail->unit_price = $product->unit_price;
        $billdetail->status = "Chưa thanh toán";
    	$billdetail->save();
    	return view('admin/billdetail/them',['thongbao'=> 'Thêm chi tiết đơn hàng thành công']);
    }
}
