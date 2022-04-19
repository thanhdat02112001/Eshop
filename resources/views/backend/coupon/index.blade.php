@extends('backend.master.master')
@section('title', 'Giảm giá')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg>
                </a></li>
            <li class="active">Giảm giá</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách vouchers</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">

                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            @if (session('success'))
                            <div class="alert bg-success" role="alert">
                                <svg class="glyph stroked checkmark">
                                    <use xlink:href="#stroked-checkmark"></use>
                                </svg>
                                {{session('success')}}<a href="#" class="pull-right"><span
                                        class="glyphicon glyphicon-remove"></span></a>
                            </div>
                            @endif
                            <a href="{{route('coupon.create')}}" class="btn btn-primary">Thêm voucher</a>
                            <table class="table table-bordered" style="margin-top:20px;">

                                <thead>
                                <tr class="bg-primary">
                                    <th>ID</th>
                                    <th>Mã giảm giá</th>
                                    <th>Giảm giá</th>
                                    <th>Còn lại</th>
                                    <th width='18%'>Tùy chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if ($coupons)
                                        @foreach ($coupons as $coupon)
                                        <tr>
                                            <td>{{$coupon->id}}</td>
                                            <td>
                                                <p><strong>{{$coupon->code}}</strong></p>
                                            </td>
                                            <td>{{$coupon->discount}} %</td>
                                            <td>{{$coupon->quantity - $coupon->used}}</td>
                                            <td>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-inline">
                                                        <a href="{{route('coupon.edit', $coupon->id)}}" class="btn btn-warning"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i> Sửa</a>
                                                    </div>
                                                    <div class="d-inline">
                                                        <form action="{{route('coupon.destroy', $coupon->id)}}" class="form-inline" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"
                                                                aria-hidden="true" onclick="return confirm('bạn có chắc chắn xóa không ?');"></i> Xóa</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div align='right'>
                                    <ul class="pagination">
                                        {{ $coupons->links('pagination::bootstrap-4') }}
                                    </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            <!--/.row-->
        </div>
        <!--end main-->
@endsection
