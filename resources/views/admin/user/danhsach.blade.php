@if(Auth::check())
    @extends('admin.user.master')
    @section('content')
    <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                        	@if(isset($thongbao))
                        		<div class="alert alert-success">
                        			{{$thongbao}}
                        		</div>
                        	@endif
                            <h1 class="page-header">User
                                <small>List</small>
                            </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>Fullname</th>
                                    <th>Level</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($user as $users)
    	                            <tr class="odd gradeX" align="center">
    	                                <td>{{$users->id}}</td>
    	                                <td>{{$users->full_name}}</td>
    	                                <td>{{$users->quyen}}</td>
    	                                <td>{{$users->email}}</td>
    	                                <td>{{$users->phone}}</td>
    	                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{Route('admin/user/xoa',$users->id)}}"> Delete</a></td>
    	                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{Route('admin/user/sua',$users->id)}}">Edit</a></td>
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
@else 
    {{'Cannot find'}}
@endif