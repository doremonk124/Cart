
@if(Auth::check())
@extends('admin.user.master')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        	{{$billdetail->bill->customer->name}}'s Bill Detail
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
                        <form action="{{Route('admin/billdetail/sua', $billdetail->id)}}" method="POST">
                            <div class="form-group">
                                <label>Bill</label>
                                <select class="form-control" name="select">
                                    @foreach($Bill as $value)
                                        <option value="{{$value->id}}">{{$value->customer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Id Product</label>
                                <input type="number" class="form-control" name="id_product" value="{{$billdetail->id_product}}" />
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" class="form-control" name="quantity" value="{{$billdetail->quantity}}" />
                            </div>
                            <button type="submit" class="btn btn-default">Bill Add</button>
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