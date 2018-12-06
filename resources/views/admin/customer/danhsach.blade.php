
@extends('admin.user.master')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Customer
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
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Note</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer as $pro)
	                            <tr class="even gradeC" align="center">
	                                <td>{{$pro->id}}</td>
	                                <td>{{$pro->name}}</td>
	                                <td>{{$pro->gender}}</td>
	                                <td>{{$pro->email}}</td>
	                                <td>{{$pro->address}}</td>
	                                <td>{{$pro->phone_number}}</td>
	                                <td>{{$pro->note}}</td>
	                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{Route('admin/customer/xoa', $pro->id)}}"> Delete</a></td>
	                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{Route('admin/customer/sua', $pro->id)}}">Edit</a></td>
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