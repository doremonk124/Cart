
@if(Auth::check())
@extends('admin.user.master')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        	{{$slide->id}}
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
                        @if(isset($duoi))
                            <div class="alert alert-danger">
                                {{$duoi}}
                            </div>
                        @endif
                        <form action="{{Route('admin/slide/sua', $slide->id)}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" value="{{$slide->link}}" />
                            </div>
                            <div class="form-group">
                                <label>Image (Kích thước phải nhỏ hơn 2MB)</label>
                                <input class="form-control" type="file" name="image" />
                            </div>
                            <button type="submit" class="btn btn-default">Slide Edit</button>
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