@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">Hồ sơ cá nhân</header>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>
            <div class="panel-body">
                <div class="position-center">
                    @foreach($edit_profile as $key => $edit_value)
                        <form role="form" action="{{route('update-profile',$edit_value->admin_id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="profile_name">Họ tên</label>
                                <input type="text" class="form-control" name="profile_name" id="profile_name" value="{{$edit_value->admin_name}}">
                            </div>
                            <div class="form-group">
                                <label for="profile_image">Hình ảnh</label>
                                <input type="file" class="form-control" name="profile_image" id="profile_image">
                                <img src="{{asset('public/uploads/profile/'.$edit_value->admin_image)}}" height="100" width="100"></<img>
                            </div>
                            {{-- <div class="form-group">
                                <label for="profile_gender">Giới tính</label>
                                <select name="profile_gender" class="form-control input-sm m-bot15">
                                    <option selected>{{$edit_value->gender}}</option>
                                    <option>Nam</option>
                                    <option>Nữ</option>
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label for="profile_email">Địa chỉ email</label>
                                <input type="text" class="form-control" name="profile_email" id="profile_email" value="{{$edit_value->admin_email}}">
                            </div>
                            <div class="form-group">
                                <label for="profile_phone">Số điện thoại</label>
                                <input type="text" class="form-control" name="profile_phone" id="profile_phone" value="{{$edit_value->admin_phone}}">
                            </div>
                            <div class="form-group">
                                <label for="profile_password">Mật khẩu</label>
                                <input type="password" class="form-control" name="profile_password" id="profile_password" value="" placeholder="Mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="re_password">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="re_password" id="re_password" value="" placeholder="Xác nhận lại mật khẩu">
                            </div>
                            <button type="submit" class="btn btn-info" name="edit_profile">Cập nhật nhân viên</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@endsection