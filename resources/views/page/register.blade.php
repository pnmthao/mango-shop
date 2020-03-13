@extends('master')
@section('content')
@include('../header')
<!-- Sign up page -->
<div class="contact-w3l">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">@lang('signup.title')
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <!-- sign up -->
        <div class="contact agileits">
            <div class="contact-agileinfo">
                <div class="contact-form wthree">
                    <form action="{{route('dangky')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    {{$err}}
                                @endforeach
                            </div>
                        @endif
                        @if(Session::has('thongbao'))
                            <div class="alert alert-success">{{Session::get('thongbao')}}</div>
                        @endif
                        <div class="">
                            <label for="email">@lang('signup.email')</label>
                            <input type="email" class="email" name="email" placeholder="Nhập địa chỉ Email" required>
                        </div>
                        <div class="">
                            <label for="name">@lang('signup.fullname')</label>
                            <input type="text" class="name" name="name" placeholder="Name" required>
                        </div>
                        <div class="">
                            <label for="adress">@lang('signup.address')</label>
                            <input type="text" class="text"  name="address" placeholder="Nhập địa chỉ" required>
                        </div>
                        <div class="">
                            <label for="phone">@lang('signup.phone')</label>
                            <input type="text" class="phone" name="phone" placeholder="Nhập số điện thoại" required>
                        </div>
                        <div class="">
                            <label for="password">@lang('signup.password')</label>
                            <input type="password" class="password" name="password" placeholder="Nhập mật khẩu" required>
                        </div>
                        <div class="">
                            <label for="re_password">@lang('signup.re_password')</label>
                            <input type="password" class="re_password" name="re_password" placeholder="Nhập lại mật khẩu" required>
                        </div>
                        <input type="submit" value="@if(Session::get('locale') == 'en') Submit @else Đăng ký @endif">
                    </form>
                </div>
            </div>
        </div>
        <!-- //Sign up -->
    </div>
</div>
@include('../footer')
@endsection