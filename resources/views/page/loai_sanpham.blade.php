@extends('master')
@section('content') 
</div>
<!-- //banner-2 -->
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="{{route('trang-chu')}}">Home</a>
                    <i>|</i>
                </li>
                <li>{{$loai_sp->name}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- top Products -->
<div class="ads-grid">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">{{$loai_sp->name}}
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
                <h3 class="agileits-sear-head">Tìm kiếm..</h3>
                <form action="{{route('search')}}" method="get">
                    <input type="search" placeholder="Tên sản phẩm..." name="key" required="">
                    <input type="submit" value=" ">
                </form>
            </div>
            <!-- price range -->
            <div class="range">
                <h3 class="agileits-sear-head">Price range</h3>
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
                <h3 class="agileits-sear-head">Food Preference</h3>
                <ul>
                    <li>
                        <input type="checkbox" class="checked">
                        <span class="span">Vegetarian</span>
                    </li>
                    <li>
                        <input type="checkbox" class="checked">
                        <span class="span">Non-Vegetarian</span>
                    </li>
                </ul>
            </div>
            <!-- //food preference -->
            <!-- discounts -->
            <div class="left-side">
                <h3 class="agileits-sear-head">Discount</h3>
                <ul>
                    <li>
                        <input type="checkbox" class="checked">
                        <span class="span">5% or More</span>
                    </li>
                    <li>
                        <input type="checkbox" class="checked">
                        <span class="span">10% or More</span>
                    </li>
                    <li>
                        <input type="checkbox" class="checked">
                        <span class="span">20% or More</span>
                    </li>
                    <li>
                        <input type="checkbox" class="checked">
                        <span class="span">30% or More</span>
                    </li>
                    <li>
                        <input type="checkbox" class="checked">
                        <span class="span">50% or More</span>
                    </li>
                    <li>
                        <input type="checkbox" class="checked">
                        <span class="span">60% or More</span>
                    </li>
                </ul>
            </div>
            <!-- //discounts -->
            <!-- reviews -->
            <div class="customer-rev left-side">
                <h3 class="agileits-sear-head">Customer Review</h3>
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
                <h3 class="agileits-sear-head">Cuisine</h3>
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
                <h3 class="agileits-sear-head">Special Deals</h3>
                <div class="special-sec1">
                    <div class="col-xs-4 img-deals">
                        <img src="images/d2.jpg" alt="">
                    </div>
                    <div class="col-xs-8 img-deal1">
                        <h3>Lay's Potato Chips</h3>
                        <a href="">$18.00</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="special-sec1">
                    <div class="col-xs-4 img-deals">
                        <img src="images/d1.jpg" alt="">
                    </div>
                    <div class="col-xs-8 img-deal1">
                        <h3>Bingo Mad Angles</h3>
                        <a href="">$9.00</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="special-sec1">
                    <div class="col-xs-4 img-deals">
                        <img src="images/d4.jpg" alt="">
                    </div>
                    <div class="col-xs-8 img-deal1">
                        <h3>Tata Salt</h3>
                        <a href="">$15.00</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="special-sec1">
                    <div class="col-xs-4 img-deals">
                        <img src="images/d5.jpg" alt="">
                    </div>
                    <div class="col-xs-8 img-deal1">
                        <h3>Gujarat Dry Fruit</h3>
                        <a href="">$525.00</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="special-sec1">
                    <div class="col-xs-4 img-deals">
                        <img src="images/d3.jpg" alt="">
                    </div>
                    <div class="col-xs-8 img-deal1">
                        <h3>Cadbury Dairy Milk</h3>
                        <a href="">$149.00</a>
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
                    @foreach ($sp_theoloai as $sp)
                    <div class="col-xs-4 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="public/uploads/product/{{$sp->image}}" alt="" height="150" width="150">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{route('chitietsanpham',$sp->id)}}" class="link-product-add-cart">Chi tiết</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>
                            </div>
                            <div class="item-info-product ">
                                <h4>
                                    <a href="{{route('chitietsanpham',$sp->id)}}">{{$sp->name}}</a>
                                </h4>
                                <div class="info-product-price">
                                    @if($sp->promotion_price==0)
                                        <span class="item_price">{{number_format($sp->unit_price)}}VND</span> 
                                    @else
                                        <span class="item_price">{{number_format($sp->promotion_price)}} VND</span>
                                        <del>{{number_format($sp->unit_price)}} VND</del>
                                    @endif
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Zeeba Basmati Rice - 5 KG" />
                                            <input type="hidden" name="amount" value="950.00" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
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
        Tìm thấy {{count($sp_theoloai)}} sản phẩm
        <!-- //product right -->
    </div>
</div>
<!-- //top products -->
<!-- special offers -->
<div class="featured-section" id="projects">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Sản phẩm khác
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
                                <a href="{{route('chitietsanpham',$sp_k->id)}}">{{$sp_k->name}}</a>
                            </h4>
                            <div class="w3l-pricehkj">
                                @if($sp_k->promotion_price==0)
                                    <span class="item_price">{{number_format($sp_k->unit_price)}}VND</span> 
                                @else
                                    <span class="item_price">{{number_format($sp_k->promotion_price)}} VND</span>
                                    <del>{{number_format($sp_k->unit_price)}} VND</del>
                                @endif
                            </div>
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <form action="#" method="post">
                                    <fieldset>
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="add" value="1" />
                                        <input type="hidden" name="business" value=" " />
                                        <input type="hidden" name="item_name" value="Aashirvaad, 5g" />
                                        <input type="hidden" name="amount" value="220.00" />
                                        <input type="hidden" name="discount_amount" value="1.00" />
                                        <input type="hidden" name="currency_code" value="USD" />
                                        <input type="hidden" name="return" value=" " />
                                        <input type="hidden" name="cancel_return" value=" " />
                                        <input type="submit" name="submit" value="Add to cart" class="button" />
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
@endsection