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
					<li>Giới thiệu</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- about page -->
	<!-- welcome -->
	<div class="welcome">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Giới thiệu về cửa hàng
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="w3l-welcome-info">
				<div class="col-sm-6 col-xs-6 welcome-grids">
					<div class="welcome-img">
						<img src="images/about.jpg" class="img-responsive zoom-img" alt="">
					</div>
				</div>
				<div class="col-sm-6 col-xs-6 welcome-grids">
					<div class="welcome-img">
						<img src="images/about2.jpg" class="img-responsive zoom-img" alt="">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="w3l-welcome-text">
				<p>Hệ thống siêu thị và chuỗi cửa hàng VinMart & VinMart+ là hai thương hiệu bán lẻ thuộc Tập Đoàn Masan Group. Ra đời từ năm 2014 cho đến nay, hệ thống VinMart & VinMart+ không ngừng phát triển vươn lên, ra mắt với hơn 132 siêu thị VinMart và gần 3000 cửa hàng VinMart+ phủ rộng khắp Việt Nam, mang đến cho người tiêu dùng sự lựa chọn đa dạng về chất lượng hàng hóa và dịch vụ, đáp ứng đầy đủ nhu cầu trải nghiệm mua sắm từ bình dân đến cao cấp của mọi khách hàng.</p>
			</div>
		</div>
	</div>
	<!-- //welcome -->
	<!-- video -->
	<div class="about">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Xem thêm thông tin chi tiết
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="about-tp">
				<div class="col-md-8 about-agileits-w3layouts-left">
					<iframe src="https://player.vimeo.com/video/15520702?color=ffffff&title=0&byline=0"></iframe>
				</div>
				<div class="col-md-4 about-agileits-w3layouts-right">
					<div class="img-video-about">
						<img src="images/videoimg2.png" alt="">
					</div>
					<h4>Mango Shop</h4>
					<p>AN TÂM MUA SẮM MỖI NGÀY</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //video-->
	<!-- //about page -->
@include('../footer')
@endsection