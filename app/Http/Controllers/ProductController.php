<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;

class ProductController extends Controller
{
    //
    function __construct()
    {
        $productType = ProductType::all();
    	$product = Product::all();
    	view()->share('product', $product);
        view()->share('productType', $productType);
    }
    public function getDanhSach()
    {
    	return view('admin.product.danhsach');
    }
    public function getXoa(Request $Request)
    {
    	$product = Product::find($Request->id);
    	$product->delete();
    	return view('admin/product/danhsach',['thongbao'=> 'Xóa thành công']);
    }
    public function getSua(Request $Request)
    {
    	$product = Product::find($Request->id);
    	return view('admin/product/sua', ['product'=> $product]);
    }
    public function postSua(Request $Request)
    {
    	$this->validate($Request,['name'=> "required|min:5|max:40", 'description'=>'min:3|max:100', 'unit_price'=> 'required'], ['name.required'=> 'Tên không được phép để trống']);
    	$product = Product::find($Request->id);
    	if($Request->hasFile('image'))
    	{
    		$file = $Request->file('image');
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png'&& $duoi != 'jpeg')
    		{
    			return view('admin/product/sua',['duoi'=> 'Ảnh sử dụng được có đuôi là jpg, png hoặc jepg','product'=> $product]);
    		} else {
    			$name = $file->getClientOriginalName();
    			$image = str_random(6)."_".$name;
    			while(file_exists("sourse/image/product/".$image))
    			{
    				$image = str_random(6)."_".$name;
    			}
    			$file->move("sourse/image/product", $image);
    			$product->image = $image;
    		}
    	}
        $product->id_type = $Request->select;
    	$product->name = $Request->name;
    	$product->description = $Request->description;
        $product->unit_price = $Request->unit_price;
        $product->promotion_price = $Request->promotion_price;
    	$product->save();
    	return view('admin/product/sua',['thongbao'=> "Lưu thay đổi thành công",'product'=> $product]);
    }
    public function getThem()
    {
    	return view('admin.product.them');
    }
    public function postThem(Request $Request)
    {
    	$this->validate($Request,['name'=> "required|min:5|max:40", 'description'=>'min:3|max:100', 'unit_price'=> 'required'], ['name.required'=> 'Tên không được phép để trống']);
    	$newProduct = new Product;
    	if($Request->hasFile('image'))
    	{
    		$file = $Request->file('image');
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png'&& $duoi != 'jpeg')
    		{
    			return view('admin/product/them',['duoi'=> 'Ảnh sử dụng được có đuôi là jpg, png hoặc jepg']);
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
    		return view('admin/product/them',['duoi'=> 'Chưa có ảnh hoặc kích thước ảnh quá lớn']);
    	}
        $newProduct->id_type = $Request->select;
    	$newProduct->name = $Request->name;
    	$newProduct->description = $Request->description;
        $newProduct->unit_price = $Request->unit_price;
        $newProduct->promotion_price = $Request->promotion_price;
    	$newProduct->save();
    	return view('admin/product/them',['thongbao'=> 'Thêm loại sản phẩm thành công']);
    }
}
