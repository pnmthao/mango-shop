@extends('master')
@section('content')
@include('../header')
<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="index">@lang('checkout.home')</a>
					<i>|</i>
				</li>
				<li>@lang('checkout.title')</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->
<!-- checkout page -->
<div class="privacy">
	<div class="container">
		<!-- tittle heading -->
		<h3 class="tittle-w3l">@lang('checkout.title')
			<span class="heading-style">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</h3>
		<!-- //tittle heading -->
		<div class="checkout-right">
			<h4>@lang('checkout.title_cart')
				<span id="product-qty"></span>
			</h4>
			<div class="table-responsive">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>@lang('checkout.cart_stt')</th>
							<th>@lang('checkout.cart_product_image')</th>
							<th>@lang('checkout.cart_product_name')</th>
							<th>@lang('checkout.cart_product_quantity')</th>
							<th>@lang('checkout.cart_product_discounts')</th>
							<th>@lang('checkout.cart_product_unit_price')</th>
							<th>@lang('checkout.cart_product_total')</th>
							<th>@lang('checkout.cart_product_del')</th>
						</tr>
					</thead>
					<tbody id="body-checkout"></tbody>
				</table>
			</div>
		</div>
		<div class="checkout-left">
			<div class="address_form_agile">
				<h4>@lang('checkout.order_info')</h4>
				@if(Session::has('thongbao'))
					<div class="alert alert-success">{{Session::get('thongbao')}}</div>
				@endif
				<form action="dathang" method="post" class="creditly-card-form agileinfo_form">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="creditly-wrapper wthree, w3_agileits_wrapper">
						<div class="information-wrapper">
							<div class="first-row">
								<div class="controls">
									<label for="name">@lang('checkout.order_name')</label>
								<input class="billing-address-name" type="text" name="name" value="{{Session::get('customer_name')}}" placeholder="@if(Session::get('locale') == 'en') Enter Full Name @else Nhập họ tên @endif" required>
								</div>
								<div class="controls">
									<label for="email">@lang('checkout.order_email')</label>
									<input type="text" name="email" value="{{Session::get('customer_email')}}" placeholder="expample@gmail.com" required>
								</div>
								<div class="controls">
									<label for="address">@lang('checkout.order_address')</label>
									<input type="text" name="address" value="{{Session::get('customer_address')}}" placeholder="@if(Session::get('locale') == 'en') Enter Address @else Nhập địa chỉ giao hàng @endif" required>
								</div>
								<div class="controls">
									<label for="phone">@lang('checkout.order_phone')</label>
									<input type="text" name="phone" value="{{Session::get('customer_phone')}}" placeholder="@if(Session::get('locale') == 'en') Enter Phone Number @else Nhập số điện thoại @endif" required>
								</div>
							</div>
							<button class="submit check_out">@lang('checkout.order_delivery')</button>
						</div>
					</div>
				</form>
				<div class="checkout-right-basket">
					<a href="payment">@lang('checkout.payment')
						<span class="fa fa-hand-o-right" aria-hidden="true"></span>
					</a>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //checkout page -->
@include('../footer')
@endsection