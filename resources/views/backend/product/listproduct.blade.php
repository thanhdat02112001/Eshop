@extends('backend/master/master')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg>
                    </a></li>
                <li class="active">Danh sách sản phẩm</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách sản phẩm</h1>
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
                                <a href="{{route('product-create')}}" class="btn btn-primary">Thêm sản phẩm</a>
                                <table class="table table-bordered" style="margin-top:20px;">

                                    <thead>
                                    <tr class="bg-primary">
                                        <th>ID</th>
                                        <th>Thông tin sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Tình trạng</th>
                                        <th>Danh mục</th>
                                        <th>Còn lại</th>
                                        <th width='18%'>Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if ($products)
                                            @foreach ($products as $product)
                                            <tr>
                                                <td>{{$product->id}}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-3"><img src="/uploads/{{@$product->image->image1}}" alt="No image"
                                                                                    width="100px" class="thumbnail"></div>
                                                        <div class="col-md-9">
                                                            <p><strong>Mã sản phẩm: {{$product->product_code}}</strong></p>
                                                            <p>Tên sản phẩm: {{$product->product_name}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{number_format($product->product_price)}} VND</td>
                                                <td>
                                                    @if ($product->product_status == 1)
                                                    <a class="btn btn-success" href="#" role="button">Còn hàng</a>
                                                    @else
                                                    <a class="btn btn-danger" href="#" role="button">Hết hàng</a>
                                                    @endif
                                                </td>
                                                <td>{{$product->category->category_name}}</td>
                                                <td>{{$product->quantity - $product->product_sale}}</td>
                                                <td>
                                                    <a href="{{route('product-edit', $product->id)}}" class="btn btn-warning"><i class="fa fa-pencil"
                                                                                        aria-hidden="true"></i> Sửa</a>
                                                    <a href="{{route('product-delete', $product->id)}}" class="btn btn-danger"><i class="fa fa-trash"
                                                                                        aria-hidden="true" onclick="return confirm('bạn có chắc chắn xóa không ?');"></i> Xóa</a>
                                                    <a href="{{route('print-barcode', $product->id)}}" class="btn btn-success"><i class="fa fa-print"
                                                        aria-hidden="true"></i> Print</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div align='right'>
                                        <ul class="pagination">
                                            {{ $products->links('pagination::bootstrap-4') }}
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





