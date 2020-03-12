@extends('master')
@section('content')
@include('../header')
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
                        <a href="{{route('trang-chu')}}">Home</a>
						<i>|</i>
					</li>
					<li>Chi tiết sản phẩm</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- Product Detail Page -->
	<div class="banner-bootom-w3-agileits">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Chi tiết sản phẩm
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="col-md-5 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="public/uploads/product/{{$sanpham->image}}">
								<div class="thumb-image">
									<img src="public/uploads/product/{{$sanpham->image}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				<h3>{{$sanpham->name}}</h3>
				<div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked="">
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
				</div>
				<p>
					@if($sanpham->promotion_price==0)
						<span class="item_price">{{number_format($sanpham->unit_price)}} VND</span> 
					@else
						<span class="item_price">{{number_format($sanpham->promotion_price)}} VND</span>
						<del>{{number_format($sanpham->unit_price)}} VND</del>
					@endif
					{{-- <label>Free delivery</label> --}}
				</p>
				{{-- <div class="single-infoagile">
					<ul>
						<li>Cash on Delivery Eligible.</li>
						<li>Shipping Speed to Delivery.</li>
						<li>Sold and fulfilled by Supple Tek (3.6 out of 5 | 8 ratings).</li>
						<li>1 offer from <span class="item_price">$950.00</span></li>
					</ul>
				</div> --}}
				{{-- <div class="product-single-w3l">
					<p>
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>This is a 
                        <label>Vegetarian</label> product.
                    </p>
					<ul>
						<li>Best for Biryani and Pulao.</li>
						<li>After cooking, Zeeba Basmati rice grains attain an extra ordinary length of upto 2.4 cm/~1 inch.</li>
						<li>Zeeba Basmati rice adheres to the highest food afety standards as your health is paramount to us.</li>
						<li>Contains only the best and purest grade of basmati rice grain of Export quality.</li>
					</ul>
					<p>
						<i class="fa fa-refresh" aria-hidden="true"></i>All food products are
						<label>non-returnable.</label>
					</p>
				</div> --}}
				<div class="occasion-cart">
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_id" value="{{$sanpham->id}}" />
								<input type="hidden" name="item_image" value="{{$sanpham->image}}" />
								<input type="hidden" name="item_name" value="{{$sanpham->name}}" />
								<input type="hidden" name="amount" value="{{$sanpham->unit_price}}" />
								<input type="hidden" name="discount_amount" value="{{$sanpham->promotion_price == 0 ? 0 : $sanpham->unit_price-$sanpham->promotion_price}}" />
								<input type="hidden" name="currency_code" value="VND" />
								<input type="hidden" name="return" value=" " />
								<input type="hidden" name="cancel_return" value=" " />
								<input type="submit" name="submit" value="Add to cart" class="button" />
							</fieldset>
						</form>
					</div>

				</div>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //Product Detail Page -->
	<!-- special offers -->
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Sản phẩm liên quan
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="flexiselDemo1">
                    @foreach ($sp_tuongtu as $sptt)
					<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="{{route('chitietsanpham',$sptt->id)}}">
									<img src="public/uploads/product/{{$sptt->image}}" alt="" width="150" height="150">
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									<a href="{{route('chitietsanpham',$sptt->id)}}">{{$sptt->name}}</a>
								</h4>
								<div class="w3l-pricehkj">  
                                    @if($sptt->promotion_price==0)
                                        <span class="item_price">{{number_format($sptt->unit_price)}}VND</span> 
                                    @else
                                        <span class="item_price">{{number_format($sptt->promotion_price)}} VND</span>
                                        <del>{{number_format($sptt->unit_price)}} VND</del>
                                    @endif
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<form action="#" method="post">
										<fieldset>
											<input type="hidden" name="cmd" value="_cart" />
											<input type="hidden" name="add" value="1" />
											<input type="hidden" name="business" value=" " />
											<input type="hidden" name="item_id" value="{{$sptt->id}}" />
											<input type="hidden" name="item_image" value="{{$sptt->image}}" />
											<input type="hidden" name="item_name" value="{{$sptt->name}}" />
											<input type="hidden" name="amount" value="{{$sptt->unit_price}}" />
											<input type="hidden" name="discount_amount" value="{{$sptt->promotion_price == 0 ? 0 : $sptt->unit_price-$sptt->promotion_price}}" />
											<input type="hidden" name="currency_code" value="VND" />
											<input type="hidden" name="return" value=" " />
											<input type="hidden" name="cancel_return" value=" " />
											<input type="submit" name="submit" value="Add to cart" class="button" />
										</fieldset>
									</form>
								</div>
							</div>
                        </div>
                    </li>
                    @endforeach
				</ul>
			</div>
		</div>
	</div>
	<!-- //special offers -->
@include('../footer')
@endsection
