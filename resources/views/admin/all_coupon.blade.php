@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
         Danh sách khuyến mãi
      </div>
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
          <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Thêm khuyến mãi</button>
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
      <!-- Add new category -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="{{route('save-coupon')}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group">
                            <label for="coupon_code">Mã khuyến mãi</label>
                            <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Tên nhà cung cấp">
                        </div>
                        <div class="form-group">
                            <label for="coupon_type">Loại mã</label>
                            <select name="coupon_type" class="form-control input-sm m-bot15">
                                <option value="fixed">Giảm giá tiền</option>
                                <option value="percent">Giảm theo phần trăm</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="coupon_value">Giá tiền giảm</label>
                            <input type="text" class="form-control" name="coupon_value" id="coupon_value" placeholder="Tên nhà cung cấp">
                        </div>
                        <div class="form-group">
                            <label for="coupon_percent_of">Phần trăm giảm</label>
                            <input type="text" class="form-control" name="coupon_percent_of" id="coupon_percent_of" placeholder="Tên nhà cung cấp">
                        </div>
                        <div class="form-group">
                            <label for="coupon_percent_of">Ngày áp dụng</label>
                            <input type="date" class="form-control" name="apply_at" id="apply_at" placeholder="Tên khuyến mãi">
                        </div>
                        <div class="form-group">
                            <label for="coupon_percent_of">Ngày kết thúc</label>
                            <input type="date" class="form-control" name="end_at" id="end_at" placeholder="Tên khuyến mãi">
                        </div>
                        <button type="submit" class="btn btn-info" name="add_coupon">Thêm khuyến mãi</button>
                </div>
          </form>
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
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th> --}}
              <th>Mã khuyến mãi</th>
              <th>Loại mã</th>
              <th>Giá tiền giảm</th>
              <th>Giá tiền giảm theo phần trăm</th>
              <th>Ngày áp dụng</th>
              <th>Ngày kết thúc</th>
              <th width="80px"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_coupon as $key => $coupon)
            <tr>
              {{-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> --}}
              <td>{{$coupon->code}}</td>
              <td>{{$coupon->type}}</td>
              <td>{{$coupon->value}}</td>
              <td>{{$coupon->percent_of}}</td>
              <td>{{$coupon->apply_at}}</td>
              <td>{{$coupon->end_at}}</td>
              <td>
                <a href="{{route('edit-coupon', $coupon->id)}}" class="active styling-edit" ui-toggle-class=""><img class="active-icon" src="backend/images/edit.png"></a>
                <a onclick="return confirm('Bạn có chắc sẽ xóa?')" href="{{route('delete-coupon', $coupon->id)}}" class="active styling-delete" ui-toggle-class=""><img class="active-icon" src="backend/images/delete.png"></a>
              </td>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-4 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị {{($all_coupon->currentPage()-1)*$itemPerPage+1}}-{{min($all_coupon->currentPage()*$itemPerPage, $count_coupon)}} trên {{$count_coupon}} khuyến mãi</small>
          </div>
          <div class="col-sm-8 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              {{ $all_coupon->links() }}
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection