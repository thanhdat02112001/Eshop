@extends('frontend.master.master')
@section('content')
<section class="bg-success">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 py-3">
                <h5><a href="/" class="text-dark">Trang chủ</a> › Thanh toán</h5>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        @if (session('cart'))
        @php
            $total = 0;
        @endphp
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill badge-danger">{{count(session('cart'))}}</span>
            </h4>
            <ul class="list-group mb-3">
                @foreach (session('cart') as $key => $item)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{$item['name']}}</h6>
                        <small class="text-muted">Quantity: {{$item['quantity']}}</small>
                    </div>
                    <span class="text-muted">{{number_format($item['price'])}} VND</span>
                    </li>
                    @php $total = $total + ($item["quantity"] * $item["price"]) @endphp
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                <span>Total (VND)</span>
                <strong id="totalMoney">{{number_format($total)}} VND</strong>
                </li>
            </ul>

            <form class="card p-2" action="/apply-coupon" method="POST" id="coupon-form">
                @csrf
                <div class="input-group">
                <input type="text" class="form-control" placeholder="nhập voucher" id="coupon">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success">áp dụng</button>
                </div>
                </div>
            </form>
            </div>
            <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate="" method="POST" action="{{route('checkout_store')}}">
                @csrf
                <div class="row">
                <div class="col-md-12 mb-12">
                    <label for="firstName">Name</label>
                    <input type="text" class="form-control" value="{{ $customer ? $customer->name : "" }}" name="name" placeholder="enter your name">
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror

                </div>
                </div>

                <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com" value="{{ $customer ? $customer->email : "" }}" name="email">
                @error('email')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St"  value="{{ $customer ? $customer->address : "" }}" name="address" >
                @error('address')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address">Phone</label>
                    <input type="hidden" name="total" id="total" value="{{$total}}">
                    <input type="text" class="form-control" id="address" placeholder="enter your phone" name="phone" value="{{ $customer ? $customer->phone : "" }}">
                    @error('phone')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Note (optional)</label>
                    <input type="text" class="form-control"  placeholder="take note" name="note" >
                </div>

                <h4 class="mb-3">Payment</h4>

                <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="cod" name="paymentMethod" type="radio" class="custom-control-input" value="cod">
                    <label class="custom-control-label" for="cod">COD</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="vnpay" name="paymentMethod" type="radio" class="custom-control-input" value="vnpay">
                    <label class="custom-control-label" for="vnpay">VNPAY</label>
                </div>
                @error('paymentMethod')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="row">
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </div>
                </div>

            </form>
    </div>
        @else
        <div class="row">
            <div class="col-md-12 mycard py-5 text-center">
                <div class="mycards">
                    <h4>Nothing has been added to cart yet</h4>
                    <a href="" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
