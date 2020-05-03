@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách loại sản phẩm
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
            <form role="form" action="{{route('save-category-product')}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="category_product_name">Tên danh mục sản phẩm</label>
                    <input type="text" class="form-control" name="category_product_name" id="category_product_name" placeholder="Tên danh mục">
                </div>
                <div class="form-group">
                    <label for="category_product_description">Mô tả danh mục</label>
                    <textarea style="resize:none" rows="8" class="form-control" id="category_product_description" name="category_product_description" placeholder="Mô tả danh mục"></textarea>
                </div>
                <div class="form-group">
                    <label for="category_product_image">Hình ảnh</label>
                    <input type="file" class="form-control" name="category_product_image" id="category_product_image">
                </div>
                <div class="form-group">
                    <label for="category_product_status">Hiển thị</label>
                    <select name="category_product_status" class="form-control input-sm m-bot15">
                        <option value="0">Ẩn</option>
                        <option value="1">Hiển thị</option>
                    </select>
                </div>   
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button type="submit" class="btn btn-info" name="add_category_product">Thêm danh mục</button>
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
              {{-- <th style="width:20px;">Chọn
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th> --}}
              <th>Tên danh mục</th>
              <th>Hình ảnh</th>
              <th>Mô tả</th>
              <th width="114px"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_category_product as $key => $cate_pro)
            <tr>
              {{-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> --}}
              <td>{{$cate_pro->name}}</td>
              <td><img src="uploads/category_product/{{$cate_pro->image}}" height="100" width="100"></td>
              <td>{{$cate_pro->description}}</td>
              <td class="td-action">
                @if($cate_pro->status==0)
                    <a href="{{route('unactive-category-product', $cate_pro->id)}}"><img class="active-icon" src="backend/images/unactive.png"></a>
                @else
                    <a href="{{route('active-category-product', $cate_pro->id)}}"><img class="active-icon" src="backend/images/active.png"></a>
                @endif
                <a href="{{route('edit-category-product', $cate_pro->id)}}" class="active styling-edit" ui-toggle-class=""><img class="active-icon" src="backend/images/edit.png"></a>
                <a onclick="return confirm('Bạn có chắc sẽ xóa?')" href="{{route('delete-category-product', $cate_pro->id)}}" class="active styling-delete" ui-toggle-class=""><img class="active-icon" src="backend/images/delete.png"></a>
              </td>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-4 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị {{($all_category_product->currentPage()-1)*$itemPerPage+1}}-{{min($all_category_product->currentPage()*$itemPerPage, $count_category_product)}} trên {{$count_category_product}} loại sản phẩm</small>
          </div>
          <div class="col-sm-8 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              {{ $all_category_product->links() }}
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection