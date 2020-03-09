@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm khách hàng
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
                    <form role="form" action="{{route('save-customer')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="customer_name">Họ tên khách hàng</label>
                            <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Nhập họ tên khách hàng">
                        </div>
                        <div class="form-group">
                            <label for="customer_gender">Giới tính</label>
                            <select name="customer_gender" class="form-control input-sm m-bot15">
                                <option>Nữ</option>
                                <option>Nam</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="customer_email">Địa chỉ Email</label>
                            <input type="text" class="form-control" name="customer_email" id="customer_email" placeholder="Nhập địa chỉ email">
                        </div>
                        <div class="form-group">
                            <label for="customer_address">Địa chỉ</label>
                            <input type="text" class="form-control" name="customer_address" id="customer_address" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="form-group">
                            <label for="customer_phone">Số điện thoại</label>
                            <input type="text" class="form-control" name="customer_phone" id="customer_phone" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <label for="customer_note">Ghi chú</label>
                            <input type="text" class="form-control" name="customer_note" id="customer_phone" placeholder="Nhập ghi chú">
                        </div>
                        <div class="form-group">
                            <label for="customer_image">Hình ảnh</label>
                            <input type="file" class="form-control" name="customer_image" id="customer_image">
                        </div>                        
                        <button type="submit" class="btn btn-info" name="add_customer">Thêm khách hàng</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection