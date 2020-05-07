@extends('master')
@section('content')
@include('../header')
<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="{{route('trang-chu')}}">@lang('product_details.home')</a>
					<i>|</i>
				</li>
				<li>Đơn hàng của bạn</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->

<!-- Product Detail Page -->
      <div class="table-responsive">
        <?php
            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message',null);
            }
        ?>
      </div>
        <div class="panel-body">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th style="width:20px;">
                  <label class="i-checks m-b-none"><input type="checkbox"></label>
                </th>
                <th>Mã HĐ</th>
                <th>Trị giá</th>
                <th>Ngày đặt hàng</th>
                <th>Hình thức thanh toán</th>
                <th>Khuyến mãi</th>
                <th>Trạng thái</th>
                <th style="width:30px;">Chi tiết</th>
              </tr>
            </thead>
            <tbody>
            @foreach($all_order as $key => $order)
              <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{$order->id}}</td>
                <td>{{$order->total}}</td>
                <td>{{date('d-m-Y', strtotime($order->date_order))}}</td>
                <td>{{$order->payment}}</td>
                <td>{{$order->coupon_code}}</td>
                <td>{{$order->status_name}}</td>
                <td>
                  <a href="{{route('chitietdonhang', $order->id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-5 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
              </ul>
            </div>
          </div>
        </footer> -->
    </div>
  </div>
</div>
@include('../footer')
@endsection
