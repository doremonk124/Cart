
@if(Auth::check())
@extends('admin.user.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bill
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
                    	@if(count($errors)>0)
                    		@foreach($errors->all() as $er)
	                    		<div class="alert alert-danger">
	                    			{{$er}}
	                    		</div>
                    		@endforeach
                    	@endif
                        <form action="{{Route('admin/bill/them')}}" method="POST">
                            <div class="form-group">
                                <label>Customer</label>
                                <select class="form-control" name="select">
                                    @foreach($Customer as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Payment</label>
                                <label class="radio-inline">
                                    <input name="payment" value="COD" checked="" type="radio">COD
                                </label>
                                <label class="radio-inline">
                                    <input name="payment" value="ATM" type="radio">ATM
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Total</label>
                                <input type="text" class="form-control" name="total" placeholder="Please Enter Total" />
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <textarea name="note" class="form-control" cols="30" rows="5" placeholder="Please Enter Note"></textarea>
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