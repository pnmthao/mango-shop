@extends('master')
@section('content') 
@include('../header') 
<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="{{route('trang-chu')}}">@lang('faqs.home')</a>
					<i>|</i>
				</li>
				<li>@lang('faqs.title')</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->
<!-- FAQ-help-page -->
<div class="faqs-w3l">
	<div class="container">
		<!-- tittle heading -->
		<h3 class="tittle-w3l">@lang('faqs.title')
			<span class="heading-style">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</h3>
		<!-- //tittle heading -->
		<h3 class="w3-head">@lang('faqs.subtitle')</h3>
		<div class="faq-w3agile">
			<ul class="faq">
				<li class="item1">
					<a href="#" title="click here">@lang('faqs.q1')</a>
					<ul>
						<li class="subitem1">
							<p> @lang('faqs.a1')</p>
						</li>
					</ul>
				</li>
				<li class="item2">
					<a href="#" title="click here">@lang('faqs.q2')</a>
					<ul>
						<li class="subitem1">
							<p>@lang('faqs.a2')</p>
						</li>
					</ul>
				</li>
				<li class="item3">
					<a href="#" title="click here">@lang('faqs.q3')</a>
					<ul>
						<li class="subitem1">
							<p> @lang('faqs.a3')</p>
						</li>
					</ul>
				</li>
				<li class="item4">
					<a href="#" title="click here">@lang('faqs.q4')</a>
					<ul>
						<li class="subitem1">
							<p> @lang('faqs.a4')</p>
						</li>
					</ul>
				</li>
				<li class="item5">
					<a href="#" title="click here">@lang('faqs.q5')</a>
					<ul>
						<li class="subitem1">
							<p> @lang('faqs.a5')</p>
						</li>
					</ul>
				</li>
				<li class="item6">
					<a href="#" title="click here">@lang('faqs.q6')</a>
					<ul>
						<li class="subitem1">
							<p> @lang('faqs.a6')</p>
						</li>
					</ul>
				</li>
				<li class="item7">
					<a href="#" title="click here">@lang('faqs.q7')</a>
					<ul>
						<li class="subitem1">
							<p> @lang('faqs.a7')</p>
						</li>
					</ul>
				</li>
				<li class="item8">
					<a href="#" title="click here">@lang('faqs.q8')</a>
					<ul>
						<li class="subitem1">
							<p> @lang('faqs.a8')</p>
						</li>
					</ul>
				</li>
				<li class="item9">
					<a href="#" title="click here">@lang('faqs.q9')</a>
					<ul>
						<li class="subitem1">
							<p> @lang('faqs.a9')</p>
						</li>
					</ul>
				</li>
				<li class="item10">
					<a href="#" title="click here">@lang('faqs.q10')</a>
					<ul>
						<li class="subitem1">
							<p> @lang('faqs.a10')</p>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- //FAQ-help-page -->
@include('../footer')
@endsection