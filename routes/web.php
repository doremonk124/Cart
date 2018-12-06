<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('index','PageController@getIndex')->name('Trangchu');
Route::get('index/{id}','PageController@postIndex')->name('trang1');
Route::get('Index/{id}','PageController@xoaIndex')->name('trang2');
Route::get('producttype/{type}', 'PageController@getProduct_type')->name('producttype');
Route::get('contact','PageController@getContact')->name('contact');
Route::get('about','PageController@getAbout')->name('about');
Route::get('page/login', 'AdminController@getloginAdmin')->name('page/login');
Route::post('page/login', 'AdminController@postloginAdmin')->name('page/login');
Route::get('page/signup', 'AdminController@getSignUp')->name('page/signup');
Route::post('page/signup', 'AdminController@postSignUp')->name('page/signip');
Route::get('page/logout', 'AdminController@logoutAdmin')->name('page/logout');
Route::get('page/shopping/{id}', 'PageController@getShopping')->name('page/shopping');
Route::post('page/shopping/{id}', 'PageController@postShopping')->name('page/shopping');
Route::group(['prefix' => 'admin', 'middleware'=> 'adminLogin'], function(){
	Route::group(['prefix' => 'producttype'], function(){
		Route::get('danhsach', 'ProductTypeController@getDanhSach')->name('admin/producttype/danhsach');
		Route::get('sua/{id}', 'ProductTypeController@getSua')->name('admin/producttype/sua');
		Route::post('sua/{id}', 'ProductTypeController@postSua')->name('admin/producttype/sua');
		Route::get('them', 'ProductTypeController@getThem')->name('admin/producttype/them');
		Route::get('xoa/{id}', 'ProductTypeController@getXoa')->name('admin/producttype/xoa');
		Route::post('them', 'ProductTypeController@postThem')->name('admin/producttype/them');
    });
    Route::group(['prefix' => 'product'], function(){
		Route::get('danhsach', 'ProductController@getDanhSach')->name('admin/product/danhsach');
		Route::get('sua/{id}', 'ProductController@getSua')->name('admin/product/sua');
		Route::post('sua/{id}', 'ProductController@postSua')->name('admin/product/sua');
		Route::get('them', 'ProductController@getThem')->name('admin/product/them');
		Route::get('xoa/{id}', 'ProductController@getXoa')->name('admin/product/xoa');
		Route::post('them', 'ProductController@postThem')->name('admin/product/them');
    });
    Route::group(['prefix' => 'customer'], function(){
		Route::get('danhsach', 'CustomerController@getDanhSach')->name('admin/customer/danhsach');
		Route::get('sua/{id}', 'CustomerController@getSua')->name('admin/customer/sua');
		Route::post('sua/{id}', 'CustomerController@postSua')->name('admin/customer/sua');
		Route::get('them', 'CustomerController@getThem')->name('admin/customer/them');
		Route::get('xoa/{id}', 'CustomerController@getXoa')->name('admin/customer/xoa');
		Route::post('them', 'CustomerController@postThem')->name('admin/customer/them');
    });
    Route::group(['prefix' => 'user'], function(){
		Route::get('danhsach', 'UserController@getDanhSach')->name('admin/user/danhsach');
		Route::get('sua/{id}', 'UserController@getSua')->name('admin/user/sua');
		Route::post('sua/{id}', 'UserController@postSua')->name('admin/user/sua');
		Route::get('them', 'UserController@getThem')->name('admin/user/them');
		Route::get('xoa/{id}', 'UserController@getXoa')->name('admin/user/xoa');
		Route::post('them', 'UserController@postThem')->name('admin/user/them');
    });
    Route::group(['prefix' => 'bill'], function(){
    	Route::get('detail/{id}', 'BillController@getDetail')->name('admin/bill/detail');
    	Route::get('danhsach', 'BillController@getDanhSach')->name('admin/bill/danhsach');
    	Route::post('danhsach', 'BillController@postDanhSach')->name('admin/bill/danhsach');
		Route::get('them', 'BillController@getThem')->name('admin/bill/them');
		Route::post('them', 'BillController@postThem')->name('admin/bill/them');
		Route::get('sua/{id}', 'BillController@getSua')->name('admin/bill/sua');
		Route::post('sua/{id}', 'BillController@postSua')->name('admin/bill/sua');
		Route::get('xoa/{id}', 'BillController@getXoa')->name('admin/bill/xoa');
    });
    Route::group(['prefix' => 'billdetail'], function(){
    	Route::get('danhsach', 'BillDetailController@getDanhSach')->name('admin/billdetail/danhsach');
    	Route::post('danhsach', 'BillDetailController@postDanhSach')->name('admin/billdetail/danhsach');
		Route::get('them', 'BillDetailController@getThem')->name('admin/billdetail/them');
		Route::post('them', 'BillDetailController@postThem')->name('admin/billdetail/them');
		Route::get('sua/{id}', 'BillDetailController@getSua')->name('admin/billdetail/sua');
		Route::post('sua/{id}', 'BillDetailController@postSua')->name('admin/billdetail/sua');
		Route::get('xoa/{id}', 'BillDetailController@getXoa')->name('admin/billdetail/xoa');
    });
    Route::group(['prefix' => 'slide'], function(){
    	Route::get('danhsach', 'SlideController@getDanhSach')->name('admin/slide/danhsach');
		Route::get('them', 'SlideController@getThem')->name('admin/slide/them');
		Route::post('them', 'SlideController@postThem')->name('admin/slide/them');
		Route::get('sua/{id}', 'SlideController@getSua')->name('admin/slide/sua');
		Route::post('sua/{id}', 'SlideController@postSua')->name('admin/slide/sua');
		Route::get('xoa/{id}', 'SlideController@getXoa')->name('admin/slide/xoa');
    });
});