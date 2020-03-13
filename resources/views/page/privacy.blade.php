@extends('master')
@section('content')  
@include('../header')
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="{{route('trang-chu')}}">@lang('privacy.home')</a>
						<i>|</i>
					</li>
					<li>@lang('privacy.title')</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- Terms of use-section -->
	<section class="terms-of-use">
		<!-- terms -->
		<div class="terms">
			<div class="container">
				<!-- tittle heading -->
				<h3 class="tittle-w3l">@lang('privacy.title')
					<span class="heading-style">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</h3>
				<!-- //tittle heading -->
				<h6>@lang('privacy.heading1')</h6>
				<p>@lang('privacy.h1_content1')</p>
				<p>@lang('privacy.h1_content2')</p>

				<h6>@lang('privacy.heading2')</h6>
				<p>@lang('privacy.h2_content1')</p>
				<p>@lang('privacy.h2_content2')</p>

				<h6>@lang('privacy.heading3')</h6>
				<p>@lang('privacy.h3_content1')</p>
				<p>@lang('privacy.h3_content2')</p>

				<h6>@lang('privacy.heading4')</h6>
				<p>@lang('privacy.h4_content1')</p>
				<p>@lang('privacy.h4_content2')</p>

				<h6>@lang('privacy.heading5')</h6>
				<p>@lang('privacy.h5_content1')</p>
				<p>@lang('privacy.h5_content2')</p>

				<h6>@lang('privacy.heading6')</h6>
				<ol start="1">
					<li>@lang('privacy.h6_content1')</li>
					<li>@lang('privacy.h6_content2')</li>
				</ol>

				<h6>@lang('privacy.heading7')</h6>
				<p>@lang('privacy.h7_content1')</p>
				<p>@lang('privacy.h7_content2')</p>
			</div>
		</div>
		<!-- /terms -->
	</section>
	<!-- //Terms of use-section -->
@include('../footer')
@endsection