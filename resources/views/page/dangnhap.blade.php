@extends('master')
@section('content')
@include('../header')
<!-- Sign in page -->
<div class="contact-w3l">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Đăng nhập
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <!-- sign in -->
        <div class="contact agileits">
            <div class="contact-agileinfo">
                <div class="contact-form wthree">
                    <form action="{{route('dangnhap')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @if(Session::has('flag'))
                            <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
                        @endif
                        <div class="">
                            <label for="email">Địa chỉ Email (*)</label>
                            <input type="email" class="email" name="email" placeholder="Nhập địa chỉ Email" required>
                        </div>
                        <div class="">
                            <label for="password">Mật khẩu (*)</label>
                            <input type="password" class="password" name="password" placeholder="Nhập mật khẩu" required>
                        </div>
                        <input type="submit" value="Đăng nhập">
                    </form>
                </div>
            </div>
        </div>
        <!-- //Sign in -->
    </div>
</div>
@include('../footer')
@endsection