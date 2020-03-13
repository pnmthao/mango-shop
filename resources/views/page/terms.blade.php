@extends('master')
@section('content')  
@include('../header')
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="{{route('trang-chu')}}">@lang('terms.home')</a>
						<i>|</i>
					</li>
					<li>@lang('terms.title')</li>
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
				<h3 class="tittle-w3l">@lang('terms.title')
					<span class="heading-style">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</h3>
				<!-- //tittle heading -->
				<h5>@lang('terms.note')</h5>
				<h6>@lang('terms.heading1')</h6>
				<ol start="1">
					<li>@lang('terms.h1_content1')</li>
					<li>@lang('terms.h1_content2')</li>
					<li>@lang('terms.h1_content3')</li>
				</ol>

				<h6>@lang('terms.heading2')</h6>
				<p>@lang('terms.h2_content1')</p>
				<p>@lang('terms.h2_content2')</p>
				<p>@lang('terms.h2_content3')</p>

				<h6>@lang('terms.heading3')</h6>
				<p>@lang('terms.h3_content1')</p>
				<p>@lang('terms.h3_content2')r</p>

				<h6>@lang('terms.heading4')</h6>
				<p>@lang('terms.h4_content1')</p>
				<p>@lang('terms.h4_content2')</p>
				<p>@lang('terms.h4_content3')</p>

				<h6>@lang('terms.heading5')</h6>
				<p> @lang('terms.h5_content1')</p>
				<p> @lang('terms.h5_content2')</p>
				
				<h6>@lang('terms.heading6')</h6>
				<p>@lang('terms.h6_content1')</p>

				<h6>@lang('terms.heading7')</h6>
				<p> @lang('terms.h7_content1')</p>
			</div>
		</div>
		<!-- /terms -->
	</section>
	<!-- //Terms of use-section -->
@include('../footer')
@endsection
