<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Slide;
use App\Customer;
use App\Product;
use App\Bill;
use App\BillDetail;
use App\ProductType;
use Session;
use Carbon\Carbon;

class AdminController extends Controller
{
    //
    function __construct ()
    {
        $producttype = ProductType::all();
        $product = Product::all();
        $slide = Slide::all();
        $new_count = Product::where('new', 1)->get();
        $top_count = Product::where('promotion_price', '>', 0)->get();
        view()->share('product' ,$product);
        view()->share('slide' ,$slide);
        view()->share('producttype', $producttype);
        view()->share('new_count' ,$new_count);
        view()->share('top_count', $top_count);
    }
    public function getloginAdmin()
    {
    	return view('page.login',['user'=> '']);
    }
    public function postloginAdmin(Request $Request)
    {
        $product = Product::all();
    	$this->validate($Request,
    		[
    			'email'=>'required',
    			'password'=> 'required',	
    	 	],
    	 	[
    	 		'email.required' => 'Bạn chưa nhập email',
    	 		'password.required' => 'Bạn chưa nhập mật khẩu',
    	 	]
    	);
    	if(Auth::attempt(['email'=>$Request->email, 'password'=>$Request->password]))
    	{
    		if (Auth::user()->quyen == 1)
    		{
    			$user = User::all();
    			return view('admin/user/danhsach',['user'=>$user]);
    		} else {
                $user = Auth::user();
    			
                $customer = new Customer;
                $customer->id_user = $user->id;
                $customer->name = $user->name;
                $customer->email = $user->email;
                $customer->phone = $user->phone;
                $customer->address = $user->address;
                // $customer->save();
                $bill = new Bill;
                $now = Carbon::now();
                $bill->id_customer = $customer->id;
                $bill->date_order = $now->year.'-'.$now->month.'-'.$now->day;
                // $bill->date_order = $now->toDateString();
                // $bill->save();
                $sessionall = Session::all();
                foreach ($sessionall as $key => $value) {
                    $billdetail = new BillDetail;
                    $billdetail->id_bill = $bill->id;
                    foreach ($product as $pro) {
                        if ($key == $pro->name)
                        {
                            $billdetail->id_product = $pro->id;
                            $billdetail->quantity = $value;
                            if ($pro->promotion_price > 0)
                            {
                                $billdetail->unit_price = $pro->promotion_price;
                            } else {
                                $billdetail->unit_price = $pro->unit_price;
                            }
                        }
                    }
                    $billdetail->status = 'Chưa thanh toán';
                    // $billdetail->save();
                }     
    		}
            return view('page/login',['thongbao'=> 'Đã đăng nhập thành công', 'user'=>$user]); 		
    	} 
    	else 
    	{
    		return view('page/login', ['thatbai'=> 'Đăng nhập thất bại','user'=>'']);
    	}
    }
    public function logoutAdmin()
    {
    	Auth::logout();
        Session::flush();
    	return view('page.login',['user'=>''] );
    }
    public function getSignUp()
    {
        return view('page/signup',['user'=>'']);
    }
    public function postSignUp()
    {
        return view('page/signup',['thongbao'=>'Đăng kí tài khoản thành công','user'=>'']);
    }
}
