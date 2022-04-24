@extends('backend/master/master')
@section('title', 'Chi tiết đơn hàng')
@section('content')
	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Đơn hàng / Chi tiết đặt hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Chi tiết đặt hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<div class="panel panel-blue">
												<div class="panel-heading dark-overlay">Thông tin khách hàng</div>
												<div class="panel-body">
													<strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> : {{$order->delivery->customer_name}}</strong> <br>
													<strong><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> : Số điện thoại:{{$order->delivery->delivery_phone}}</strong>
													<br>
													<strong><span class="glyphicon glyphicon-send" aria-hidden="true"></span> : {{$order->delivery->delivery_address}}</strong> <br>
                                                    <strong><span class="glyphicon glyphicon-list-alt   " aria-hidden="true"></span> : {{$order->order_code}}</strong>
												</div>
											</div>
										</div>
									</div>


								</div>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Thông tin Sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th>Thành tiền</th>

										</tr>
									</thead>
									<tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($order->orderDetails as $item)
                                        <tr>
											<td>{{$item->id}}</td>
											<td>
												<div class="row">
													<div class="col-md-12">
														<p><b>Tên Sản phẩm</b>: {{$item->product_name}}</p>
														<p><b>Số lương</b> : {{$item->product_quantity}}</p>
													</div>
												</div>
											</td>
											<td>{{number_format($item->product_price)}} VNĐ</td>
											<td>{{number_format($item->product_price * $item->product_quantity)}} VNĐ</td>
										</tr>
                                        @php
                                            $total += $item->product_price * $item->product_quantity
                                        @endphp
                                        @endforeach
									</tbody>

								</table>
								<table class="table">
									<thead>
										<tr>
											<th width='70%'>
												<h4 align='right'>Tổng Tiền :</h4>
											</th>
											<th>
												<h4 align='right' style="color: brown;">{{number_format($total)}} VNĐ</h4>
											</th>

										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
                                @if ($order->order_status == 0)
                                <div class="alert alert-primary" role="alert" align='right'>
                                    <form action="{{route('order.update', $order->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" id="" class="btn btn-success"  role="button">Đã xử lý</button>
                                    </form>
                                    <form action="{{route('order.destroy', $order->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Hủy</button>
                                    </form>
								</div>
                                @else
                                @if ($order->order_status == 1)
                                    <div class="alert alert-primary" align="right">
                                        <button class="btn btn-success">Thành công</button>
                                    </div>
                                @else
                                    <div class="alert alert-primary" align="right">
                                        <button class="btn btn-danger">Đã hủy</button>
                                    </div>
                                @endif
                                @endif
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
@endsection
