@extends('backend/master/master')
@section('title', 'Đơn hàng đã xử lý')
@section('content')
	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Đơn hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách đơn đặt hàng đã xử lý</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{route('order.index')}}" class="btn btn-warning"><span class="glyphicon glyphicon-gift"></span>Đơn Chưa xử lý</a>
                                <a class="btn btn-primary" id="downloadexcel">Export đơn</a>
								<table class="table table-bordered" style="margin-top:20px;" id="realtable">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>Mã đơn hàng</th>
                                            <th>Tên khách hàng</th>
                                            <th>Email</th>
                                            <th>Sđt</th>
                                            <th>Địa chỉ</th>
                                            <th>Thời gian</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td>{{$order->order_code}}</td>
                                            <td>{{$order->delivery->customer_name}}</td>
                                            <td>{{$order->delivery->delivery_email}}</td>
                                            <td>{{$order->delivery->delivery_phone}}</td>
                                            <td>{{$order->delivery->delivery_address}}</td>
                                            <td>{{$order->updated_at}}</td>
                                            <td><a href="{{route('order.detail', $order->id)}}" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i>Xem</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->


	</div>
	<!--end main-->
    <script>
        document.getElementById('downloadexcel').addEventListener('click', function()
    {
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll("#realtable"));
    });
    </script>

@endsection
