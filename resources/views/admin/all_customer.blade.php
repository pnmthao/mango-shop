@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách khách hàng
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
          <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Thêm khách hàng</button>
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
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th> --}}
              <th>Tên khách hàng</th>
              <th>Hình ảnh</th>
              <th>Giới tính</th>
              <th>Email</th>
              <th>Địa chỉ</th>
              <th>SĐT</th>
              <th width="80px"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_customer as $key => $customer)
            <tr>
              {{-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> --}}
              <td>{{$customer->name}}</td>
              <td><img src="uploads/customer/{{$customer->image}}" height="100" width="100"></td>
              <td>{{$customer->gender}}</td>
              <td>{{$customer->email}}</td>
              <td>{{$customer->address}}</td>
              <td>{{$customer->phone}}</td>
              <td>
                <a href="{{route('edit-customer', $customer->id)}}" class="active styling-edit" ui-toggle-class=""><img class="active-icon" src="backend/images/edit.png"></a>
                <a onclick="return confirm('Bạn có chắc sẽ xóa?')" href="{{route('delete-customer', $customer->id)}}" class="active styling-delete" ui-toggle-class=""><img class="active-icon" src="backend/images/delete.png"></a>
              </td>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-4 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị {{($all_customer->currentPage()-1)*$itemPerPage+1}}-{{min($all_customer->currentPage()*$itemPerPage, $count_customer)}} trên {{$count_customer}} khách hàng</small>
          </div>
          <div class="col-sm-8 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              {{ $all_customer->links() }}
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection