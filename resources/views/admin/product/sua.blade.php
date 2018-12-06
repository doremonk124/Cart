
@if(Auth::check())
@extends('admin.user.master')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        	{{$product->name}}
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    	@if(isset($thongbao))
                    		<div class="alert alert-success">
                    			{{$thongbao}}
                    		</div>
                    	@endif
                    	@if(isset($duoi))
                    		<div class="alert alert-danger">
                    			{{$duoi}}
                    		</div>
                    	@endif
                    	@if(count($errors)>0)
                    		@foreach($errors->all() as $error)
                    			<div class="alert alert-danger">
                    				{{$error}}
                    			</div>
                    		@endforeach
                    	@endif
                        <form action="{{Route('admin/product/sua', $product->id)}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{$product->name}}" placeholder="{{$product->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="5" >{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Product</label>
                                <select class="form-control" name="select">
                                    @foreach($productType as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Unit_price</label>
                                <input class="form-control" name="unit_price" placeholder="Please Enter Product Unit_price" />
                            </div>

                            <div class="form-group">
                                <label>Promotion_price</label>
                                <input class="form-control" name="promotion_price" placeholder="Please Enter Product Promotion_price" />
                            </div>
                            <div class="form-group">
                                <label>Image (Kích thước ảnh phải nhỏ hơn 2MB)</label>
                                <input class="form-control" type="file" name="image" />
                            </div>
                            <button type="submit" class="btn btn-default">User Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                            {{csrf_field()}}
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
@else
    {{'404 not found'}}
@endif