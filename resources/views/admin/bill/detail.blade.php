
@extends('admin.user.master')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{$bill->name}}'s Bill_details
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
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($BillDetail as $pro)
	                            <tr class="even gradeC" align="center">
	                                <td>{{$pro->id}}</td><?php $idProduct=$pro->id_product;?>
	                                <td>{{$product->get($idProduct)}}</td>
	                                <td>{{$pro->quantity}}</td>
	                                <td>{{$pro->unit_price}}</td>
	                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{Route('admin/billdetail/xoa', $pro->id)}}"> Delete</a></td>
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