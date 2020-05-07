@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
      <div class="panel-heading">Đơn hàng</div>
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
        {{-- <div class="col-sm-4">
          <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Thêm đơn hàng</button>
        </div> --}}
        <div class="col-sm-4">
          {{-- <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Thêm đơn hàng</button> --}}
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
                {{-- <th style="width:20px;">
                  <label class="i-checks m-b-none"><input type="checkbox"></label>
                </th> --}}
                <th>Mã HĐ</th>
                <th>Tên khách hàng</th>
                <th>Trị giá</th>
                <th>Ngày đặt hàng</th>
                <th>Hình thức thanh toán</th>
                <th>Khuyến mãi</th>
                <th>Trạng thái</th>
                <th style="width:30px;">Xem</th>
              </tr>
            </thead>
            <tbody>
              @foreach($all_order as $key => $order)
              <tr>
                {{-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> --}}
                <td>{{$order->id}}</td>
                <td>{{$order->customer_name}}</td>
                <td>{{$order->total}}</td>
                <td>{{date('d-m-Y', strtotime($order->date_order))}}</td>
                <td>{{$order->payment}}</td>
                <td>{{$order->coupon_code}}</td>
                <td>{{$order->status_name}}</td>
                <td>
                  <a href="{{route('all-order-detail', $order->id)}}" class="active styling-edit" ui-toggle-class=""><img class="active-icon" src="backend/images/edit.png"></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-4 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">Hiển thị {{($all_order->currentPage()-1)*$itemPerPage+1}}-{{min($all_order->currentPage()*$itemPerPage, $count_order)}} trên {{$count_order}} đơn hàng</small>
            </div>
            <div class="col-sm-8 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                {{ $all_order->links() }}
              </ul>
            </div>
          </div>
        </footer>
    </div>
  </div>
</div>
@endsection