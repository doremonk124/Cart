@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($producttype as $pro)
								<li><a href="{{Route('producttype', $pro->id)}}">{{$pro->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{$type->name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">found {{Count($count_product)}} items</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $pro)
									<div class="col-sm-4" style="height: 400px">
										<div class="single-item">
											@if($pro->promotion_price != 0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											<div class="single-item-header">
												<a href="product.html"><img src="sourse/image/product/{{$pro->image}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$pro->name}}</p>
												<p class="single-item-price">
													@if($pro->promotion_price != 0)
														<span class="flash-del">{{number_format($pro->unit_price)}}</span>
														<span class="flash-sale">{{number_format($pro->promotion_price)}}</span>
													@else
														<span class="flash-sale">{{number_format($pro->unit_price)}}</span>
													@endif
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
								{{$product->links()}}
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection