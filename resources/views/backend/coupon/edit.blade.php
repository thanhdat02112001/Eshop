@extends('backend/master/master')
@section('title', 'Thêm sản phẩm')
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh sửa voucher</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Chỉnh sửa voucher</div>
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <form action="{{route("coupon.update", $coupon->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{$coupon->id}}">
                                        <label>Mã giảm giá</label>
                                        <input type="text" name="code" class="form-control" value="{{$coupon->code}}">
                                        @error('code')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Giảm giá(%)</label>
                                        <input type="text" name="discount" class="form-control" placeholder="%" value="{{$coupon->discount}}">
                                        @error('discount')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Số lượng</label>
                                        <input type="number" name="quantity" class="form-control" value="{{$coupon->quantity}}">
                                        @error('quantity')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success">cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--/.row-->
            </div>
@endsection
