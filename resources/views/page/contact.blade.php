@extends('master')
@section('content')
@include('../header')
<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="{{route('trang-chu')}}">@lang('contact.home')</a>
					<i>|</i>
				</li>
				<li>@lang('contact.title')</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->
<!-- contact page -->
<div class="contact-w3l">
	<div class="container">
		<!-- tittle heading -->
		<h3 class="tittle-w3l">@lang('contact.title')
			<span class="heading-style">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</h3>
		<!-- //tittle heading -->
		<!-- contact -->
		<div class="contact agileits">
			<div class="contact-agileinfo">
				<div class="contact-form wthree">
					<form action="#" method="post">
						<div class="">
							<label>@lang('contact.name')</label>
							<input type="text" name="name" placeholder="@lang('contact.place_name')" required="">
						</div>
						<div class="">
							<label>@lang('contact.subject')</label>
							<input class="text" type="text" name="subject" placeholder="@lang('contact.place_subject')" required="">
						</div>
						<div class="">
							<label>@lang('contact.email')</label>
							<input class="email" type="email" name="email" placeholder="@lang('contact.place_email')" required="">
						</div>
						<div class="">
							<label>@lang('contact.message')</label>
							<textarea placeholder="@lang('contact.place_message')" required=""></textarea>
						</div>
						<input type="submit" value="@lang('contact.button')">
					</form>
				</div>
				<div class="contact-right wthree">
					<div class="col-xs-7 contact-text w3-agileits">
						<h4>@lang('contact.hotline')</h4>
						<p><i class="fa fa-map-marker"></i> @lang('contact.address')</p>
						<p><i class="fa fa-phone"></i> @lang('contact.phone')</p>
						<p><i class="fa fa-fax"></i> @lang('contact.fax')</p>
						<p>
							<i class="fa fa-envelope-o"></i>@lang('contact.email')
							<a href="mailto:example@mail.com">pnmthaoct@gmail.com</a>
						</p>
					</div>
					<div class="col-xs-5 contact-agile">
						<img src="{{asset('uploads/logo/contact1.jpg')}}" alt="">
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //contact -->
	</div>
</div>
<!-- map -->
<div class="map w3layouts" align="center">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.840043860393!2d105.76843731428215!3d10.030055275269298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf6ae5b1bd18625!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBD4bqnbiBUaMah!5e0!3m2!1svi!2s!4v1585371909204!5m2!1svi!2s" width="80%" height="450"  frameborder="0" style="border:0;width:80%;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<!--map end-->
@include('../footer')
@endsection
