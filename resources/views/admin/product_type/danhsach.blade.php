@extends('admin.user.master')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product Type
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
                                <th>Image</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productType as $pro)
	                            <tr class="even gradeC" align="center">
	                                <td>{{$pro->id}}</td>
	                                <td>{{$pro->name}}</td>
	                                <td>{{$pro->description}}</td>
	                                <td><img src="sourse/image/product/{{$pro->image}}" alt="" style="height: 250px; width:300px"></td>
	                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{Route('admin/producttype/xoa', $pro->id)}}"> Delete</a></td>
	                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{Route('admin/producttype/sua', $pro->id)}}">Edit</a></td>
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