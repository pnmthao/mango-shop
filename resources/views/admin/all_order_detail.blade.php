@extends('admin_layout')
@section('admin_content')
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
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>
          </span>
        </div>
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
                    {{-- <th>Trạng thái: {{$status_name}}</th> --}}
                    <th>
                      <select name="bill_status" class="form-control input-sm m-bot15">
                      @foreach ($bill_status as $key => $bill_sta)
                        @if($bill_sta->id==$order_detail->id_status)
                            <option selected value="{{$bill_sta->id}}">{{$bill_sta->name}}</option>
                        @else
                            <option value="{{$bill_sta->id}}">{{$bill_sta->name}}</option>
                        @endif
                      @endforeach
                      </select>
                   </th>
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
                    <th>Tổng tiền: {{number_format($total)}}</th>
                </tr>
                
              </tbody>
            </table>
          </div>
        <footer class="panel-footer">
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
      </footer>
    </div>
  </div>
@endsection