@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">Cập nhật khuyến mãi</header>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>
            <div class="panel-body">
                @foreach($edit_coupon as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{route('update-coupon',$edit_value->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="coupon_code">Mã khuyến mãi</label>
                                <input type="text" class="form-control" value="{{$edit_value->code}}" name="coupon_code" id="coupon_code" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                            <label for="coupon_type">Loại mã</label>
                            <select name="coupon_type" class="form-control input-sm m-bot15" value="{{$edit_value->type}}">
                                <option value="fixed">Giảm giá tiền</option>
                                <option value="percent">Giảm theo phần trăm</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="coupon_value">Giá tiền giảm</label>
                            <input type="text" class="form-control" name="coupon_value" id="coupon_value" placeholder="Tên khuyến mãi" value="{{$edit_value->value}}">
                            </div>                         
                            <div class="form-group">
                            <label for="coupon_percent_of">Phần trăm giảm</label>
                            <input type="text" class="form-control" name="coupon_percent_of" id="coupon_percent_of" placeholder="Tên khuyến mãi" value="{{$edit_value->percent_of}}">
                            </div>
                            <button type="submit" class="btn btn-info" name="edit_coupon">Cập nhật khuyến mãi</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection