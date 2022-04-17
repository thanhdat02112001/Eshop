@extends('frontend.master.master')
@section('content')
<div class="content">
    <section class="signin ">
        <div class="container">
            <div class="signin-left">
                <div class="sign-title">
                    <h1>Đăng nhập</h1>
                </div>
            </div>
            <div class="signin-right " id="a-sign">
                <form action="{{route('customer_post_login')}}" method="POST">
                    @csrf
                    <div class="username form-control1 ">
                        <input type="email" name="email"  id="username" placeholder="Email">
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="password form-control1">
                        <input type="password" id="password" name="password" placeholder="Mật khẩu">
                        @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>

                    <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                    <div class="submit">
                        <button class="btn btn-primary" type="submit">Đăng nhập</button>
                    <div class="forgetpassword">
                            <p id="quenmk">Quên mật khẩu?</p> hoặc <a href="{{route('customer_get_register')}}">Đăng kí</a>
                      </div>

                    </div>

                </form>
            </div>
            <div class="signin-right " id="b-sign">
                <form action="">
                    <div class="username form-control1 ">
                       <h2>Phục hồi mật khẩu</h2>
                    </div>
                    <div class="password form-control1">
                        <input type="text" id="password" placeholder="Mật khẩu">
                    </div>

                    <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                    <div class="submit">
                      <input class="btn" type="submit" value="Gửi">
                      <div class="forgetpassword">
                            <a href="" id="huy">Hủy</a>
                      </div>

                    </div>

                </form>
            </div>
        </div>
    </section>
</div>

@endsection
