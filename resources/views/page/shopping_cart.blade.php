@extends('master')
@section('content')
	<div class="container">
		<div id="content">
			
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Product</th>
							<th class="product-image">Image</th>
							<th class="product-description">Description</th>
							<th class="product-price">Price</th>
							<th class="product-promotion">Promotion Price</th>
							<th class="product-quantity">Qty.</th>
							<th class="product-subtotal">Total</th>
							<th class="product-remove">Remove</th>
						</tr>
					</thead>
					<tbody>
						<tr class="cart_item">
							<form action="{{Route('page/shopping',$product->id)}}" method="POST">
							<td class="product-name">
								{{$product->name}}
							</td>
							<td class="product-image">
								<img src="sourse/image/product/{{$product->image}}" alt="">
							</td>
							<td class="product-description">
								{{$product->description}}
							</td>
							<td class="product-price">
								<span class="amount">
									<select name="unit_price" class="unit_price" style="-moz-appearance: none;-webkit-appearance:none; appearance: none; border: 0">
										<option value="{{$product->unit_price}}">{{$product->unit_price}}</option>
										{{-- <option style="display: none;" value="{{number_format($product->promotion_price)}}">{{number_format($product->promotion_price)}}</option> --}}
								    </select>
								</span>
							</td>
							<td class="product-promotion">
								<span class="amount">
									<select name="promotion" class="promotion" style="-moz-appearance: none;-webkit-appearance:none; appearance: none; border: 0">
										@if($product->promotion_price == 0)
											<option value="0">{{'Không'}}</option>
									    @else
									    	<option value="{{$product->promotion_price}}">{{$product->promotion_price}}</option>	
										@endif
									</select>
									
								</span>
							</td>
							<td class="product-quantity">
								<select name="product-qty" id="product-qty" class="quantity" onchange="change()">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</td>

							<td class="product-subtotal">
								<span class="amount">
									<div class="total">
										@if($product->promotion_price ==0)
											{{$product->unit_price}}
										@else
											{{$product->promotion_price}}
										@endif
										<script type="text/javascript">
											function change()
											{
												quantity = document.getElementsByClassName('quantity')[0].value;
												price = document.getElementsByClassName('unit_price')[0].value;
												promotion = document.getElementsByClassName('promotion')[0].value;
												if (promotion == 0)
												{
													var total = price*quantity;
												} else {
													var total = promotion*quantity;
												}
												document.getElementsByClassName('total')[0].innerHTML= total;
											}
									    </script>
									</div>	
								</span>
							</td>
							<td class="product-remove">
								<a href="#" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						<tr class="cart_item">
							<form action="{{Route('page/shopping',$product->id)}}" method="POST">
							<td class="product-name">
								{{$product->name}}
							</td>
							<td class="product-image">
								<img src="sourse/image/product/{{$product->image}}" alt="">
							</td>
							<td class="product-description">
								{{$product->description}}
							</td>
							<td class="product-price">
								<span class="amount">
									<select name="unit_price" class="unit_price" style="-moz-appearance: none;-webkit-appearance:none; appearance: none; border: 0">
										<option value="{{$product->unit_price}}">{{$product->unit_price}}</option>
										{{-- <option style="display: none;" value="{{number_format($product->promotion_price)}}">{{number_format($product->promotion_price)}}</option> --}}
								    </select>
								</span>
							</td>
							<td class="product-promotion">
								<span class="amount">
									<select name="promotion" class="promotion" style="-moz-appearance: none;-webkit-appearance:none; appearance: none; border: 0">
										@if($product->promotion_price == 0)
											<option value="0">{{'Không'}}</option>
									    @else
									    	<option value="{{$product->promotion_price}}">{{$product->promotion_price}}</option>	
										@endif
									</select>
									
								</span>
							</td>
							<td class="product-quantity">
								<select name="product-qty" id="product-qty" class="quantity" onchange="change()">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</td>
   							@foreach()
							<td class="product-subtotal">
								<span class="amount">
									<div class="total">
										@if($product->promotion_price ==0)
											{{$product->unit_price}}
										@else
											{{$product->promotion_price}}
										@endif
										<script type="text/javascript">
											function change()
											{
												quantity = document.getElementsByClassName('quantity')[0].value;
												price = document.getElementsByClassName('unit_price')[0].value;
												promotion = document.getElementsByClassName('promotion')[0].value;
												if (promotion == 0)
												{
													var total = price*quantity;
												} else {
													var total = promotion*quantity;
												}
												document.getElementsByClassName('total')[0].innerHTML= total;
											}
									    </script>
									</div>	
								</span>
							</td>
							<td class="product-remove">
								<a href="#" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
						
				</table>
				<!-- End of Shop Table Products -->
			</div>

			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>

		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection