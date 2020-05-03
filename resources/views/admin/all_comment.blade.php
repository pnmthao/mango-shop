@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">

      <div class="panel-heading">Đánh giá/ Bình luận</div>
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
                  <th width="150px">Khách hàng</th>
                  <th width="100px">Đánh giá</th>
                  <th width="100px">Ngày đánh giá</th>
                  <th width="100px">Hiển thị</th>
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($all_comment as $key => $cmt)
                <tr>
                  {{-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> --}}
                  <td>{{$cmt->name_product}}</td>
                  <td>{{$cmt->name_customer}}</td>
                  <td>{{$cmt->comment}}</td>
                  <td>{{$cmt->created_at}}</td>
                  <td>
                    <span class="text-ellipsis">
                        @if($cmt->status==0)
                            <a href="{{route('unactive-comment', $cmt->id)}}"><img class="active-icon" src="backend/images/unactive.png"></a>
                        @else
                            <a href="{{route('active-comment', $cmt->id)}}"><img class="active-icon" src="backend/images/active.png"></a>
                        @endif
                    </span></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <footer class="panel-footer">
            <div class="row">
              <div class="col-sm-4 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">Hiển thị {{($all_comment->currentPage()-1)*$itemPerPage+1}}-{{min($all_comment->currentPage()*$itemPerPage, $count_comment)}} trên {{$count_comment}} bình luận</small>
              </div>
              <div class="col-sm-8 text-right text-center-xs">                
                <ul class="pagination pagination-sm m-t-none m-b-none">
                  {{ $all_comment->links() }}
                </ul>
              </div>
            </div>
          </footer>
    </div>
  </div>
@endsection