@extends('frontend.master.master')
@section('content')
<!--Banner-->
<div>
    <div>
    <img class="w-100" src="frontend/images/banner_product_home_2.jpg" alt="Products">
    </div>
</div>
<div class="breadcrumb-shop">
    <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
        <ol class="breadcrumb breadcrumb-arrows">
            <li>
            <a href="index.html">
                <span>Trang chủ</span>
            </a>
            </li>
            <li>
            <span><span style="color: #777777">Liên hệ</span></span>
            </li>
        </ol>
        </div>
    </div>
    </div>
</div>
<section>

    <div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 box-heading-contact">
        <div class="box-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.8168707525656!2d105.84047761415687!3d20.999976694137917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac71752d8f79%3A0xd2ec575c01017afa!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBLaW5oIFThur8gUXXhu5FjIETDom4!5e0!3m2!1svi!2s!4v1650050238949!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12  wrapbox-content-page-contact">
        <div class="header-page-contact clearfix">
            <h1>Liên hệ</h1>
        </div>
        <div class="box-info-contact">
            <ul class="list-info">
            <li>
                <p>Địa chỉ chúng tôi</p>
                <p><strong>207 đường Giải Phóng, phường Đồng Tâm, quận Hai Bà Trưng, Tp. Hà Nội.</strong></p>
            </li>
            <li>
                <p>Email chúng tôi</p>
                <p><strong>dohd@sitde.com</strong></p>
            </li>
            <li>
                <p>Điện thoại</p>
                <p><strong>+84 (035) 3621900</strong></p>
            </li>
            <li>
                <p>Thời gian làm việc</p>
                <p><strong>Thứ 2 đến Thứ 6 từ 8h đến 18h; Thứ 7 và Chủ nhật từ 9h30 đến 17h00 </strong></p>
            </li>
            </ul>
        </div>
        <div class="box-send-contact">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                </div>
            @endif
            <h2>Gửi thắc mắc cho chúng tôi</h2>
            <div id="col-left contactFormWrapper menuList-links">
            <form accept-charset="UTF-8" action="{{route('client-contact-store')}}" class="contact-form" method="post">
                @csrf
                <div class="contact-form">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                    <div class="input-group">
                        <input name="fullname" required type="text" class="form-control" placeholder="Tên của bạn">
                    </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                    <div class="input-group">
                        <input name="email" required type="text" class="form-control" placeholder="Email của bạn">
                    </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                    <div class="input-group">
                        <input name="phone" required type="text" class="form-control" placeholder="Số điện thoại của bạn">
                    </div>
                    </div>
                    <div class="col-sm-12 col-xs-12">
                    <div class="input-group">
                        <textarea placeholder="Nội dung" name="contact_content"></textarea>
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <button class="button dark">Gửi cho chúng tôi</button>
                    </div>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
@endsection
