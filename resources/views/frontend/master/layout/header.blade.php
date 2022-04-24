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
            <img src="frontend/images/Logo-01.png" class="logo-top" alt="">
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
                    <a class="nav-link" href="/productDetail">Hỗ trợ tư vấn
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </a>
                    <ul class="sub_menu">
                        <li class="">
                            <a href="detailproduct.html" title="Sản phẩm - Style 1">
                                Tư vấn thủ công
                            </a>
                        </li>
                        <li class="">
                            <a id="get-chat-box" href="#" title="Sản phẩm - Style 2">
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
                                <a class="dropdown-item" href="#" title="Sản phẩm - Style 1">Sản phẩm - Style 1</a>
                                <a class="dropdown-item" href="#" title="Sản phẩm - Style 2">Sản phẩm - Style 2</a>
                                <a class="dropdown-item" href="#" title="Sản phẩm - Style 3">Sản phẩm - Style 3</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="introduce.html">GIỚI THIỆU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog">BLOG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contact.html">LIÊN HỆ</a>
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
                    <button class="btn btn-danger" id="cart">Cart</button></button></span>
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
{{--chatbox--}}
<style>
    ::selection{
        color: #fff;
        background: #007bff;
    }

    ::-webkit-scrollbar{
        width: 3px;
        border-radius: 25px;
    }
    ::-webkit-scrollbar-track{
        background: #f1f1f1;
    }
    ::-webkit-scrollbar-thumb{
        background: #ddd;
    }
    ::-webkit-scrollbar-thumb:hover{
        background: #ccc;
    }

    .wrapper{
        width: 350px;
        background: #fff;
        border-radius: 5px;
        border: 1px solid lightgrey;
        border-top: 0px;
    }
    .wrapper .title{
        background: #007bff;
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        line-height: 60px;
        text-align: center;
        border-bottom: 1px solid #006fe6;
        border-radius: 5px 5px 0 0;
    }
    .wrapper .form{
        padding: 20px 15px;
        min-height: 400px;
        max-height: 400px;
        overflow-y: auto;
    }
    .wrapper .form .inbox{
        width: 100%;
        display: flex;
        align-items: baseline;
    }
    .wrapper .form .user-inbox{
        justify-content: flex-end;
        margin: 13px 0;
    }
    .wrapper .form .inbox .icon{
        height: 40px;
        width: 40px;
        color: #fff;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        font-size: 18px;
        background: #007bff;
    }
    .wrapper .form .inbox .msg-header{
        max-width: 53%;
        margin-left: 10px;
    }
    .form .inbox .msg-header p{
        color: #fff;
        background: #007bff;
        border-radius: 10px;
        padding: 8px 10px;
        font-size: 14px;
        word-break: break-all;
    }
    .form .user-inbox .msg-header p{
        color: #333;
        background: #efefef;
    }
    .wrapper .typing-field{
        display: flex;
        height: 60px;
        width: 100%;
        align-items: center;
        justify-content: space-evenly;
        background: #efefef;
        border-top: 1px solid #d9d9d9;
        border-radius: 0 0 5px 5px;
    }
    .wrapper .typing-field .input-data{
        height: 40px;
        width: 335px;
        position: relative;
    }
    .wrapper .typing-field .input-data input{
        height: 100%;
        width: 100%;
        outline: none;
        border: 1px solid transparent;
        padding: 0 80px 0 15px;
        border-radius: 3px;
        font-size: 15px;
        background: #fff;
        transition: all 0.3s ease;
    }
    .typing-field .input-data input:focus{
        border-color: rgba(0,123,255,0.8);
    }
    .input-data input::placeholder{
        color: #999999;
        transition: all 0.3s ease;
    }
    .input-data input:focus::placeholder{
        color: #bfbfbf;
    }
    .wrapper .typing-field .input-data button{
        position: absolute;
        right: 5px;
        top: 50%;
        height: 30px;
        width: 65px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        outline: none;
        opacity: 0;
        pointer-events: none;
        border-radius: 3px;
        background: #007bff;
        border: 1px solid #007bff;
        transform: translateY(-50%);
        transition: all 0.3s ease;
    }
    .wrapper .typing-field .input-data input:valid ~ button{
        opacity: 1;
        pointer-events: auto;
    }
    .typing-field .input-data button:hover{
        background: #006fef;
    }

    #wrapper-botchat {
        display: none;
        position: fixed;
        bottom: 0;
        right: 0;
        z-index: 999;
    }
</style>
<div class="wrapper" id="wrapper-botchat">
    <div class="title">SITDE botchat</div>
    <div class="form" id="form-chatbox">
        <div class="bot-inbox inbox">
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="msg-header">
                <p>Hello there, how can I help you?</p>
            </div>
        </div>
    </div>
    <div class="typing-field">
        <div class="input-data">
            <input id="data-input" type="text" placeholder="Type something here.." required>
            <button id="send-btn">Send</button>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
    $('#get-chat-box').on('click', function (e) {
        $('#wrapper-botchat').show();
        $('#send-btn').on('click', function () {
            var value = $('#data-input').val()
            let msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ value +'</p></div></div>';
            $("#form-chatbox").append(msg);
            var settings = {
            "url": "http://0.0.0.0:5000/api",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json"
            },
            "data": JSON.stringify({
                "text": value
            }),
            };

            $.ajax(settings).done(function (response) {
            console.log(response.text);
            let replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ response.text +'</p></div></div>';
                $(".form").append(replay);
                $(".form").scrollTop($(".form")[0].scrollHeight);
                $('#data-input').val("");
            });
        });
    });
</script>
