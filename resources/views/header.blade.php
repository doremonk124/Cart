<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(($user != ''))
							<li><a href="#"><i class="fa fa-user"></i>{{$user['full_name']}}</a></li>
							<li><a href="{{Route('page/logout')}}">Đăng xuất</a></li>
						@else	
							<li><a href="{{Route('page/signup')}}">Đăng kí</a></li>
							<li><a href="{{Route('page/login')}}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="sourse/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@foreach($product as $new)
									<script>
										function onclick_{{$new->id}}() {
											alert('Thêm sản phẩm {{$new->name}} thành công');
										}
									</script>			
								@endforeach 
								@foreach(Session::all() as $key => $value)
									@foreach($product as $pro)
										@if($key == $pro->name)
											<?php $huy = 1; $total = 0;?>
										@endif
									@endforeach
								@endforeach
								@if(isset($huy))
									@if($huy == 1)
										@foreach(Session::all() as $key => $value)
											@foreach($product as $pro)
												@if($pro->name == $key)
												    <div class="cart-item">
														<div class="media">
															<a class="pull-left" href="#"><img src="sourse/image/product/{{$pro->image}}" alt="" height="70px" width="70px"></a>
															<div class="media-body" style="float: left; padding-left: 30px">
																<span class="cart-item-title">{{$pro->name}}</span>
																<span class="cart-item-options">Số lượng : {{$value}} | <a href="{{Route('trang2', $pro->name)}}">Xóa</a></span>
																<span class="cart-item-amount"><span>
																	Giá :
																	@if($pro->promotion_price == 0)
																		{{number_format($pro->unit_price*$value)}}
																		<?php $total = $total + $pro->unit_price*$value ?>
																	@else
																		{{number_format($pro->promotion_price*$value)}}
																		<?php $total = $total + $pro->promotion_price*$value ?>
																	@endif
																</span></span>
															</div>
														</div>
													</div>
												@endif
											@endforeach
										@endforeach	
									@endif
									<div class="clearfix">
										<p style="color: green; font-size: 22px;">Tổng giá : {{number_format($total)}}</p>
									</div>
									<div class="center bill">
										<a href="#">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								@else
									<?php echo "Giỏ hàng trống";?>
								@endif	
							</div>
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
					<nav class="main-menu">
						<ul class="l-inline ov">
							<li><a href="{{route('Trangchu')}}">Home</a></li>
							<li><a>Product</a>
								<ul class="sub-menu">
									@foreach($producttype as $pro)
										<li><a href="{{route('producttype',$pro->id)}}">{{$pro->name}}</a></li>
									@endforeach
								</ul>
							</li>
							<li><a href="{{route('about')}}">About</a></li>
							<li><a href="{{route('contact')}}">Contacts</a></li>
						</ul>
						<div class="clearfix"></div>
					</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->