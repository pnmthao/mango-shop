@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> Cập nhật khách hàng </header>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>
            <div class="panel-body">
                <div class="position-center">
                    @foreach($edit_customer as $key => $edit_value)
                        <form role="form" action="{{route('update-customer',$edit_value->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="customer_name">Họ tên khách hàng</label>
                                <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{$edit_value->name}}">
                            </div>
                            <div class="form-group">
                                <label for="customer_image">Hình ảnh</label>
                                <input type="file" class="form-control" name="customer_image" id="customer_image">
                                <img src="{{asset('public/uploads/customer/'.$edit_value->image)}}" height="100" width="100"></<img>
                            </div>
                            <div class="form-group">
                                <label for="customer_gender">Giới tính</label>
                                <select name="customer_gender" class="form-control input-sm m-bot15">
                                    <option selected>{{$edit_value->gender}}</option>
                                    <option>Nam</option>
                                    <option>Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="customer_email">Địa chỉ email</label>
                                <input type="text" class="form-control" name="customer_email" id="customer_email" value="{{$edit_value->email}}">
                            </div>
                            <div class="form-group">
                                <label for="customer_address">Địa chỉ</label>
                                <input type="text" class="form-control" name="customer_address" id="customer_address" value="{{$edit_value->address}}">
                            </div>
                            <div class="form-group">
                                <label for="customer_phone">Số điện thoại</label>
                                <input type="text" class="form-control" name="customer_phone" id="customer_phone" value="{{$edit_value->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="customer_note">Ghi chú</label>
                                <textarea style="resize:none" rows="8" class="form-control" id="customer_note" name="customer_note">{{$edit_value->note}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-info" name="edit_customer">Cập nhật khách hàng</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@endsection