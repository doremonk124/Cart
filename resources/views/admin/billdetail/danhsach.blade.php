
@extends('admin.user.master')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Bill Detail
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(isset($thongbao))
                    	<div class="alert alert-success">
                    		{{$thongbao}}
                    	</div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name Customer</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit_price</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Change</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($BillDetail as $pro)
	                            <tr class="even gradeC" align="center">
	                                <td>{{$pro->id}}</td>
	                                <td>{{$pro->bill->customer->name}}</td>
	                                <td>{{$pro->product->name}}</td>
	                                <td>{{$pro->quantity}}</td>
	                                	<?php if($pro->product->promotion == 0)
	                                		{
	                                			$price = $pro->product->unit_price;
	                                		} else {
	                                			$price = $pro->product->promotion;
	                                		}
	                                		$total = $price*($pro->quantity);
	                                	?>
	                                <td>{{$pro->unit_price}}</td>
	                                <td>{{$total}}</td>
	                                <td>
                                        <form action="{{Route('admin/billdetail/danhsach')}}" method="post">
                                            <select class="form-control select" name="select" style="background-color: green; color: white;">
                                                @if($pro->status == 'Chưa thanh toán')
                                                    <option value="{{'Chưa thanh toán'}}">Chưa thanh toán</option>
                                                    <option value="{{'Đã thanh toán'}}">Đã thanh toán</option>
                                                    <option value="{{'Hủy bỏ'}}">Hủy bỏ</option>
                                                @elseif($pro->status == 'Đã thanh toán')
                                                    <option value="{{'Đã thanh toán'}}">Đã thanh toán</option>
                                                    <option value="{{'Chưa thanh toán'}}">Chưa thanh toán</option>
                                                    <option value="{{'Hủy bỏ'}}">Hủy bỏ</option>
                                                @else
                                                    <option value="{{'Hủy bỏ'}}">Hủy bỏ</option>
                                                    <option value="{{'Đã thanh toán'}}">Đã thanh toán</option>
                                                    <option value="{{'Chưa thanh toán'}}">Chưa thanh toán</option>
                                                @endif     
                                            </select>
                                            <input type="hidden" class="form-control" name="id" value="{{$pro->id}}">
                                    </td>
                                    <td class="center">
                                            <button type="submit" class="btn btn-default" style="background-color: red; color: white;">Xác nhận thay đổi</button>
                                            {{csrf_field()}}
                                        </form>
                                    </td>
	                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{Route('admin/billdetail/sua', $pro->id)}}">Edit</a></td>
	                            </tr>
	                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection