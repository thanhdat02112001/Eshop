
<section class="bg-success">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 py-3">
                <h5><a href="/" class="text-dark">Home</a> › Cart</h5>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    @if(session('cart'))
                        @php $total="0" @endphp
                        <div class="shopping-cart">
                            <div class="shopping-cart-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered my-auto  text-center">
                                        <thead>
                                            <tr>
                                                <th class="cart-description">Hình ảnh</th>
                                                <th class="cart-product-name">Tên sản phẩm</th>
                                                <th class="cart-price">Giá</th>
                                                <th class="cart-qty">Số lượng</th>
                                                <th class="cart-total">Tạm tính</th>
                                                <th class="cart-romove"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="my-auto">
                                            @foreach ($cart as $key => $item)
                                            <tr class="cartpage">
                                                <td class="cart-image">
                                                    <a class="entry-thumbnail" href="javascript:void(0)">
                                                        <img src="{{ asset('uploads/'.$item['image']) }}" width="70px" alt="">
                                                    </a>
                                                </td>
                                                <td class="cart-product-name-info">
                                                    <h4 class='cart-product-description'>
                                                        <a href="javascript:void(0)">{{ $item['name'] }}</a>
                                                    </h4>
                                                </td>
                                                <td class="cart-product-sub-total">
                                                    <span class="cart-sub-total-price">{{ number_format($item['price'], 2) }}</span>
                                                </td>
                                                <td class="cart-product-quantity" width="130px">
                                                    <div class="input-group quantity">
                                                        <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer" >
                                                            <span class="input-group-text">-</span>
                                                        </div>
                                                        <input type="hidden" class="product_id" value="{{ $key }}" >
                                                        <input type="text" class="qty-input form-control" maxlength="2" max="10" value="{{ $item['quantity'] }}" >
                                                        <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer" >
                                                            <span class="input-group-text">+</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cart-product-grand-total">
                                                    <span class="cart-grand-total-price">{{ number_format($item['quantity'] * $item['price'], 2) }}</span>
                                                </td>
                                                <td style="font-size: 20px;">
                                                    <form action="/delete" method="post">
                                                        @csrf
                                                        <input type="hidden" class="product_id" name="product_id" value="{{ $key }}" >
                                                        <button type="submit" class="delete_cart_data btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                                    </form>

                                                </td>
                                                @php $total = $total + ($item["quantity"] * $item["price"]) @endphp
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table><!-- /table -->
                                </div>
                            </div><!-- /.shopping-cart-table -->
                            <div class="row">

                                <div class="col-md-8 col-sm-12 estimate-ship-tax d-flex">
                                    <div>
                                        <a href="/" class="btn btn-upper btn-warning outer-left-xs">Tiếp tục mua sắm</a>
                                    </div>
                                    <form action="/clear-all" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger clear_cart" onclick="return confirm('bạn có chắc muốn xóa hết giỏ hàng không?')">xóa giỏ hàng</button>
                                    </form>
                                </div><!-- /.estimate-ship-tax -->

                                <div class="col-md-4 col-sm-12 ">
                                    <div class="cart-shopping-total">

                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="cart-grand-name">Tổng tiền</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="cart-grand-price">
                                                    <span class="cart-grand-price-viewajax">{{ number_format($total, 2) }} VND</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="cart-checkout-btn text-center">

                                                        <a href="{{ route('checkout') }}" class="btn btn-success btn-block checkout-btn">Thanh toán</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.shopping-cart -->

                @else
                    <div class="row">
                        <div class="col-md-12 mycard py-5 text-center">
                            <div class="mycards">
                                <h4>Giỏ hàng của bạn đang trống</h4>
                                <a href="/" class="btn btn-upper btn-success outer-left-xs mt-5">Tiếp tục mua sắm</a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div> <!-- /.row -->
    </div><!-- /.container -->
</section>


