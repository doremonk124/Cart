
@extends('admin.user.master')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product 
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
                                <th>Name</th>
                                <th>Description</th>
                                <th>unit_price</th>
                                <th>promotion_price</th>
                                <th>unit</th>
                                <th>new</th>
                                <th>Image</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $pro)
	                            <tr class="even gradeC" align="center">
	                                <td>{{$pro->id}}</td>
	                                <td>{{$pro->name}}</td>
	                                <td>{{$pro->description}}</td>
	                                <td>{{$pro->unit_price}}</td>
	                                <td>{{$pro->promotion_price}}</td>
	                                <td>{{$pro->unit}}</td>
	                                <td>
	                                	@if($pro->new = 1)
	                                		{{'New'}}
	                                	@endif
	                                </td>
	                                <td><img src="sourse/image/product/{{$pro->image}}" alt="" style="height: 200px; width:250px"></td>
	                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{Route('admin/product/xoa', $pro->id)}}"> Delete</a></td>
	                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{Route('admin/product/sua', $pro->id)}}">Edit</a></td>
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