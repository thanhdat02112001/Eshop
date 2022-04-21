@extends('frontend.master.master')
@section('content')
    <!-- Owl-Carousel -->
    <div class="owl-carousel owl-theme owl-carousel-setting">
        <div class="item"><img src="frontend/images/banner-macbook-air.jpg" class="d-block w-100" alt="..."></div>
        <div class="item"><img src="frontend/images/banner-chân-trang.jpg" class="d-block w-100" alt="..."></div>
        <div class="item"><img src="frontend/images/banner_product_home_2.jpg" class="d-block w-100" alt="..."></div>
    </div>
    <!--Content-->
    <div class="content">
        <div class="container">
            <div class="hot_sp" style="padding-bottom: 10px;">
                <h2 style="text-align:center;padding-top: 10px">
                    <a style="font-size: 28px;color: black;text-decoration: none" href="">Sản phẩm bán chạy</a>
                </h2>
                <div class="view-all" style="text-align:center;padding-top: -10px;">
                    <a style="color: black;text-decoration: none" href="">Xem thêm</a>
                </div>
            </div>
        </div>
        <!--Product-->
        <div class="container" style="padding-bottom: 50px;">
            <div class="row">
                @foreach($sellProducts as $sellProduct)
                    <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                        <div class="product-block">
                            <div class="product-img fade-box">
                                <a href="{{route("client-product-detail",$sellProduct->id)}}"
                                   title="" class="img-resize">
                                    <img class="lazyloaded"
                                         src="/uploads/{{$sellProduct->image->image1}}"
                                         alt="{{$sellProduct->product_name}}">
                                    <img class="lazyloaded" src="/uploads/{{$sellProduct->image->image2}}"
                                         alt="{{$sellProduct->product_name}}">
                                </a>
                            </div>
                            <div class="product-detail clearfix">
                                <div class="pro-text">
                                    <a style=" color: black; font-size: 14px;text-decoration: none;" href="#" title="" inspiration pack>
                                        {{$sellProduct->product_name}}
                                    </a>
                                </div>
                                <div class="pro-text">
                                    <a style=" color: black; font-size: 14px;text-decoration: none;" href="#" title="" inspiration pack>
                                        <span>Đã bán: </span>{{$sellProduct->product_sale}}
                                    </a>
                                </div>
                                <div class="pro-price">
                                    <p class="">{{number_format($sellProduct->product_price)}}₫</p>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <section class="section wrapper-home-banner">
            <div class="container-fluid" style="padding-bottom: 50px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 home-banner-pd">
                        <div class="block-banner-category">
                            <a href="#" class="link-banner wrap-flex-align flex-column">
                                <div class="fg-image fade-box">
                                    <img class="lazyloaded" src="frontend/images/shoes/block_home_category1_grande.jpg"
                                         alt="Shoes">
                                </div>
                                <figcaption class="caption_banner site-animation">
                                    <p>Bộ sưu tập</p>
                                    <h2>
                                        Đại sứ thương hiệu
                                    </h2>
                                </figcaption>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 home-banner-pd">
                        <div class="block-banner-category">
                            <a href="#" class="link-banner wrap-flex-align flex-column">
                                <div class="fg-image fade-box">
                                    <img class="lazyloaded" src="frontend/images/shoes/block_home_category2_grande.jpg"
                                         alt="Shoes">
                                </div>
                                <figcaption class="caption_banner site-animation">
                                    <p>Bộ sưu tập</p>
                                    <h2>
                                        Thương hiệu
                                    </h2>
                                </figcaption>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 home-banner-pd">
                        <div class="block-banner-category">
                            <a href="#" class="link-banner wrap-flex-align flex-column">
                                <div class="fg-image">
                                    <img class="lazyloaded" src="frontend/images/shoes/block_home_category3_grande.jpg"
                                         alt="Shoes">
                                </div>
                                <figcaption class="caption_banner site-animation">
                                    <p></p>
                                    <h2>
                                        Blog
                                    </h2>
                                </figcaption>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="content">
                <div class="container">
                    <div class="hot_sp">
                        <h2 style="text-align:center;">
                            <a style="font-size: 28px;color: black;text-decoration: none" href="">Sản phẩm mới</a>
                        </h2>
                        <div class="view-all" style="text-align:center;">
                            <a style="color: black;text-decoration: none" href="">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <!--Product-->
            </div>
            <div class="container product" style="width: 100%;margin: auto;">
                <div class="owl-carousel owl-theme owl-product-setting">
                    @foreach($newProducts as $newProduct)
                        <div class="item">
                            <div class="">
                                <div class="product-block">
                                    <div class="product-img fade-box">
                                        <a href="{{route("client-product-detail",$newProduct->id)}}"
                                           title="{{$newProduct->product_name}}" class="img-resize">
                                            <img
                                                src="/uploads/{{$newProduct->image->image1}}"
                                                alt="{{$newProduct->product_name}}"
                                                class="lazyloaded">
                                            <img src="/uploads/{{$newProduct->image->image2}}"
                                                 alt="{{$newProduct->product_name}}"
                                                 class="lazyloaded">
                                        </a>
                                    </div>
                                    <div class="product-detail clearfix">
                                        <div class="pro-text">
                                            <a style=" color: black;
                        font-size: 14px;text-decoration: none;" href="#" title="Adidas Ultraboost W" inspiration pack>
                                                {{$newProduct->product_name}}
                                            </a>
                                        </div>
                                        <div class="pro-price">
                                            <p class="">{{number_format($newProduct->product_price)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </section>
        <section class="">
            <div class="content">
                <div class="container">
                    <div class="hot_sp">
                        <h2 style="text-align:center;padding-top: 10px">
                            <a style="font-size: 28px;color: black;text-decoration: none" href="">Bài viết mới nhất</a>
                        </h2>
                        <br/>
                    </div>
                </div>
            </div>
            <!--New-->
            <div>

                <div class="container">

                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-md-4">
                                <div class="post_item">
                                    <div class="post_featured w-100">
                                        <a href="{{route('client-blog-detail', ['id' => $blog->id])}}" title="Adidas EQT Cushion ADV">
                                            <img style="height: 200px;" class="img-resize w-100" style="padding-bottom:15px;"
                                                 src="/uploads/{{ $blog->blog_image }}"
                                                 alt="{{ $blog->blog_title }}">
                                        </a>
                                    </div>
                                    <div class="pro-text">
                                        <span class="post_info_item">{{ $blog->created_at->toDateString() }}</span>
                                    </div>
                                    <div class="pro-text">
                                        <h3 class="post_title">
                                            <a style=" color: black;
                                font-size: 18px;text-decoration: none;" href="{{route('client-blog-detail', ['id' => $blog->id])}}" inspiration pack>
                                                {{$blog->blog_title}}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="section wrapper-home-newsletter">
            <div class="container-fluid">
                <div class="content-newsletter">
                    <h2>Đăng ký</h2>
                    <p>Đăng ký nhận bản tin của Runner Inn để cập nhật những sản phẩm mới, nhận thông tin ưu đãi đặc
                        biệt và thông
                        tin
                        giảm giá khác.</p>
                    <div class="form-newsletter">
                        <form action="" accept-charset="UTF-8" class="">
                            <div class="form-group">
                                <input type="hidden" id="contact_tags">
                                <input required="" type="email" value="" placeholder="Nhập email của bạn"
                                       aria-label="Email Address"
                                       class="">
                                <button type="submit" class=""><span>Gửi</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
