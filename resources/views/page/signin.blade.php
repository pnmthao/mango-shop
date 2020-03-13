@extends('master')
@section('content')
@include('../header')
<!-- Sign in page -->
<div class="contact-w3l">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">@lang('login.title')
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
                            <label for="email">@lang('login.email')</label>
                            <input type="email" class="email" name="email" placeholder="@lang('login.place_email')" required>
                        </div>
                        <div class="">
                            <label for="password">@lang('login.password')</label>
                            <input type="password" class="password" name="password" placeholder="@lang('login.place_password')" required>
                        </div>
                        <input type="submit"  value="@lang('login.button')">
                    </form>
                </div>
            </div>
        </div>
        <!-- //Sign in -->
    </div>
</div>
@include('../footer')
@endsection