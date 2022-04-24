@extends('frontend.master.master')
@section('content')
    <style>
        div.stars {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        input.star {
            display: none;
        }

        label.star {
            float: right;
            padding: 10px;
            font-size: 30px;
            color: #444;
            transition: all .2s;
        }

        input.star:checked ~ label.star:before {
            content: '\f005';
            color: #FD4;
            transition: all .25s;
        }

        input.star-5:checked ~ label.star:before {
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }

        input.star-1:checked ~ label.star:before {
            color: #F62;
        }

        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
        }

        label.star:before {
            content: '\f006';
            font-family: FontAwesome;
        }
    </style>
    <!--  detail product -->
    <main class="">
        <div id="product" class="productDetail-page">
            <!--  menu header seo -->
            <div class="breadcrumb-shop">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
                            <ol class="breadcrumb breadcrumb-arrows">
                                <li>
                                    <a href="/">
                                        <span>Trang chủ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span>Sản phẩm</span>
                                    </a>
                                </li>
                                <li class="active">
                <span>
                    <span itemprop="name">{{$product->product_name}}</span>
                </span>
                                    <meta itemprop="position" content="3">
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- detail product chính -->
            <div class="container">
                <div class="row product-detail-wrapper">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row product-detail-main pr_style_01">
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <div class="product-gallery">
                                    <div class="product-gallery__thumbs-container hidden-sm hidden-xs">
                                        <div class="product-gallery__thumbs thumb-fix">
                                            <div class="product-gallery__thumb active " id="imgg1">
                                                <a class="product-gallery__thumb-placeholder"
                                                   href="javascript:void(0);"
                                                   data-image="/uploads/{{$product->image->image1}}"
                                                   data-zoom-image="/uploads/{{$product->image->image1}}">
                                                    <img src="/uploads/{{$product->image->image1}}"
                                                         data-image="/uploads/{{$product->image->image1}}"
                                                         alt="{{$product->product_name}}"
                                                         grape>
                                                </a>
                                            </div>
                                            @for ($i = 2; $i < $product->image->total_image; $i++)
                                                <div class="product-gallery__thumb  " id="imgg{{$i}}">
                                                    <a class="product-gallery__thumb-placeholder"
                                                       href="javascript:void(0);"
                                                       data-image="/uploads/{!!$product->image->{'image'.$i}!!}"
                                                       data-zoom-image="/uploads/{!!$product->image->{'image'.$i}!!}">
                                                        <img src="/uploads/{!!$product->image->{'image'.$i}!!}"
                                                             data-image="/uploads/{!!$product->image->{'image'.$i}!!}"
                                                             alt="{{$product->product_name}}"
                                                             grape>
                                                    </a>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="product-image-detail box__product-gallery scroll hidden-xs">
                                        <ul id="sliderproduct" class="site-box-content slide_product">
                                            <li class="product-gallery-item gallery-item current " id="imgg1a">
                                                <img class="product-image-feature "
                                                     src="/uploads/{{$product->image->image1}}"
                                                     alt="{{$product->product_name}}" grape="">
                                            </li>
                                            @for ($i = 2; $i < $product->image->total_image; $i++)
                                                <li class="product-gallery-item gallery-item  " id="imgg{{$i}}a">
                                                    <img class="product-image-feature "
                                                         src="/uploads/{!!$product->image->{'image'.$i}!!}"
                                                         alt="{{$product->product_name}}" grape="">
                                                </li>
                                            @endfor
                                        </ul>
                                        <div class="product-image__button">
                                            <div id="product-zoom-in" class="product-zoom icon-pr-fix"
                                                 aria-label="Zoom in" title="Zoom in">
                                                <span class="zoom-in" aria-hidden="true">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                     viewBox="0 0 36 36" style="enable-background:new 0 0 36 36; width:
                                                    30px; height: 30px;" xml:space="preserve">
                                                    <polyline points="6,14 9,11 14,16 16,14 11,9
                                                    14,6 6,6">
                                                    </polyline>
                                                    <polyline points="22,6 25,9 20,14 22,16 27,11
                                                    30,14 30,6">
                                                    </polyline>
                                                    <polyline points="30,22 27,25 22,20 20,22
                                                    25,27 22,30 30,30">
                                                    </polyline>
                                                    <polyline points="14,30 11,27 16,22 14,20 9,25
                                                    6,22 6,30">
                                                    </polyline>
                                                </svg>
                                                </span>
                                            </div>
                                            <div class="gallery-index icon-pr-fix"><span class="current">1</span>
                                                / <span class="total">8</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-gallery-slide">
                                    <div class="owl-carousel owl-theme owl-product-gallery-slide">
                                        @for ($i = 1; $i < $product->image->total_image; $i++)
                                            <div class="item">
                                                <div class="product-gallery__thumb ">
                                                    <a class=" product-gallery__thumb-placeholder"
                                                       href="javascript:void(0);"
                                                       data-image="/uploads/{!!$product->image->{'image'.$i}!!}"
                                                       data-zoom-image="/uploads/{!!$product->image->{'image'.$i}!!}">
                                                        <img src="/uploads/{!!$product->image->{'image'.$i}!!}"
                                                             data-image="/uploads/{!!$product->image->{'image'.$i}!!}"
                                                             alt="{{$product->product_name}}" grape="">
                                                    </a>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-12 col-xs-12 product-content-desc" id="detail-product">
                                <div class="product-content-desc-1">
                                    <div class="product-title product_data">
                                        <h1>{{$product->product_name}}</h1>
                                        <span id="pro_sku">SKU: {{$product->product_code}}</span>
                                    </div>
                                    <div class="product-price" id="price-preview"><span
                                            class="pro-price">Giá: {{number_format($product->product_price)}}₫</span>
                                    </div>
                                    <form id="add-item-form" action="/add-to-cart" method="post"
                                          class="variants clearfix">
                                        @csrf
                                        <div class="selector-actions">
                                            <div class="quantity-area clearfix quantity">
                                                <input type="hidden" id="product_id" name="product_id"
                                                       value="{{$product->id}}">
                                                <input type="button" value="-"
                                                       class="qty-btn minus">
                                                <input type="text" id="quantity" name="qty-input" value="1" min="1"
                                                       class="quantity-selector qty-input">
                                                <input type="button" value="+" class="qty-btn  plus">
                                            </div>
                                            <div class="wrap-addcart clearfix">
                                                <div class="row-flex">
                                                    <button type="submit" class="button btn-addtocart addtocart-modal">
                                                        Thêm vao gio hang
                                                    </button>
                                                    <form action="/buynow" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                        <button type="submit" class="buy-now button"
                                                                style="display: block;">Mua
                                                            ngay
                                                        </button>
                                                    </form>
                                                </div>
                                                <a href="" target="_blank" class="button btn-check"
                                                   style="color: #ffffff;text-decoration:none;"><span>Click nhận mã giảm giá ngay!</span></a>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="product-description">
                                        <div class="title-bl">
                                            <h2>Mô tả</h2>
                                        </div>
                                        <div class="description-content">
                                            <div class="description-productdetail">
                                                <p>{{$product->product_description}}</p>
                                            </div>
                                            @if (auth()->guard('customers')->user())
                                                <div style="border: 1px solid #678678; padding: 10px" class="rate-form text-center">
                                                    <span> Bạn nghĩ sao về sản phẩm này ?</span>
                                                    <div class="stars">
                                                        <form method="post" action="{{route('client-rate', ['id' => $product->id])}}">
                                                            @csrf
                                                            <div class="group-star">
                                                                <input class="star star-5" value="5" id="star-5" {{ $product->rate = 5 ? 'checked' : "" }} type="radio" name="star"/>
                                                                <label class="star star-5" for="star-5"></label>
                                                                <input class="star star-4" value="4" id="star-4" {{ $product->rate = 4 ? 'checked' : "" }} type="radio" name="star"/>
                                                                <label class="star star-4" for="star-4"></label>
                                                                <input class="star star-3" value="3" id="star-3" {{ $product->rate = 3 ? 'checked' : "" }} type="radio" name="star"/>
                                                                <label class="star star-3" for="star-3"></label>
                                                                <input class="star star-2" value="2" id="star-2" {{ $product->rate = 2 ? 'checked' : "" }} type="radio" name="star"/>
                                                                <label class="star star-2" for="star-2"></label>
                                                                <input class="star star-1" value="1" id="star-1" {{ $product->rate = 1 ? 'checked' : "" }} type="radio" name="star"/>
                                                                <label class="star star-1" for="star-1"></label>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-productRelated clearfix">
                            <div class="heading-title text-center">
                                <h2>Sản phẩm liên quan</h2>
                            </div>
                            <div class="container">
                                <div class="row">
                                    @foreach($relatedProducts as $relatedProduct)
                                    <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                                        <div class="product-block">
                                            <div class="product-img fade-box">
                                                <a href="{{route("client-product-detail",$relatedProduct->id)}}" title="{{$relatedProduct->product_name}}" class="img-resize">
                                                    <img
                                                        src="/uploads/{{$relatedProduct->image->image1}}"
                                                        alt="{{$relatedProduct->product_name}}" class="lazyloaded">
                                                    <img
                                                        src="/uploads/{{$relatedProduct->image->image2}}"
                                                        alt="{{$relatedProduct->product_name}}" class="lazyloaded">
                                                </a>
                                            </div>
                                            <div class="product-detail clearfix">
                                                <div class="pro-text">
                                                    <a style=" color: black;
                                                                            font-size: 14px;text-decoration: none;" href="#"
                                                       title="{{$relatedProduct->product_name}}" inspiration pack>
                                                        {{$relatedProduct->product_name}}
                                                    </a>
                                                </div>
                                                <div class="pro-price">
                                                    <p class="">{{number_format($relatedProduct->product_price)}}₫</p>
                                                </div>
                                                <div class="pro-price d-flex justify-content-between">
                                                    <a class="text-secondary" style=" color: black; font-size: 14px;text-decoration: none;" href="#" title="" inspiration pack>
                                                        <span>Đã bán: </span>{{$relatedProduct->product_sale == null ? 0 : $product->product_sale}}
                                                    </a>
                                                    <a class="text-secondary" style=" color: black; font-size: 14px;text-decoration: none;" href="#" title="" inspiration pack>
                                                        <span>Còn lại: </span>{{$relatedProduct->quantity - $relatedProduct->product_sale}}
                                                    </a>
                                                </div>
                                                <div class="pro-start">
                                                    <span class="fa fa-star {{ $relatedProduct->rate >= 0 ? 'checked' : "" }}"></span>
                                                    <span class="fa fa-star {{ $relatedProduct->rate >= 1 ? 'checked' : "" }}"></span>
                                                    <span class="fa fa-star {{ $relatedProduct->rate >= 2 ? 'checked' : "" }}"></span>
                                                    <span class="fa fa-star {{ $relatedProduct->rate >= 3 ? 'checked' : "" }}"></span>
                                                    <span class="fa fa-star {{ $relatedProduct->rate >= 4 ? 'checked' : "" }}"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- show zoom detail product -->
        <div id="comment-wrapper">
            <div class="container">
                <div class="be-comment-block">
                    <h1 class="comments-title">Comments ({{count($comments)}})</h1>
                    @if($comments)
                        @foreach($comments as $comment)
                            <div class="be-comment">
                                <div class="be-img-comment">
                                    <a href="#">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""
                                             class="be-ava-comment">
                                    </a>
                                </div>
                                <div class="be-comment-content">
				<span class="be-comment-name">
					<a href="blog-detail-2.html">{{$comment->fullname}}</a>
					</span>
                                    <span class="be-comment-time">
					<i class="fa fa-clock-o"></i>
					{{$comment->started_at}}
				</span>

                                    <p class="be-comment-text">
                                        {{$comment->content}}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <ul class="pagination">
                        {{ $comments->links('pagination::bootstrap-4') }}
                    </ul>
                    <form class="form-block" method="post"
                          action="{{route('client-comment-product-store', ['id' => $product->id])}}">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group fl_icon">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <input class="form-input" value="{{ $customer ? $customer->name : "" }}"
                                           name="fullname" type="text" placeholder="Your name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 fl_icon">
                                <div class="form-group fl_icon">
                                    <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                    <input class="form-input" value="{{ $customer ? $customer->email : "" }}"
                                           name="email" type="text" placeholder="Your email">
                                </div>
                            </div>
                            <div class="col-xs-12 w-100 p-3">
                                <div class="form-group">
                                    <textarea class="form-input" name="comment_content" required=""
                                              placeholder="Your text"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary center-block">Bình luận</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- zoom -->
        <div class="product-zoom11">
            <div class="product-zom">
                <div class="divclose">
                    <i class="fa fa-times-circle"></i>
                </div>
                <div class="owl-carousel owl-theme owl-product1">
                    @for ($i = 1; $i < $product->image->total_image; $i++)
                        <div class="item"><img src="/uploads/{!!$product->image->{'image'.$i}!!}" alt="">
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </main>
@endsection

