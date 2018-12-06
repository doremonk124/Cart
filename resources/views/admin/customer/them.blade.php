
@if(Auth::check())
@extends('admin.user.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Add</small>
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
                    		@foreach($errors->all() as $er)
	                    		<div class="alert alert-danger">
	                    			{{$er}}
	                    		</div>
                    		@endforeach
                    	@endif
                        <form action="{{Route('admin/customer/them')}}" method="POST">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter Customer Name" />
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <label class="radio-inline">
                                    <input name="gender" value="Nam" checked="" type="radio">Nam
                                </label>
                                <label class="radio-inline">
                                    <input name="gender" value="Nữ" type="radio">Nữ
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Please Enter Customer Email" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control" cols="30" rows="5" placeholder="Please Enter Customer Address"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone_number" placeholder="Please Enter Customer Phone" />

                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <input type="text" class="form-control" name="note" placeholder="Please Enter Customer Note" />
                            </div>
                            <button type="submit" class="btn btn-default">User Add</button>
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