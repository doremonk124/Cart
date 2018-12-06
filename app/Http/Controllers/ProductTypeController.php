<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;


class ProductTypeController extends Controller
{
    //
    function __construct()
    {
    	$productType = ProductType::all();
    	view()->share('productType', $productType);
    }
    public function getDanhSach()
    {
    	return view('admin.product_type.danhsach');
    }
    public function getXoa(Request $Request)
    {
    	$producttype = ProductType::find($Request->id);
    	$producttype->delete();
    	return view('admin/product_type/danhsach',['thongbao'=> 'Xóa thành công']);
    }
    public function getSua(Request $Request)
    {
    	$producttype = ProductType::find($Request->id);
    	return view('admin/product_type/sua', ['producttype'=> $producttype]);
    }
    public function postSua(Request $Request)
    {
    	$this->validate($Request,['name'=> "required|min:5|max:40", 'description'=>'required|min:3|max:100', 'img'], ['name.required'=> 'Tên không được phép để trống', 'description'=>'Lời miêu tả không được để trống']);
    	$producttype = ProductType::find($Request->id);
    	if($Request->hasFile('image'))
    	{
    		$file = $Request->file('image');
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png'&& $duoi != 'jpeg')
    		{
    			return view('admin/product_type/sua',['duoi'=> 'Ảnh sử dụng được có đuôi là jpg, png hoặc jepg']);
    		} else {
    			$name = $file->getClientOriginalName();
    			$image = str_random(6)."_".$name;
    			while(file_exists("sourse/image/product/".$image))
    			{
    				$image = str_random(6)."_".$name;
    			}
    			$file->move("sourse/image/product", $image);
    			$producttype->image = $image;
    		}
    	}
    	$producttype->name = $Request->name;
    	$producttype->description = $Request->description;
    	$producttype->save();
    	return view('admin/product_type/sua',['thongbao'=> "Lưu thay đổi thành công",'producttype'=> $producttype]);
    }
    public function getThem()
    {
    	return view('admin.product_type.them');
    }
    public function postThem(Request $Request)
    {
    	$this->validate($Request,['name'=> "required|min:5|max:40", 'description'=>'required|min:3|max:100', 'img'], ['name.required'=> 'Tên không được phép để trống', 'description'=>'Lời miêu tả không được để trống']);
    	$newProduct = new ProductType;
    	if($Request->hasFile('image'))
    	{
    		$file = $Request->file('image');
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png'&& $duoi != 'jpeg')
    		{
    			return view('admin/product_type/them',['duoi'=> 'Ảnh sử dụng được có đuôi là jpg, png hoặc jepg']);
    		} else {
    			$name = $file->getClientOriginalName();
    			$image = str_random(6)."_".$name;
    			while(file_exists("sourse/image/product/".$image))
    			{
    				$image = str_random(6)."_".$name;
    			}
    			$file->move("sourse/image/product", $image);
    			$newProduct->image = $image;
    		}
    	} else {
    		return view('admin/product_type/them',['duoi'=> 'Chưa có ảnh hoặc kích thước ảnh quá lớn']);
    	}
    	$newProduct->name = $Request->name;
    	$newProduct->description = $Request->description;
    	$newProduct->save();
    	return view('admin/product_type/them',['thongbao'=> 'Thêm loại sản phẩm thành công']);
    }
}
