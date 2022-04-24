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
            <span><span style="color: #777777">Giới thiệu</span></span>
            </li>
        </ol>
        </div>
    </div>
    </div>
</div>
    <!--List Prodct-->

    <div class="container">

        <div class="row">
        <div class="col-md-3 d-none d-sm-block d-sm-none d-md-block">
            <div class="sidebar-page">
                <div class="group-menu">
                    <div class="page_menu_title title_block">
                    <h2><span>Danh mục trang</span></h2>
                    </div>
                    <div class="layered layered-category">
                        <div class="layered-content">
                            <ul class="menuList-links">
                            <li class=""><a href="{{asset('/')}}" title="Trang chủ"><span>Trang chủ</span></a></li>
                            <li class=""><a href="{{asset('/product')}}" title="Bộ sưu tập"><span>Bộ sưu tập</span></a></li>
                            <li class="has-submenu level0 ">
                                <a title="Sản phẩm" >Hỗ trợ tư vấn <span class="icon-plus-submenu" data-toggle="collapse"
                                    href="#collapseExample" role="button" aria-expanded="false"
                                    aria-controls="collapseExample"></span></a>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body" style="border:0">
                                    <ul class="menu-product">
                                        <li><a href="{{asset('/contact')}}" title="Sản phẩm - Style 1">Tư vấn thủ công</a></li>
                                        <li><a href="#" class="get-chat-box" title="Sản phẩm - Style 2">Tư vấn thông minh</a></li>
                                    </ul>
                                    </div>
                                </div>
                                </li>
                            <li class="active"><a href="{{asset('/introduce')}}" title="Giới thiệu"><span>Giới thiệu</span></a></li>
                            <li class=""><a href="{{asset('/blog')}}" title="Blog"><span>Blog</span></a></li>
                            <li class=""><a href="{{asset('/contact')}}" title="Liên hệ"><span>Liên hệ</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <div class="box_image visible-lg visible-md">
                <div class="banner">
                <a href="">
                    <img src="{{asset('')}}" alt="Runner Inn">
                </a>
                </div>
            </div>
            </div>

        </div>
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="page-wrapper">
            <div class="heading-page">
                <h1>Giới thiệu</h1>
            </div>
            <div class="wrapbox-content-page">
                <div class="content-page ">
                <p>Trang giới thiệu giúp khách hàng hiểu rõ hơn về cửa hàng của bạn. Hãy cung cấp thông tin cụ thể về việc
                    kinh doanh, về cửa hàng, thông tin liên hệ. Điều này sẽ giúp khách hàng cảm thấy tin tưởng khi mua hàng
                    trên website của bạn.</p>
                <p>Một vài gợi ý cho nội dung trang Giới thiệu:</p>
                <div>
                    <ul>
                    <li><span>Bạn là ai</span><br></li>
                    <li><span>Giá trị kinh doanh của bạn là gì</span><br></li>
                    <li><span>Địa chỉ cửa hàng</span><br></li>
                    <li><span>Bạn đã kinh doanh trong ngành hàng này bao lâu rồi</span><br></li>
                    <li><span>Bạn kinh doanh ngành hàng online được bao lâu</span><br></li>
                    <li><span>Đội ngũ của bạn gồm những ai</span><br></li>
                    <li><span>Thông tin liên hệ</span><br></li>
                    <li><span>Liên kết đến các trang mạng xã hội (Twitter, Facebook)</span><br></li>
                    </ul>
                </div>
                <p>Bạn có thể chỉnh sửa hoặc xoá bài viết này tại <a href="" style="color:black"><strong>đây</strong></a>
                    hoặc thêm những bài viết mới trong phần quản lý <a href="" style="color: black"><strong>Trang nội
                        dung</strong></a>.</p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection
