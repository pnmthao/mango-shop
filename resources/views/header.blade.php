<!-- top-header -->
<div class="header-most-top">
	<p>Cửa hàng trực tuyến ưu đãi toàn cầu</p>
</div>
<!-- //top-header -->
<!-- header-bot-->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<!-- header-bot-->
		<div class="col-md-4 logo_agile">
			<h1>
				<a href="{{route('trang-chu')}}">
					<span>M</span>ango
					<span>S</span>hop
					<img src="public/uploads/logo/logo2.png" alt=" ">
				</a>
			</h1>
		</div>
		<!-- header-bot -->
		<div class="col-md-8 header">
			<!-- header lists -->
			<ul>
				<li>
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog1">
						<span class="fa fa-map-marker" aria-hidden="true"></span>Shop Locator</a>
				</li>
				<li>
					<a href="#" data-toggle="modal" data-target="#myModal1">
						<span class="fa fa-truck" aria-hidden="true"></span>Track Order</a>
				</li>
				<li>
					<span class="fa fa-phone" aria-hidden="true"></span> 0949 422 936
				</li>
				@if(Session::get('customer_id'))
					<li>@lang('header.hi', ['name' => Session::get('customer_name')])</li>
					<li><a href="{{route('dangxuat')}}"> Đăng xuất</a></li>
				@else
					<li><a href="{{route('dangky')}}">@lang('header.register')</a></li>
					<li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
				@endif
				<li>
					<a href="locale/vi">Viet nam</a>
                	<a href="locale/en">English</a>
					{{-- <select name="myselect" id="switcher-language">
						<option value="1" selected='selected'><a href="#">Tiếng Việt</a></option>
						<option value="2">English</option>
					</select> --}}
				</li>
				{{-- <li>
				<a href="{{route('dangnhap')}}" data-toggle="modal" data-target="#myModal1">
				<span class="fa fa-unlock-alt" aria-hidden="true"></span>Đăng nhập </a>
				</li>
				<li>
					<a href="{{route('dangky')}}" data-toggle="modal" data-target="#myModal2">
						<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Đăng ký </a>
				</li> --}}
			</ul>
			<!-- //header lists -->
			<!-- search -->
			<div class="agileits_search">
				<form action="{{route('search')}}" method="get">
					<input name="key" type="search" placeholder="Nhập từ khóa cần tìm" required="">
					<button type="submit" class="btn btn-default" aria-label="Left Align">
						<span class="fa fa-search" aria-hidden="true"> </span>
					</button>
				</form>
			</div>
			<!-- //search -->
			<!-- cart details -->
			<div class="top_nav_right">
				<div class="wthreecartaits wthreecartaits2 cart cart box_1">
					<form action="#" method="post" class="last">
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
						<button class="w3view-cart" type="submit" name="submit" value="">
							<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
						</button>
					</form>
				</div>
			</div>
			<!-- //cart details -->
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- shop locator (popup) -->
<!-- Button trigger modal(shop-locator) -->
<div id="small-dialog1" class="mfp-hide">
	<div class="select-city">
		<h3>Chọn vị trí của bạn</h3>
		<select class="list_of_cities">
			<optgroup label="Popular Cities">
				<option selected style="display:none;color:#eee;">Chọn thành phố</option>
				<option>Hà Nội</option>
				<option>Cần Thơ</option>
				<option>TP Hồ Chí Minh</option>
			</optgroup>
		</select>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //shop locator (popup) -->
<!-- //header-bot -->
<!-- navigation -->
<div class="ban-top">
	<div class="container">
		<div class="agileits-navi_search">
			<form action="#" method="post">
				<select id="agileinfo-nav_search" name="agileinfo_search" required="">
					<option value="">Loại sản phẩm</option>
					@foreach ($loai_sp as $loai)                            
						<option><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></option>
					@endforeach
				</select>
			</form>
		</div>
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav menu__list">
							<li class="active">
								<a class="nav-stylehead" href="{{route('trang-chu')}}">Trang chủ
									<span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="">
								<a class="nav-stylehead" href="{{route('gioithieu')}}">Giới thiệu</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nhà cung cấp
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="agile_inner_drop_nav_info">
										<div class="col-sm-4 multi-gd-img">
											<ul class="multi-column-dropdown">
												@foreach ($nha_cung_cap_sp as $ncc)                            
													<li><a href="{{route('nhacungcapsanpham',$ncc->id)}}">{{$ncc->name}}</a></li>
											@endforeach
											</ul>
										</div>
										<div class="col-sm-4 multi-gd-img">
											<img src="images/nav.png" alt="">
										</div>
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Loại sản phẩm
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="agile_inner_drop_nav_info">
										<div class="col-sm-4 multi-gd-img">
											<ul class="multi-column-dropdown">
												@foreach ($loai_sp as $loai)                            
													<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
											@endforeach
											</ul>
										</div>
										<div class="col-sm-4 multi-gd-img">
											<img src="images/nav.png" alt="">
										</div>
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							<li class="">
								<a class="nav-stylehead" href="{{route('faqs')}}">Tư vấn</a>
							</li>
							<li class="">
								<a class="nav-stylehead" href="{{route('lienhe')}}">Liên hệ</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>
</div>
	<!-- //navigation -->