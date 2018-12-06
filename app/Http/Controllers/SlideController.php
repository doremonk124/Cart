<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    //
    public function __construct()
    {
    	$Slide = Slide::all();
    	view()->share('Slide',$Slide);
    }
    public function getDanhSach()
    {
    	return view('admin/slide/danhsach');
    }
    public function getThem()
    {
    	return view('admin/slide/them');
    }
    public function postThem(Request $Request)
    {
    	$newSlide = new Slide;
    	if($Request->hasFile('image'))
    	{
    		$file = $Request->file('image');
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png'&& $duoi != 'jpeg')
    		{
    			return view('admin/slide/them',['duoi'=> 'Ảnh sử dụng được có đuôi là jpg, png hoặc jepg']);
    		} else {
    			$name = $file->getClientOriginalName();
    			$image = str_random(6)."_".$name;
    			while(file_exists("sourse/image/slide/".$image))
    			{
    				$image = str_random(6)."_".$name;
    			}
    			$file->move("sourse/image/slide", $image);
    			$newSlide->image = $image;
    		}
    	} else {
    		return view('admin/slide/them',['duoi'=> 'Chưa có ảnh hoặc kích thước ảnh vượt quá 2MB']);
    	}
        $newSlide->link = $Request->link;
    	$newSlide->save();
    	return view('admin/slide/them', ['thongbao'=> 'Thêm slide thành công']);
    }
    public function getSua(Request $Request)
    {
    	$slide = Slide::find($Request->id);
    	return view('admin/slide/sua', ['slide'=>$slide]);
    }
    public function postSua(Request $Request)
    {
    	$slide = Slide::find($Request->id);
    	if($Request->hasFile('image'))
    	{
    		$file = $Request->file('image');
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png'&& $duoi != 'jpeg')
    		{
    			return view('admin/slide/sua',['duoi'=> 'Ảnh sử dụng được có đuôi là jpg, png hoặc jepg','slide'=>$slide]);
    		} else {
    			$name = $file->getClientOriginalName();
    			$image = str_random(6)."_".$name;
    			while(file_exists("sourse/image/slide/".$image))
    			{
    				$image = str_random(6)."_".$name;
    			}
    			$file->move("sourse/image/slide", $image);
    			$slide->image = $image;
    		}
    	}
        $slide->link = $Request->link;
    	$slide->save();
    	return view('admin/slide/sua', ['thongbao'=> 'Thay đổi thành công','slide'=>$slide]);
    }
    public function getXoa(Request $Request)
    {
    	$slide = Slide::find($Request->id);
    	$slide->delete();
    	return view('admin/slide/danhsach',['thongbao'=> 'Đã xóa']);
    }
}
