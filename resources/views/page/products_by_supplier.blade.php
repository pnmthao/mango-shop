@extends('master')
@section('content') 
@include('../header')
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="{{route('trang-chu')}}">@lang('pro_by_sup.home')</a>
                        <i>|</i>
                    </li>
                    <li>@if(Session::get('locale') == 'en') {{$nha_cung_cap_sp->name_en}} @else {{$nha_cung_cap_sp->name}} @endif</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!-- top Products -->
    <div class="ads-grid">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">@if(Session::get('locale') == 'en') Products by {{$nha_cung_cap_sp->name_en}} @else Sản phẩm của {{$nha_cung_cap_sp->name}} @endif
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <!-- product left -->
            <div class="side-bar col-md-3">
                <div class="search-hotel">
                    <h3 class="agileits-sear-head">@lang('pro_by_sup.search')</h3>
                    <form action="{{route('search')}}" method="get">
                        <input type="search" placeholder="@if(Session::get('locale') == 'en') Enter key word @else  Nhập từ khóa @endif" name="key" required="">
                        <input type="submit" value=" ">
                    </form>
                </div>
                <!-- price range -->
                <div class="range">
                    <h3 class="agileits-sear-head">@lang('pro_by_sup.price_range')</h3>
                    <ul class="dropdown-menu6">
                        <li>
                            <div id="slider-range"></div>
                            <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
                        </li>
                    </ul>
                </div>
                <!-- //price range -->
                <!-- food preference -->
                <div class="left-side">
                    <h3 class="agileits-sear-head">@lang('pro_by_sup.food_love')</h3>
                    <ul>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Vegetarian</span>
                        </li>
                    </ul>
                </div>
                <!-- //food preference -->
                <!-- discounts -->
                <div class="left-side">
                    <h3 class="agileits-sear-head">@lang('pro_by_sup.discounts')</h3>
                    <ul>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">5% or More</span>
                        </li>
                    </ul>
                </div>
                <!-- //discounts -->
                <!-- reviews -->
                <div class="customer-rev left-side">
                    <h3 class="agileits-sear-head">@lang('pro_by_sup.reviews')</h3>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <span>5.0</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <span>4.0</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <span>3.5</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <span>3.0</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <span>2.5</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- //reviews -->
                <!-- cuisine -->
                <div class="left-side">
                    <h3 class="agileits-sear-head">@lang('pro_by_sup.cuisine')</h3>
                    <ul>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">South American</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">French</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Greek</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Chinese</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Japanese</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Italian</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Mexican</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Thai</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span">Indian</span>
                        </li>
                        <li>
                            <input type="checkbox" class="checked">
                            <span class="span"> Spanish </span>
                        </li>
                    </ul>
                </div>
                <!-- //cuisine -->
                <!-- deals -->
                <div class="deal-leftmk left-side">
                    <h3 class="agileits-sear-head">@lang('pro_by_sup.deals')</h3>
                    <div class="special-sec1">
                        <div class="col-xs-4 img-deals">
                            <img src="images/d2.jpg" alt="">
                        </div>
                        <div class="col-xs-8 img-deal1">
                            <h3>Lay's Potato Chips</h3>
                            <a href="single.html">$18.00</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- //deals -->
            </div>
            <!-- //product left -->
            <!-- product right -->
            <div class="agileinfo-ads-display col-md-9 ">
                <div class="wrapper">
                    <!-- first section -->
                    <div class="product-sec1">
                        @foreach ($sp_theonhacungcap as $sp)
                            <div class="col-xs-4 product-men">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item" onclick="window.location.href='{{route('chitietsanpham',$sp->id)}}'">
                                        <img src="public/uploads/product/{{$sp->image}}" alt="" height="150" width="150">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{route('chitietsanpham',$sp->id)}}" class="link-product-add-cart">@lang('pro_by_sup.detail')</a>
                                            </div>
                                        </div>
                                        <span class="product-new-top">@lang('pro_by_sup.label')</span>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4>
                                            <a href="{{route('chitietsanpham',$sp->id)}}">
                                                @if(Session::get('locale') == 'en') {{$sp->name_en}} @else {{$sp->name}} @endif
                                            </a>
                                        </h4>
                                        <div class="info-product-price">
                                            @if($sp->promotion_price==0)
                                                <span class="item_price">{{Helper::currency_format($sp->unit_price)}}</span> 
                                            @else
                                                <span class="item_price">{{Helper::currency_format($sp->promotion_price)}}</span>
                                                <del>{{Helper::currency_format($sp->unit_price)}}</del>
                                            @endif
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            <form action="#" method="post">
                                                <fieldset>
                                                    <input type="hidden" name="cmd" value="_cart" />
                                                    <input type="hidden" name="add" value="1" />
                                                    <input type="hidden" name="business" value=" " />
                                                    <input type="hidden" name="item_id" value="{{$sp->id}}" />
                                                    <input type="hidden" name="item_image" value="{{$sp->image}}" />
                                                    <input type="hidden" name="item_name" value="@if(Session::get('locale') == 'en') {{$sp->name_en}} @else {{$sp->name}} @endif" />
                                                    <input type="hidden" name="item_name_vi" value="{{$sp->name}}" />
                                			        <input type="hidden" name="item_name_en" value="{{$sp->name_en}}" />
                                                    <input type="hidden" name="amount" value="{{$sp->unit_price}}" />
                                                    <input type="hidden" name="discount_amount" value="{{$sp->promotion_price == 0 ? 0 : $sp->unit_price-$sp->promotion_price}}" />
                                                    <input type="hidden" name="currency_code" value="@if(Session::get('locale') == 'en'){{'USD'}}@else{{'VND'}}@endif" />
                                                    <input type="hidden" name="return" value=" " />
                                                    <input type="hidden" name="cancel_return" value=" " />
                                                    <input type="submit" name="submit" value="@lang('checkout.cart_button')" class="button" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @if(Session::get('locale') == 'en') Find {{count($sp_theonhacungcap)}} products @else  Tìm thấy {{count($sp_theonhacungcap)}} sản phẩm @endif
            <!-- //product right -->
        </div>
    </div>
    <!-- //top products -->

    <!-- special offers -->
    <div class="featured-section" id="projects">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">@lang('pro_by_sup.other_product')
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <div class="content-bottom-in">
                <ul id="flexiselDemo1">
                    @foreach ($sp_khac as $sp_k)
                    <li>
                        <div class="w3l-specilamk">
                            <div class="speioffer-agile">
                                <a href="{{route('chitietsanpham',$sp_k->id)}}">
                                    <img src="public/uploads/product/{{$sp_k->image}}" alt="" width="150" height="150">
                                </a>
                            </div>
                            <div class="product-name-w3l">
                                <h4>
                                    <a href="{{route('chitietsanpham',$sp_k->id)}}">
                                        @if(Session::get('locale') == 'en') {{$sp_k->name_en}} @else {{$sp_k->name}} @endif
                                    </a>
                                </h4>
                                <div class="w3l-pricehkj">
                                    @if($sp_k->promotion_price==0)
										<span class="item_price">{{Helper::currency_format($sp_k->unit_price)}}</span> 
									@else
										<span class="item_price">{{Helper::currency_format($sp_k->promotion_price)}}</span>
										<del>{{Helper::currency_format($sp_k->unit_price)}}</del>
									@endif
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_id" value="{{$sp_k->id}}" />
                                            <input type="hidden" name="item_image" value="{{$sp_k->image}}" />
                                            <input type="hidden" name="item_name" value="@if(Session::get('locale') == 'en') {{$sp_k->name_en}} @else {{$sp_k->name}} @endif" />
                                            <input type="hidden" name="item_name_vi" value="{{$sp_k->name}}" />
                                			<input type="hidden" name="item_name_en" value="{{$sp_k->name_en}}" />
                                            <input type="hidden" name="amount" value="{{$sp_k->unit_price}}" />
                                            <input type="hidden" name="discount_amount" value="{{$sp_k->promotion_price == 0 ? 0 : $sp_k->unit_price-$sp_k->promotion_price}}" />
                                            <input type="hidden" name="currency_code" value="@if(Session::get('locale') == 'en'){{'USD'}}@else{{'VND'}}@endif" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="@lang('checkout.cart_button')" class="button" />
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- //special offers -->
@include('../footer') 
@endsection