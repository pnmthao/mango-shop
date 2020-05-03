@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm khuyến mãi
            </header>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{route('save-coupon')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="coupon_code">Mã khuyến mãi</label>
                            <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Tên khuyến mãi">
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
                            <input type="text" class="form-control" name="coupon_value" id="coupon_value" placeholder="Tên khuyến mãi">
                        </div>
                        <div class="form-group">
                            <label for="coupon_percent_of">Phần trăm giảm</label>
                            <input type="text" class="form-control" name="coupon_percent_of" id="coupon_percent_of" placeholder="Tên khuyến mãi">
                        </div>
                        <button type="submit" class="btn btn-info" name="add_coupon">Thêm khuyến mãi</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection