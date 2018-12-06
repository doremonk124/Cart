
@if(Auth::check())
@extends('admin.user.master')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        	{{$Customer->email}}
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
                    	@if(count($errors)>0)
                    		@foreach($errors->all() as $error)
                    			<div class="alert alert-danger">
                    				{{$error}}
                    			</div>
                    		@endforeach
                    	@endif
                        <form action="{{Route('admin/customer/sua', $Customer->id)}}" method="POST">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{$Customer->name}}" placeholder="{{$Customer->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="{{$Customer->email}}" value="{{$Customer->email}}" />
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
                                <label>Phone</label>
                                <input class="form-control" type="text" name="phone_number" value="{{$Customer->phone_number}}" placeholder="{{$Customer->phone_number}}"/>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" type="text" name="address" value="{{$Customer->address}}"" />
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <input class="form-control" type="text" name="note" value="{{$Customer->note}}"" />
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