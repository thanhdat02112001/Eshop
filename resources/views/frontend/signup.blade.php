@extends('frontend.master.master')
@section('content')
<div class="content">
    <section class="signup">
        <div class="container">
            <div class="signin-left">
                <div class="sign-title">
                    <h1>Tạo tài khoản</h1>
                </div>
            </div>
            <div class="signin-right ">
                <form action="{{route('customer_post_register')}}" method="POST">
                    @csrf
                    <div class="name form-control1 ">
                        <input type="text"  id="name" name="name" placeholder="Họ Tên">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="email form-control1">
                        <input type="email"  id="email" name="email" placeholder="Email">
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="address form-control1">
                        <input type="text" id="address" name="address" placeholder="Địa chỉ">
                        @error('address')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-control1">
                        <input type="text" id="" name="phone" placeholder="Số điện thoại">
                        @error('phone')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="password form-control1">
                        <input type="password"  id="password" name="password" placeholder="Password">
                        @error('password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                      <button type="submit" class="btn btn-primary">Đăng kí</button>
                    <div class="backto">
                      <a href=""><i class="fa fa-long-arrow-alt-left"></i> Quay lại trang chủ</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
