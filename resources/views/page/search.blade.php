@extends('master')
@section('content')
@include('../header')
    <!-- banner -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Big
                            <span>Sale</span>
                        </h3>
                        <p>Get flat
                            <span>10%</span> Cashback</p>
                        <a class="button2" href="product.html">Đặt hàng ngay</a>
                    </div>
                </div>
            </div>
            <div class="item item2">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Healthy
                            <span>Saving</span>
                        </h3>
                        <p>Get Upto
                            <span>30%</span> Off</p>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
            <div class="item item3">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Big
                            <span>Deal</span>
                        </h3>
                        <p>Get Best Offer Upto
                            <span>20%</span>
                        </p>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
            <div class="item item4">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Today
                            <span>Discount</span>
                        </h3>
                        <p>Get Now
                            <span>40%</span> Discount</p>
                        <a class="button2" href="product.html">Shop Now </a>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- //banner -->

    <!-- top Products -->
    <div class="ads-grid">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Sản phẩm bán chạy nhất
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
                    <h3 class="agileits-sear-head">@lang('index.search')</h3>
                    <form action="{{route('search')}}" method="get">
                        <input type="search" placeholder="@if(Session::get('locale') == 'en') Enter key word @else  Nhập từ khóa @endif" name="key" required="">
                        <input type="submit" value=" ">
                    </form>
                </div>
                <!-- price range -->
                <div class="range">
                    <h3 class="agileits-sear-head">Phạm vi</h3>
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
                    <h3 class="agileits-sear-head">Thực phẩm ưa thích</h3>
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
                    <h3 class="agileits-sear-head">Giảm giá</h3>
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
                    <h3 class="agileits-sear-head">Đánh giá</h3>
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
                    <h3 class="agileits-sear-head">Khẩu vị</h3>
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
                    <h3 class="agileits-sear-head">Loại đặc biệt</h3>
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
            <div class="agileinfo-ads-display col-md-9">
                <div class="wrapper">
                    <div class="product-sec1">
                        <h3 class="heading-tittle">Sản phẩm</h3>
                        @foreach ($product as $pro)          
                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item" onclick="window.location.href='{{route('chitietsanpham',$pro->id)}}'">
                                    <img src="public/uploads/product/{{$pro->image}}" alt="" height="150" width="150">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="{{route('chitietsanpham',$pro->id)}}" class="link-product-add-cart">@lang('index.detail')</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">@lang('index.label_promo_product')</span>
                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <a href="{{route('chitietsanpham',$pro->id)}}">
                                            @if(Session::get('locale') == 'en') {{$pro->name_en}} @else  {{$pro->name}} @endif
                                        </a>
                                    </h4>
                                    <div class="info-product-price">
                                        @if($pro->promotion_price==0)
                                            <span class="item_price">{{Helper::currency_format($pro->unit_price)}}</span> 
                                        @else
                                            <span class="item_price">{{Helper::currency_format($pro->promotion_price)}}</span>
                                            <del>{{Helper::currency_format($pro->unit_price)}}</del>
                                        @endif
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_id" value="{{$pro->id}}" />
                                                <input type="hidden" name="item_image" value="{{$pro->image}}" />
                                                <input type="hidden" name="item_name" value="@if(Session::get('locale') == 'en') {{$pro->name_en}} @else {{$pro->name}} @endif" />
                                                <input type="hidden" name="item_name_vi" value="{{$pro->name}}" />
                                                <input type="hidden" name="item_name_en" value="{{$pro->name_en}}" />
                                                <input type="hidden" name="amount" value="{{$pro->unit_price}}" />
                                                <input type="hidden" name="discount_amount" value="{{$pro->promotion_price == 0 ? 0 : $pro->unit_price-$pro->promotion_price}}" />
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

                    <!-- second section (nuts special) -->
                    <div class="product-sec1 product-sec2">
                        <div class="col-xs-7 effect-bg">
                            <h3 class="">Pure Energy</h3>
                            <h6>Enjoy our all healthy Products</h6>
                            <p>Get Extra 10% Off</p>
                        </div>
                        <h3 class="w3l-nut-middle">Nuts & Dry Fruits</h3>
                        <div class="col-xs-5 bg-right-nut">
                            <img src="images/nut1.png" alt="">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- //second section (nuts special) -->
                </div>
            </div>
            <!-- //product right -->
        </div>
    </div>
    <!-- //top products -->

    <!-- special offers -->
    <div class="featured-section" id="projects">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Sản phẩm mới
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <div class="content-bottom-in">
                <ul id="flexiselDemo1">
                    @foreach ($new_product as $new)
                        <li>
                            <div class="w3l-specilamk">
                                <div class="speioffer-agile">
                                    <a href="{{route('chitietsanpham',$new->id)}}">
                                        <img src="public/uploads/product/{{$new->image}}" alt="" height="150" width="150">
                                    </a>
                                </div>
                                <div class="product-name-w3l">
                                    <h4>
                                        <a href="{{route('chitietsanpham',$new->id)}}">
                                            @if(Session::get('locale') == 'en') {{$new->name_en}} @else  {{$new->name}} @endif
                                        </a>
                                    </h4>
                                    <span class="product-new-top">@lang('index.label_promo_product')</span>
                                    <div class="w3l-pricehkj">
                                        @if($new->promotion_price==0)
                                            <span class="item_price">{{Helper::currency_format($new->unit_price)}}</span> 
                                        @else
                                            <span class="item_price">{{Helper::currency_format($new->promotion_price)}}</span>
                                            <del>{{Helper::currency_format($new->unit_price)}}</del>
                                        @endif
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_id" value="{{$new->id}}" />
                                                <input type="hidden" name="item_image" value="{{$new->image}}" />
                                                <input type="hidden" name="item_name" value="@if(Session::get('locale') == 'en') {{$new->name_en}} @else {{$new->name}} @endif" />
                                                <input type="hidden" name="item_name_vi" value="{{$new->name}}" />
                                                <input type="hidden" name="item_name_en" value="{{$new->name_en}}" />
                                                <input type="hidden" name="amount" value="{{$new->unit_price}}" />
                                                <input type="hidden" name="discount_amount" value="{{$new->promotion_price == 0 ? 0 : $new->unit_price-$new->promotion_price}}" />
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