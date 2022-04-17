<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
    </form>
    <ul class="nav menu">
        <li class="{{request()->segment(2) == '' ? 'active' : ''}}"><a href="{{asset('/admin')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Tổng quan</a></li>
        <li role="presentation" class="divider"></li>
        <li class="{{request()->segment(2) == 'category' ? 'active' : ''}}"><a href="{{asset('/admin/category')}}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper" /></svg> Danh Mục</a></li>
        <li class="{{request()->segment(2) == 'product' ? 'active' : ''}}"><a href="{{asset('/admin/product')}}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Sản phẩm</a></li>
        <li class="{{request()->segment(2) == 'order' ? 'active' : ''}}"><a href="{{asset('/admin/order')}}"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad" /></svg> Đơn hàng</a></li>
        <li role="presentation" class="divider"></li>
        <li class="{{request()->segment(2) == 'blog' ? 'active' : ''}}"><a href="{{asset('/admin/blog')}}"><svg class="glyph stroked pen tip"><use xlink:href="#stroked-pen-tip"/></svg>Tin tức</a></li>
        <li class="{{request()->segment(2) == 'contact' ? 'active' : ''}}"><a href="{{asset('/admin/contact')}}"><svg class="glyph stroked open letter"><use xlink:href="#stroked-open-letter"/></svg>Liên hệ</a></li>
        <li class="{{request()->segment(2) == 'comment' ? 'active' : ''}}"><a href="{{asset('/admin/comment')}}"><svg class="glyph stroked empty message"><use xlink:href="#stroked-empty-message"/></svg>Bình luận</a></li>
        <li role="presentation" class="divider"></li>
        <li class="{{request()->segment(2) == 'user' ? 'active' : ''}}"><a href="{{asset('/admin/user')}}"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Quản lý thành viên</a></li>

    </ul>

</div>
