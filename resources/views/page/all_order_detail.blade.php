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
				<li>Đơn hàng của bạn
                <i>|</i>
                </li>
				<li>Chi tiết đơn hàng</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->

<!-- Product Detail Page -->
<div class="table-agile-info">
  <div class="panel panel-default">
    <?php
      foreach($all_order_detail as $key => $order_detail)
        $id_bill = $order_detail->id_bill;
        $date_order = $order_detail->date_order;
        $note = $order_detail->note;
        $customer_name = $order_detail->customer_name;
        $payment = $order_detail->payment;
        $total = $order_detail->total;
        $status_bill = $order_detail->status_name;
        $coupon_code = $order_detail->coupon_code
      ?>
    
    <div class="panel-heading">Chi tiết đơn hàng {{$id_bill}}</div>
    <div class="row w3-res-tb">
      {{-- <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div> --}}
      <div class="col-sm-4">
        {{-- <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Thêm danh mục</button> --}}
      </div>
      <div class="col-sm-5 ">
      </div>
    </div>
      <div class="table-responsive">
        <?php
            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message',null);
            }
        ?>
        <div class="panel-body">
            <table class="table table-striped b-t b-light">       
              <thead>
                <tr> 
                    <th>Mã đơn hàng: {{$id_bill}}</th> 
                    <th>Ngày đặt: {{date('d-m-Y', strtotime($date_order))}}</th> 
                    <th>Ghi chú: {{$note}}</th>     
                </tr>
                <tr>
                    <th>Tên khách hàng: {{$customer_name}}</th> 
                    <th>Hình thức thanh toán: {{$payment}}</th>
                    <th>Trạng thái: {{$status_bill}}</th>
                    <th>khuyến mãi: {{$coupon_code}}</th>
                </tr>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn vị tính</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr> 
              </thead>
              <tbody> 
                @foreach($all_order_detail as $key => $order_detail)
                <tr>
                    <td>{{$order_detail->product_name}}</td>
                    <td>{{$order_detail->quantity}}</td>
                    <td>{{$order_detail->unit_name}}</td>
                    <td>{{$order_detail->unit_price}}</td>
                    <td>{{$order_detail->quantity * $order_detail->unit_price}}</td>
                </tr>
                @endforeach
                <tr>
                    <th>Tổng tiền: {{number_format($total)}} VND</th>
                </tr>
              </tbody>
            </table>
          </div>
    </div>
  </div>
@include('../footer')
@endsection
