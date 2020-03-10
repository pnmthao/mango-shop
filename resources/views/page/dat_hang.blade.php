@extends('master')
@section('content')
<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="index">Home</a>
					<i>|</i>
				</li>
				<li>Thanh toán</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->
<!-- checkout page -->
<div class="privacy">
	<div class="container">
		<!-- tittle heading -->
		<h3 class="tittle-w3l">Thanh toán
			<span class="heading-style">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</h3>
		<!-- //tittle heading -->
		<div class="checkout-right">
			<h4>Giỏ hàng của bạn có:
				<span id="product-qty"></span>
			</h4>
			<div class="table-responsive">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>STT</th>
							<th>Sản phẩm</th>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Giảm giá</th>
							<th>Đơn giá</th>
							<th>Thành tiền</th>
							<th>Xóa</th>
						</tr>
					</thead>
					<tbody id="body-checkout"></tbody>
				</table>
			</div>
		</div>
		<div class="checkout-left">
			<div class="address_form_agile">
				<h4>Thông tin đặt hàng</h4>
				@if(Session::has('thongbao'))
					<div class="alert alert-success">{{Session::get('thongbao')}}</div>
				@endif
				<form action="dathang" method="post" class="creditly-card-form agileinfo_form">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="creditly-wrapper wthree, w3_agileits_wrapper">
						<div class="information-wrapper">
							<div class="first-row">
								<div class="controls">
									<label for="name">Họ tên (*)</label>
								<input class="billing-address-name" type="text" name="name" value="{{Session::get('customer_name')}}" placeholder="Họ tên" required>
								</div>
								<div class="controls">
									<label for="email">Email (*)</label>
									<input type="text" name="email" value="{{Session::get('customer_email')}}" placeholder="expample@gmail.com" required>
								</div>
								<div class="controls">
									<label for="address">Địa chỉ (*)</label>
									<input type="text" name="address" value="{{Session::get('customer_address')}}" placeholder="Địa chỉ giao hàng" required>
								</div>
								<div class="controls">
									<label for="phone">Điện thoại (*)</label>
									<input type="text" name="phone" value="{{Session::get('customer_phone')}}" placeholder="Số điện thoại" required>
								</div>
							</div>
							<button class="submit check_out">Delivery to this Address</button>
						</div>
					</div>
				</form>
				<div class="checkout-right-basket">
					<a href="payment">Thanh toán
						<span class="fa fa-hand-o-right" aria-hidden="true"></span>
					</a>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //checkout page -->
@endsection