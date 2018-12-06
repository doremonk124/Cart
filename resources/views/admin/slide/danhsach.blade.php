
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
                            <h1 class="page-header">Slide
                                <small>List</small>
                            </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>Link</th>
                                    <th>Image</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($Slide as $users)
    	                            <tr class="odd gradeX" align="center">
    	                                <td>{{$users->id}}</td>
    	                                <td>{{$users->link}}</td>
    	                                <td><img src="sourse/image/slide/{{$users->image}}" alt="" style="height: 250px; width:300px"></td>
    	                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{Route('admin/slide/xoa',$users->id)}}"> Delete</a></td>
    	                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{Route('admin/slide/sua',$users->id)}}">Edit</a></td>
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