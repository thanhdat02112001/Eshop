@extends('frontend.master.master')
@section('content')
    <!--Banner-->
    <div>
        <div>
            <img src="{{asset('frontend/images/collection_banner.jpg')}}" alt="Products">
        </div>
    </div>
    <div class="breadcrumb-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
                    <ol class="breadcrumb breadcrumb-arrows">
                        <li>
                            <a href="index">
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
    </div
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
                                        <span style="font-size: 13px"
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
                                    <li class=""><a href="{{route('client-index')}}"
                                                    title="Trang chủ"><span>Trang chủ</span></a></li>
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
                                                    <li><a href="detailproduct.html">Tư vấn thủ công</a></li>
                                                    <li><a href="detailproduct.html">Tư vấn thông minh</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class=""><a href="{{route('client-introduce')}}" title="Giới thiệu"><span>Giới thiệu</span></a>
                                    </li>
                                    <li class="active"><a href="{{route('client-blog-index')}}"
                                                          title="Blog"><span>Blog</span></a></li>
                                    <li class=""><a href="{{route('client-contact')}}"
                                                    title="Liên hệ"><span>Liên hệ</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12 article-area">
                <div class="content-page">
                    <div class="article-content">
                        <div class="box-article-heading clearfix">
                            <div class="background-img w-100">
                                <img class="w-100" src="/uploads/{{$blog->blog_image}}" alt="blog">
                            </div>
                            <h1 class="sb-title-article">{{$blog->blog_title}}</h1>
                            <ul class="article-info-more" style="padding-left: 0">
                                <li> Người viết: {{$blog->user_name}} lúc
                                    <time pubdate="" datetime="2019-06-11">{{$blog->created_at->toDateString()}}</time>
                                </li>
                                <li><i class="far fa-file-alt"></i><a style="color:black;text-decoration: none;"
                                                                      href="#"> Tin tức</a></li>
                            </ul>
                        </div>
                        <div class="article-pages">
                            <p>{{$blog->blog_content}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                          action="{{route('client-comment-blog-store', ['id' => $blog->id])}}">
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
                                <button type="submit" class="btn btn-primary center-block">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
