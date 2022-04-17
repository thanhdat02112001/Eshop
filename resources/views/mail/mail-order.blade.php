<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xác nhận đặt hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <p style="text-align:center">Email xác nhận đơn hàng</p>
            <div class="row">
                <div class="col-md-6">
                    <h4>Eshop</h4>
                </div>
                <div class="col-md-6">
                    <p>Chào bạn: <strong>{{ $shipping['name'] }}</strong></p>
                </div>
                <div class="col-md-12">
                    <p>Bạn đã đặt hàng tại shop với thông tin như sau: </p>
                    <h4>Mã đơn hàng: {{ $shipping['order_id'] }} </h4>
                    <p>Dịch vụ: <strong>Mua hàng trực tuyến</strong></p>
                    <h4>Thông tin người nhận</h4>
                    <p>Email:{{ $shipping['email'] }} </p>
                    <p>Địa chỉ:{{ $shipping['address'] }} </p>
                    <p>Điện thoại:{{ $shipping['phone'] }} </p>
                    <p>Ghi chú:{{ $shipping['note'] }} </p>
                    <p>Hình thức thanh toán:
                        {{$shipping['payment_type']}}
                    </p>
                    <h4>Sản phẩm đã đặt: </h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Gía tiền</th>
                                <th>Số lượng đặt</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0;
                            $subtotal = 0; ?>
                            @foreach ($carts as $cart)
                                <?php $subtotal = $cart['product_quantity'] * $cart['product_price'];
                                $total += $subtotal; ?>
                                <tr>
                                    <td>{{ $cart['product_name'] }}</td>
                                    <td>{{ $cart['product_price'] }}</td>
                                    <td>{{ $cart['product_quantity'] }}</td>
                                    <td>{{ number_format($subtotal) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Tổng tiền: {{ $total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p>Cám ơn quý khách đã đặt hàng, mọi thắc mắc xin liên hệ hotline: 19008888 </p>
            </div>
        </div>
    </div>
</body>

</html>
