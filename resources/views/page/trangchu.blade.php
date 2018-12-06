@extends('master')

@section('content')
<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									<!-- THE FIRST SLIDE -->
									@foreach($slide as $sl)
										<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
							            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
														<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="sourse/image/slide/{{$sl->image}}" data-src="sourse/assets/dest/images/thumbs/1.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('sourse/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
														</div>
													</div>

							        	</li>
						        	@endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">found {{count($new_count)}} items</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_product as $new)
									<div class="col-sm-3" style="height: 400px">
										<div class="single-item">
											@if($new->promotion_price != 0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											<div class="single-item-header">
												<a href="product.html"><img src="sourse/image/product/{{$new->image}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$new->name}}</p>
												<p class="single-item-price">
													@if($new->promotion_price != 0)
														<span class="flash-del">{{number_format($new->unit_price)}}</span>
														<span class="flash-sale">{{number_format($new->promotion_price)}}</span>
													@else
														<span class="flash-sale">{{number_format($new->unit_price)}}</span>
													@endif
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left product_{{$new->id}}" value="product_{{$new->id}}" onclick="onclick_{{$new->id}}()" href="{{Route('trang1', $new->name)}}"><i class="fa fa-shopping-cart"></i></a>
												
												<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
							{{$new_product->links()}}
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Top Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">found {{count($top_count)}} items</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($top_product as $top)								
									<div class="col-sm-3" style="height: 400px">
										<div class="single-item">
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

											<div class="single-item-header">
												<a href="product.html"><img src="sourse/image/product/{{$top->image}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$top->name}}</p>
												<p class="single-item-price">
													<span class="flash-del">{{number_format($top->unit_price)}}</span>
													<span class="flash-sale">{{number_format($top->promotion_price)}}</span>
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left product_{{$top->id}}" value="product_{{$top->id}}" onclick="onclick_{{$top->id}}()" href="{{Route('trang1', $top->name)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
							{{$new_product->links()}}
							<div class="space40">&nbsp;</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection