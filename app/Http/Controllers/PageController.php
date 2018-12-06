<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Slide;
use App\Product;
use App\ProductType;
use App\User;
use App\Bill;
use App\BillDetail;
use App\Customer;
use Session;

class PageController extends Controller
{
    //
    function __construct ()
    {
    	$producttype = ProductType::all();
    	$slide = Slide::all();
        $product = Product::all();
        $new_count = Product::where('new', 1)->get();
        $top_count = Product::where('promotion_price', '>', 0)->get();
    	view()->share('slide' ,$slide);
    	view()->share('producttype', $producttype);
        view()->share('product' ,$product);
        view()->share('new_count' ,$new_count);
        view()->share('top_count', $top_count);
        
    }
    public function getIndex()
    {
        if(Auth::check())
        {
            $user = Auth::user();
        } else {
            $user = '';
        }
    	$new_product = Product::where('new', 1)->paginate(4);
    	$top_product = Product::where('promotion_price', '>', 0)->paginate(8);	
    	return view('page.trangchu',['new_product'=> $new_product, 'top_product'=>$top_product, 'user'=>$user]);
    }
    public function postIndex(Request $Request)
    {
        if(Auth::check())
        {
            $user = Auth::user();

        } else {
            $user = '';
            
        } 
        $sl = 1;
        if(Session::has($Request->id)) {
            $sl = Session::get($Request->id) + 1;
            Session::forget($Request->id);    
        }
        Session::put($Request->id, $sl); 
        $new_product = Product::where('new', 1)->paginate(4);
        $top_product = Product::where('promotion_price', '>', 0)->paginate(8);  
        return view('page.trangchu',['new_product'=> $new_product, 'top_product'=>$top_product, 'user'=>$user]);
    }
    public function xoaIndex(Request $Request)
    {
        if(Auth::check())
        {
            $user = Auth::user();
        } else {
            $user = '';
        }
        Session::forget($Request->id);
        $new_product = Product::where('new', 1)->paginate(4);
        $top_product = Product::where('promotion_price', '>', 0)->paginate(8);  
        return view('page.trangchu',['new_product'=> $new_product, 'top_product'=>$top_product, 'user'=>$user]);
    }
    public function getProduct_type(Request $Request)
    {	
        if(Auth::check())
        {
            $user = Auth::user();
        } else {
            $user = '';
        }
        $session = $Request->session;
    	$product = Product::where('id_type',$Request->type)->paginate(6);
    	$count_product = Product::where('id_type',$Request->type)->get();
    	$type = ProductType::find($Request->type);
    	return view('page.product_type',['type'=>$type, 'product'=>$product, 'count_product'=>$count_product, 'user'=> $user, 'session' => $session]);
    }
    public function getContact(Request $Request)
    {
        if(Auth::check())
        {
            $user = Auth::user();
        } else {
            $user = '';
        }
        $session = $Request->session;
    	return view('page.contact',['user'=> $user, 'session' => $session]);
    }
    public function getAbout(Request $Request)
    {
        if(Auth::check())
        {
            $user = Auth::user();
        } else {
            $user = '';
        }
        $session = $Request->session;
    	return view('page.about',['user'=> $user, 'session' => $session]);
    }
    public function getShopping(Request $Request)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $bill = Bill::find($user->id);
        } else {
            $user = '';
        }
        $session = $Request->session;
        $product = Product::find($Request->id);
        return view('page/shopping_cart',['product'=>$product, 'user'=>$user, 'session' => $session]);
    }
    public function postShopping(Request $Request)
    {
        if(Auth::check())
        {
            $user = Auth::user();
        } else {
            $user = '';
        }
        $session = $Request->session;
        $product = Product::find($Request->id);
    }

}
