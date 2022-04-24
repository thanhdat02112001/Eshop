<div class="header">
    <a style="color: #ffffff;text-decoration: none;" href="index.html"><marquee>MIỄN PHÍ VẬN CHUYỂN VỚI ĐƠN HÀNG NỘI THÀNH > 300K - ĐỔI TRẢ TRONG 30 NGÀY - ĐẢM BẢO CHẤT LƯỢNG</marquee></a>
</div>
<!--Navbar-->
@php
    header("Access-Control-Allow-Origin: *")
@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{asset('frontend/images/Logo-01.png')}}" class="logo-top" alt="">
        </a>
        <div class="desk-menu collapse navbar-collapse justify-content-md-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">TRANG CHỦ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product">BỘ SƯU TẬP</a>
                </li>
                <li class="nav-item lisanpham">
                    <a class="nav-link" href="#">Hỗ trợ tư vấn
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </a>
                    <ul class="sub_menu">
                        <li class="">
                            <a href="{{asset('/contact')}}" title="Sản phẩm - Style 1">
                                Tư vấn thủ công
                            </a>
                        </li>
                        <li class="">
                            <a class="get-chat-box" href="#" title="Sản phẩm - Style 2">
                                Tư vấn thông minh
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/introduce">GIỚI THIỆU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog">BLOG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">LIÊN HỆ</a>
                </li>
            </ul>
        </div>
        <div id="offcanvas-flip1" uk-offcanvas="flip: true; overlay: true">
            <div class="uk-offcanvas-bar" style="background: white;
        width: 100%;">

                <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>
                <h3 style="font-size: 14px;
        color: #272727;
        text-transform: uppercase;
        margin: 3px 0 30px 0;
        font-weight: 500; letter-spacing: 2px;">MENU</h3>
                <div class="justify-content-md-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">TRANG CHỦ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">BỘ SƯU TẬP</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle aaaa"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" >
                                <p>Hỗ trợ tư vấn</p>
                                <i class="fa fa-angle-double-right"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="border:0;">
                                <a class="dropdown-item" href="{{asset('contact')}}" title="Sản phẩm - Style 2">Tư vấn thủ công</a>
                                <a class="dropdown-item" href="#" class="get-chat-box" title="Sản phẩm - Style 3">Tư vấn thông minh</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('/introduce')}}">GIỚI THIỆU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('/blog')}}">BLOG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('/contact')}}">LIÊN HỆ</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
            <div class="uk-offcanvas-bar" style="    background: white;
            width: 350px;">

                <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>

                <h3 style="font-size: 14px;
                color: #272727;
                text-transform: uppercase;
                margin: 3px 0 30px 0;
                font-weight: 500; letter-spacing: 2px;">Tìm kiếm</h3>
                <div class="search-box wpo-wrapper-search">
                    <form action="search" class="searchform searchform-categoris ultimate-search">
                        <div class="wpo-search-inner" style="display:inline">
                            <input type="hidden" name="type" value="product">
                            <input required="" id="inputSearchAuto" name="q" maxlength="40" autocomplete="off"
                                   class="searchinput input-search search-input" type="text" size="20"
                                   placeholder="Tìm kiếm sản phẩm...">
                        </div>
                        <button type="submit" class="btn-search btn" id="search-header-btn">
                            <i style="font-weight:bold" class="fas fa-search"></i>
                        </button>
                    </form>
                    <div>
                        <table id="searchResults">
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="icon-ol">
            @if (!Auth::guard('customers')->user())
            <a style="color: #272727" href="/customer/login">
                <i class="fas fa-user-alt"></i>
            </a>
            @else
            <a href="/customer/logout" style="color: #272727">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
            @endif
            <a href="#" class="" uk-toggle="target: #offcanvas-flip">
                <i class="fas fa-search" style="color: black"></i>
            </a>
            <a href="/cart">
                <span class="">
                    <button class="btn btn-danger" id="cart">Cart</button></span>
                </span>
            </a>
            <button class="navbar-toggler" type="button" uk-toggle="target: #offcanvas-flip1" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
    </div>
</nav>