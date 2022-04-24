@extends('frontend.master.master')
@section('content')
<!--Banner-->
<style>
    .checked {
        color: orange;
    }
</style>
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
            <a href="{{route('client-product-index')}}">
                <span>Trang chủ</span>
            </a>
            </li>
            <li>
            <a href="Product.html">
                <span>Danh mục</span>
            </a>
            </li>
            <li>
            <span><span style="color: #777777">Tất cả sản phẩm</span></span>
            </li>
        </ol>
        </div>
    </div>
    </div>
</div>
    <!--List Prodct-->
    <div class="container" style="margin-top: 50px;">
        <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12 sidebar-fix">
            <div class="wrap-filter">
            <div class="box_sidebar">
                <div class="block left-module">
                <div class=" filter_xs">
                    <div class="group-menu">
                    <div class="title_block d-block d-sm-none d-none d-sm-block d-md-none" data-toggle="collapse"
                    href="#collapseExample1" role="button" aria-expanded="false"
                    aria-controls="collapseExample1">
                        Danh mục sản phẩm
                        <span><i class="fa fa-angle-down" data-toggle="collapse"
                        href="#collapseExample1" role="button" aria-expanded="false"
                        aria-controls="collapseExample1"></i></span>
                    </div>
                    <div class="block_content layered-category collapse" id="collapseExample1">
                        <div class="layered-content card card-body"  style="border:0;padding:0">
                        <ul class="menuList-links">
                            <li class=""><a href="{{asset('/')}}" title="Trang chủ"><span>Trang chủ</span></a></li>
                            <li class="has-submenu level0 ">
                                <a title="Sản phẩm" >Thương hiệu<span class="icon-plus-submenu" data-toggle="collapse"
                                                                   href="#collapseBrand" role="button" aria-expanded="false"
                                                                   aria-controls="collapseExample"></span></a>
                                <div class="collapse" id="collapseBrand">
                                    <div class="card card-body" style="border:0;padding-top:0;">
                                        <ul class="menu-product">
                                            @foreach($brands as $brand)
                                                <li><a href="{{\Illuminate\Support\Facades\Request::fullUrlWithQuery(['brand' => $brand->product_brand])}}" title="{{$brand->product_brand}}">{{$brand->product_brand}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="has-submenu level0 ">
                            <a title="Sản phẩm" >Danh mục<span class="icon-plus-submenu" data-toggle="collapse"
                                href="#collapseExample" role="button" aria-expanded="false"
                                aria-controls="collapseExample"></span></a>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body" style="border:0;padding-top:0;">
                                <ul class="menu-product">
                                    @foreach($categories as $category)
                                        <li><a href="{{\Illuminate\Support\Facades\Request::fullUrlWithQuery(['category' => $category->id])}}" title="{{$category->category_name}}">{{$category->category_name}}</a></li>
                                    @endforeach
                                </ul>
                                </div>
                            </div>
                            </li>
                            <li class=""><a href="{{asset('introduce')}}" title="Giới thiệu"><span>Giới thiệu</span></a></li>
                            <li class=""><a href="{{asset('blog')}}" title="Blog"><span>Blog</span></a></li>
                            <li class=""><a href="{{asset('contact')}}" title="Liên hệ"><span>Liên hệ</span></a></li>
                        </ul>
                        </div>
                    </div>
                    </div>
                    <div class="layered">
                    <p class="title_block d-block d-sm-none d-none d-sm-block d-md-none" data-toggle="collapse"
                    href="#collapseExample2" role="button" aria-expanded="false"
                    aria-controls="collapseExample2">
                        Bộ lọc sản phẩm
                        <span><i class="fa fa-angle-down" data-toggle="collapse"
                        href="#collapseExample2" role="button" aria-expanded="false"
                        aria-controls="collapseExample2"></i></span>
                    </p>
                    <div class="block_content collapse" id="collapseExample2">
                        <div class="group-filter card card-body" style="border:0;padding:0" aria-expanded="true">
                        </div>
                        <div class="group-filter" aria-expanded="true">
                        <div class="layered_subtitle dropdown-filter"><span>Giá sản phẩm</span><span
                            class="icon-control"><i class="fa fa-minus"></i></span></div>
                        <div class="layered-content bl-filter filter-price">
                                <ul class="check-box-list">
                                    <li>
                                        <a class="text-decoration-none text-dark" href="{{\Illuminate\Support\Facades\Request::fullUrlWithQuery(['price' => 1])}}">
                                            <span>Dưới</span> 1.000,000₫
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-decoration-none text-dark" href="{{\Illuminate\Support\Facades\Request::fullUrlWithQuery(['price' => 2])}}">
                                            1.000,000₫ - 5.000,000₫
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-decoration-none text-dark" href="{{\Illuminate\Support\Facades\Request::fullUrlWithQuery(['price' => 3])}}">
                                            5.000,000₫ - 10.000,000₫
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-decoration-none text-dark" href="{{\Illuminate\Support\Facades\Request::fullUrlWithQuery(['price' => 4])}}">
                                            10.000,000₫ - 20.000,000₫
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-decoration-none text-dark" href="{{\Illuminate\Support\Facades\Request::fullUrlWithQuery(['price' => 5])}}">
                                            <span>Trên</span> 20.000,000₫
                                        </a>
                                    </li>
                                </ul>
                        </div>
                        </div>

                        <div class="group-filter" aria-expanded="true">
                        <div class="layered_subtitle dropdown-filter"><span>Màu sắc</span><span class="icon-control"><i
                                class="fa fa-minus"></i></span></div>
                        <div class="layered-content filter-color s-filter">
                            <ul class="check-box-list">
                            <li>
                                <input type="checkbox" id="data-color-p1">
                                <label for="data-color-p1" style="background-color: #fb4727"></label>
                            </li>
                            <li>
                                <input type="checkbox" id="data-color-p2">
                                <label for="data-color-p2" style="background-color: #fdfaef"></label>
                            </li>
                            <li>
                                <input type="checkbox" id="data-color-p3">
                                <label for="data-color-p3" style="background-color: #3e3473"></label>
                            </li>
                            <li>
                                <input type="checkbox" id="data-color-p4">
                                <label for="data-color-p4" style="background-color: #ffffff"></label>
                            </li>
                            <li>
                                <input type="checkbox" id="data-color-p5">
                                <label for="data-color-p5" style="background-color: #75e2fb"></label>
                            </li>
                            <li>
                                <input type="checkbox" id="data-color-p6">
                                <label for="data-color-p6" style="background-color: #cecec8"></label>
                            </li>
                            <li>
                                <input type="checkbox" id="data-color-p7">
                                <label for="data-color-p7" style="background-color: #6daef4"></label>
                            </li>
                            <li>
                                <input type="checkbox" id="data-color-p8">
                                <label for="data-color-p8" style="background-color: #000000"></label>
                            </li>
                            <li>
                                <input type="checkbox" id="data-color-p9">
                                <label for="data-color-p9" style="background-color: #e2262a"></label>
                            </li>
                            <li>
                                <input type="checkbox" id="data-color-p10">
                                <label for="data-color-p10" style="background-color: #ee8aa1"></label>
                            </li>
                            <li>
                                <input type="checkbox" id="data-color-p11">
                                <label for="data-color-p11" style="background-color: #4a5250"></label>
                            </li>
                            </ul>
                        </div>
                        </div>
                        <div class="group-filter" aria-expanded="true">
                        <div class="layered_subtitle dropdown-filter"><span>Kích thước</span><span class="icon-control"><i
                                class="fa fa-minus"></i></span></div>
                        <div class="layered-content filter-size s-filter">
                            <ul class="check-box-list clearfix d-flex flex-wrap">
                                <li class="padding">
                                    <input type="checkbox" id="data-size-p1">
                                    <label for="data-size-p1">13.3</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="data-size-p2">
                                    <label for="data-size-p2">14</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="data-size-p1">
                                    <label for="data-size-p1">15.6</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="data-size-p1">
                                    <label for="data-size-p1">22</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="data-size-p1">
                                    <label for="data-size-p1">24</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="data-size-p1">
                                    <label for="data-size-p1">27</label>
                                </li>
                            </ul>
                        </div>
                        </div>

                    </div>

                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="wrap-collection-title row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <h1 class="title" >
                Tất cả sản phẩm
                </h1>
                <div class="alert-no-filter"></div>
            </div>
            <div class="col-md-4 d-sm-none d-md-block d-none d-sm-block" style="float: left">
                <div class="option browse-tags">
                <span class="custom-dropdown custom-dropdown--grey">
                    <form>
                        @csrf
                        <select class="sort-by custom-dropdown__select" id="select_sort">
                            <option value="{{\Illuminate\Support\Facades\Request::url()}}">Lọc theo</option>
                            <option value="{{\Illuminate\Support\Facades\Request::fullUrlWithQuery(['sort_by' => 'tang_dan'])}}">Giá: Tăng dần</option>
                            <option value="{{\Illuminate\Support\Facades\Request::fullUrlWithQuery(['sort_by' => 'giam_dan'])}}">Giá: Giảm dần</option>
                            <option value="{{\Illuminate\Support\Facades\Request::fullUrlWithQuery(['sort_by' => 'a_z'])}}">Tên: A-Z</option>
                            <option value="{{\Illuminate\Support\Facades\Request::fullUrlWithQuery(['sort_by' => 'z_a'])}}">Tên: Z-A</option>
                            <option value="{{\Illuminate\Support\Facades\Request::fullUrlWithQuery(['sort_by' => 'oldest'])}}">Cũ nhất</option>
                            <option value="{{\Illuminate\Support\Facades\Request::fullUrlWithQuery(['sort_by' => 'newest'])}}">Mới nhất</option>
                            <option value="{{\Illuminate\Support\Facades\Request::fullUrlWithQuery(['sort_by' => 'best_sell'])}}">Bán chạy nhất</option>
                        </select>
                    </form>
                </span>
                </div>
            </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                        <div class="product-block">
                            <div class="product-img fade-box">
                                <a href="{{route("client-product-detail",$product->id)}}" title="{{$product->product_name}}" class="img-resize">
                                    <img
                                        src="/uploads/{{$product->image->image1}}"
                                        alt="{{$product->product_name}}" class="lazyloaded">
                                    <img
                                        src="/uploads/{{$product->image->image2}}"
                                        alt="{{$product->product_name}}" class="lazyloaded">
                                </a>
                            </div>
                            <div class="product-detail clearfix">
                                <div class="pro-text">
                                    <a style=" color: black;
                                                            font-size: 14px;text-decoration: none;" href="#"
                                       title="{{$product->product_name}}" inspiration pack>
                                        {{$product->product_name}}
                                    </a>
                                </div>
                                <div class="pro-price">
                                    <p class="">{{number_format($product->product_price)}}₫</p>
                                </div>
                                <div class="pro-price d-flex justify-content-between">
                                    <a class="text-secondary" style=" color: black; font-size: 14px;text-decoration: none;" href="#" title="" inspiration pack>
                                        <span>Đã bán: </span>{{$product->product_sale == null ? 0 : $product->product_sale}}
                                    </a>
                                    <a class="text-secondary" style=" color: black; font-size: 14px;text-decoration: none;" href="#" title="" inspiration pack>
                                        <span>Còn lại: </span>{{$product->quantity - $product->product_sale}}
                                    </a>
                                </div>
                                <div class="pro-start">
                                    <span class="fa fa-star {{ $product->rate >= 0 ? 'checked' : "" }}"></span>
                                    <span class="fa fa-star {{ $product->rate >= 1 ? 'checked' : "" }}"></span>
                                    <span class="fa fa-star {{ $product->rate >= 2 ? 'checked' : "" }}"></span>
                                    <span class="fa fa-star {{ $product->rate >= 3 ? 'checked' : "" }}"></span>
                                    <span class="fa fa-star {{ $product->rate >= 4 ? 'checked' : "" }}"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="sortpagibar pagi clearfix text-center">
            <div id="pagination" class="clearfix d-flex justify-content-center">
{{--                <ul class="pagination">--}}
{{--                    {{ $products->links('pagination::bootstrap-4') }}--}}
{{--                </ul>--}}
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection
