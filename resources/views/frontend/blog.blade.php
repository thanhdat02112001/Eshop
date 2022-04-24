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
                            <span><span style="color: #777777">Tin tức</span></span>
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
                <div class="sidebar-blog">
                    <div class="news-latest">
                        <div class="sidebarblog-title title_block">
                            <h2>Bài viết mới nhất</h2>
                        </div>
                        <div class="list-news-latest layered">
                            @foreach($newBlogs as $newBlog)
                                <div class="item-article clearfix">
                                    <div class="post-image">
                                        <a href="{{route('client-blog-detail', $newBlog->id)}}">
                                            <img style="height: 80px" class="w-100"
                                                 src="/uploads/{{$newBlog->blog_image}}"
                                                 alt="blog"></a>
                                    </div>
                                    <div class="post-content">
                                        <h3>
                                            <a href="{{route('client-blog-detail', $newBlog->id)}}">{{$newBlog->blog_title}}</a>
                                        </h3>
                                        <span class="author">
                                            <a href="#">{{$newBlog->user_name}}</a>
                                        </span>
                                        <span style="font-size: 13px; display: block"
                                              class="date">{{$newBlog->created_at->toDateString()}}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="menu-blog">
                        <div class="group-menu">
                            <div class="sidebarblog-title title_block">
                                <h2>Danh mục blog<span class="fa fa-angle-down"></span></h2>
                            </div>
                            <div class="layered-category">
                                <ul class="menuList-links">
                                    <li class=""><a href="{{route('client-index')}}" title="Trang chủ"><span>Trang chủ</span></a></li>
                                    <li class=""><a href="{{route('client-product-index')}}" title="Bộ sưu tập"><span>Bộ sưu tập</span></a>
                                    </li>
                                    <li class="has-submenu level0 ">
                                        <a title="Sản phẩm" data-toggle="collapse"
                                           href="#collapseExample" role="button" aria-expanded="false"
                                           aria-controls="collapseExample">Hỗ trợ tư vấn <span class="icon-plus-submenu"
                                                                                          data-toggle="collapse"
                                                                                          href="#collapseExample"
                                                                                          role="button"
                                                                                          aria-expanded="false"
                                                                                          aria-controls="collapseExample"></span></a>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body" style="border:0">
                                                <ul class="menu-product">
                                                    <li><a href="{{asset('/contact')}}">Tư vấn thủ công</a></li>
                                                    <li><a href="#" class="get-chat-box">Tư vấn thông minh</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class=""><a href="{{route('client-introduce')}}" title="Giới thiệu"><span>Giới thiệu</span></a>
                                    </li>
                                    <li class="active"><a href="{{route('client-blog-index')}}" title="Blog"><span>Blog</span></a></li>
                                    <li class=""><a href="{{route('client-contact')}}" title="Liên hệ"><span>Liên hệ</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="heading-page clearfix">
                    <h1>Tin tức</h1>
                </div>
                <div class="blog-content">
                    <div class="list-article-content blog-posts">
                        <!-- Begin: Nội dung blog -->
                        @foreach($listBlogs as $blog)
                            <article class="blog-loop">
                                <div class="blog-post row">
                                    <div class="col-md-4 col-xs-12 col-sm-12">
                                        <a href="detailblog.html" class="blog-post-thumbnail"
                                           title="Adidas Falcon nổi bật mùa Hè với phối màu color block" rel="nofollow">
                                            <img style="height: 200px" class="w-100"
                                                 src="/uploads/{{$blog->blog_image}}"
                                                 alt="blog">
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-xs-12 col-sm-12">
                                        <h3 class="blog-post-title">
                                            <a href="#"
                                               title="blog">{{$blog->blog_title}}</a>
                                        </h3>
                                        <div class="blog-post-meta">
                                            <span class="author vcard">Người viết: {{$blog->user_name}}</span>
                                            <span class="date">
                        <time pubdate="" datetime="2019-06-11">{{$blog->created_at->toDateString()}}</time></span>
                                        </div>
                                        <p class="entry-content">{{$blog->blog_content}}...</p>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <div class="sortpagibar pagi clearfix text-center">
                        <div id="pagination" class="clearfix">
                            <ul class="pagination">
                                {{ $listBlogs->links('pagination::bootstrap-4') }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
