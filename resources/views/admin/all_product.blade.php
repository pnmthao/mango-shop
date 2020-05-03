@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">

      <div class="panel-heading">Danh sách sản phẩm</div>
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
                  <th width="150px">Tên sản phẩm</th>
                  <th>Hình ảnh</th>
                  {{-- <th width="150px">Mô tả sản phẩm</th> --}}
                  <th width="100px">Giá gốc</th>
                  <th width="100px">Giá giảm</th>
                  <th>ĐVT</th>
                  <th>SL</th>
                  <th>Danh mục</th>
                  <th>NCC</th>
                  <th width="114px"></th>
                  {{-- <th style="width:80px;"></th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach($all_product as $key => $pro)
                <tr>
                  {{-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> --}}
                  <td>{{$pro->name}}</td>
                  <td><img src="uploads/product/{{$pro->image}}" height="100" width="100"></td>
                  {{-- <td>{{$pro->description_product}}</td> --}}
                  <td>{{$pro->unit_price}}</td>
                  <td>{{$pro->promotion_price}}</td>
                  <td>{{$pro->unit_name}}</td>
                  <td>{{$pro->quantity}}</td>
                  <td>{{$pro->name_type}}</td>
                  <td>{{$pro->name_brand}}</td>
                  <td class="td-action">
                    @if($pro->status==0)
                        <a href="{{route('unactive-product', $pro->id)}}"><img class="active-icon" src="backend/images/unactive.png"></a>
                    @else
                        <a href="{{route('active-product', $pro->id)}}"><img class="active-icon" src="backend/images/active.png"></a>
                    @endif
                    <a href="{{route('edit-product', $pro->id)}}" class="active styling-edit" ui-toggle-class=""><img class="active-icon" src="backend/images/edit.png"></a>
                    <a onclick="return confirm('Bạn có chắc sẽ xóa?')" href="{{route('delete-product', $pro->id)}}" class="active styling-delete" ui-toggle-class=""><img class="active-icon" src="backend/images/delete.png"></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-4 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị {{($all_product->currentPage()-1)*$itemPerPage+1}}-{{min($all_product->currentPage()*$itemPerPage, $count_product)}} trên {{$count_product}} sản phẩm</small>
          </div>
          <div class="col-sm-8 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              {{ $all_product->links() }}
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection