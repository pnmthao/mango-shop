    <!-- newsletter -->
	<div class="footer-top">
		<div class="container-fluid">
			<div class="col-xs-8 agile-leftmk">
				<h2>@lang('footer.banner_top1')</h2>
				<p>@lang('footer.banner_top2')</p>
				<form action="#" method="post">
					<input type="email" placeholder="E-mail" name="email" required="">
					<input type="submit" value="Subscribe">
				</form>
				<div class="newsform-w3l">
					<span class="fa fa-envelope-o" aria-hidden="true"></span>
				</div>
			</div>
			<div class="col-xs-4 w3l-rightmk">
				<img src="images/tab3.png" alt=" ">
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //newsletter -->
    <!-- footer -->
	<footer>
		<div class="container">
			<!-- footer first section -->
			<p class="footer-main">
				<span>@lang('footer.shop_name')</span>@lang('footer.shop_desc')</p>
			<!-- //footer first section -->
			<!-- footer second section -->
			<div class="w3l-grids-footer">
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-map-marker" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>@lang('footer.trackorder')</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-refresh" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>@lang('footer.return')</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-times" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>@lang('footer.onlinecancel')</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //footer second section -->
			<!-- footer third section -->
			<div class="footer-info w3-agileits-info">
				<!-- footer categories -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>@lang('footer.hot_product')</h3>
						<ul>
							<li>
								<a href="{{route('chitietsanpham',116)}}">@lang('footer.hp_wagyu')</a>
							</li>
							<li>
								<a href="{{route('chitietsanpham',117)}}">@lang('footer.hp_kobe')</a>
							</li>
							<li>
								<a href="{{route('chitietsanpham',112)}}">@lang('footer.hp_greengrape')</a>
							</li>
							<li>
								<a href="{{route('chitietsanpham',113)}}">@lang('footer.hp_blackgrape')</a>
							</li>
							<li>
								<a href="{{route('chitietsanpham',105)}}">@lang('footer.hp_redapple')</a>
							</li>
							<li>
								<a href="{{route('chitietsanpham',114)}}">@lang('footer.hp_strawberry')</a>
							</li>
						</ul>
					</div>
					<div class="col-xs-6 footer-grids agile-secomk">
						<ul>
							<li>
								<a href="{{route('chitietsanpham',116)}}">@lang('footer.hp_wagyu')</a>
							</li>
							<li>
								<a href="{{route('chitietsanpham',117)}}">@lang('footer.hp_kobe')</a>
							</li>
							<li>
								<a href="{{route('chitietsanpham',112)}}">@lang('footer.hp_greengrape')</a>
							</li>
							<li>
								<a href="{{route('chitietsanpham',113)}}">@lang('footer.hp_blackgrape')</a>
							</li>
							<li>
								<a href="{{route('chitietsanpham',105)}}">@lang('footer.hp_redapple')</a>
							</li>
							<li>
								<a href="{{route('chitietsanpham',114)}}">@lang('footer.hp_strawberry')</a>
							</li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- //footer categories -->
				<!-- quick links -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>@lang('footer.quicklinks')</h3>
						<ul>
							<li>
								<a href="{{route('gioithieu')}}">@lang('footer.aboutus')</a>
							</li>
							<li>
								<a href="{{route('lienhe')}}">@lang('footer.contact')</a>
							</li>
							<li>
								<a href="{{route('faqs')}}">@lang('footer.faqs')</a>
							</li>
							<li>
								<a href="{{route('terms')}}">@lang('footer.terms')</a>
							</li>
							<li>
								<a href="{{route('privacy')}}">@lang('footer.privacy')</a>
							</li>
						</ul>
					</div>
					<div class="col-xs-6 footer-grids">
						<h3>@lang('footer.contact')</h3>
						<ul>
							<li>
								<i class="fa fa-map-marker"></i>@lang('footer.address')</li>
							<li>
								<i class="fa fa-mobile"></i>0949 422 936 </li>
							<li>
								<i class="fa fa-phone"></i>+84 893 379 </li>
							<li>
								<i class="fa fa-envelope-o"></i>
								<a href="mailto:example@mail.com">pnmthaoct@gmail.com</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- //quick links -->
				<!-- social icons -->
				<div class="col-sm-2 footer-grids  w3l-socialmk">
					<h3>@lang('footer.socialnetwork')</h3>
					<div class="social">
						<ul>
							<li>
								<a class="icon fb" href="#">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li>
								<a class="icon tw" href="#">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<li>
								<a class="icon gp" href="#">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="agileits_app-devices">
						<h5>@lang('footer.downloadapp')</h5>
						<a href="#">
							<img src="images/1.png" alt="">
						</a>
						<a href="#">
							<img src="images/2.png" alt="">
						</a>
						<div class="clearfix"> </div>
					</div>
				</div>
				<!-- //social icons -->
				<div class="clearfix"></div>
			</div>
			<!-- //footer third section -->
			<!-- footer fourth section (text) -->
			<div class="agile-sometext">
				<div class="sub-some">
					<h5>@lang('footer.shop_online')</h5>
					<p>@lang('footer.shop_online_desc1')</p>
				</div>
				<div class="sub-some">
					<h5>@lang('footer.shop_online_desc2')</h5>
					<p>@lang('footer.shop_online_desc3')</p>
				</div>
				<!-- brands -->
				<div class="sub-some">
					<h5>@lang('footer.brand')</h5>
					<ul>
						<li>
							<a href="https://vinmart.com/">@lang('footer.brand1')</a>
						</li>
						<li>
							<a href="https://vinmart.com/">@lang('footer.brand2')</a>
						</li>
						<li>
							<a href="https://vinmart.com/">@lang('footer.brand3')</a>
						</li>
						<li>
							<a href="https://vinmart.com/">@lang('footer.brand4')</a>
						</li>
						<li>
							<a href="https://vinmart.com/">@lang('footer.brand5')</a>
						</li>
					</ul>
				</div>
				<!-- //brands -->
				<!-- payment -->
				<div class="sub-some child-momu">
					<h5>@lang('footer.payment')</h5>
					<ul>
						<li><img src="images/pay2.png" alt=""></li>
						<li><img src="images/pay5.png" alt=""></li>
						<li><img src="images/pay1.png" alt=""></li>
						<li><img src="images/pay4.png" alt=""></li>
						<li><img src="images/pay6.png" alt=""></li>
						<li><img src="images/pay3.png" alt=""></li>
						<li><img src="images/pay7.png" alt=""></li>
						<li><img src="images/pay8.png" alt=""></li>
						<li><img src="images/pay9.png" alt=""></li>
					</ul>
				</div>
				<!-- //payment -->
			</div>
			<!-- //footer fourth section (text) -->
		</div>
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>@if(Session::get('locale') == 'en') Good Service, Good quality @else Chất lượng hàng đầu @endif</p>
		</div>
	</div>
	<!-- //copyright -->