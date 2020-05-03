@extends('master')
@section('content')
@include('../header')
<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="{{route('trang-chu')}}">@lang('about_us.home')</a>
					<i>|</i>
				</li>
				<li>@lang('about_us.title')</li>
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
		<h3 class="tittle-w3l">@lang('about_us.subtitle')
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
			<p>@lang('about_us.logan')</p>
			<p>@lang('about_us.logan1')</p>
			<p>@lang('about_us.logan2')</p>
			<p>@lang('about_us.logan3')</p>
			<p>@lang('about_us.logan4')</p>
			<p>@lang('about_us.logan5')</p>
			<p>@lang('about_us.benefit')</p>
			<p>@lang('about_us.benefit1')</p>
			<p>@lang('about_us.benefit2')</p>
			<p>@lang('about_us.benefit3')</p>
			<p>@lang('about_us.benefit4')</p>
			<p>@lang('about_us.benefit5')</p>
			<p>@lang('about_us.benefit6')</p>
		</div>
	</div>
</div>
<!-- //welcome -->
<!-- video -->
<div class="about">
	<div class="container">
		<!-- tittle heading -->
		<h3 class="tittle-w3l">@lang('about_us.video')
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
				<h4>@lang('about_us.shop_name')</h4>
				<p>@lang('about_us.shop_name_desc')</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //video-->
<!-- //about page -->
@include('../footer')
@endsection