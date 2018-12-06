@if(Auth::check())
@extends('admin.user.master')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        	{{$users->email}}
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
                        <form action="{{Route('admin/user/sua', $users->id)}}" method="POST">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="full_name" value="{{$users->full_name}}" placeholder="{{$users->full_name}}" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Please Enter Password To Change"  />
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="number" name="phone" value="{{$users->phone}}"" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" type="text" name="address" value="{{$users->address}}"" />
                            </div>
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="level" value="1" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="level" value="0" checked="" type="radio">Member
                                </label>
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