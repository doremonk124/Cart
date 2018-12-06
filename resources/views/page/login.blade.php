@extends('master')
@section('content')
	<div class="container">
		<div id="content">
			@if(isset($thongbao))
				<div class="alert alert-success">
					{{$thongbao}}
				</div>
			@endif
			@if(isset($thatbai))
				<div class="alert alert-danger">
					{{$thatbai}}
				</div>
			@endif
			<form action="{{Route('page/login')}}" method="post" class="beta-form-checkout">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email">
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" name="password">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
				{{csrf_field()}}
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection