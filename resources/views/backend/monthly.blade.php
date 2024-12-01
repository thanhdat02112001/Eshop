@extends('backend/master/master')
@section('title', 'Trang chủ quản trị')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Tổng quan</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tổng quan</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-9">
            <div class="panel panel-blue panel-widget ">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-4 widget-left">
                        <span class="glyphicon glyphicon-signal icon-50" aria-hidden="true"></span>
                    </div>
                    <div class="col-sm-9 col-lg-8 widget-right">
                        <div class="large">{{number_format($orders->sum('order_total'))}} đ</div>
                        <div class="text-muted">Doanh thu</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-teal panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large">{{count($orders)}}</div>
                        <div class="text-muted">Đơn hàng thành công</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Biểu đồ doanh thu</div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <canvas class="main-chart" id="myChart" height="200" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"
                integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const data = <?= json_encode($data) ?>;
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8',
                        'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
                    ],
                    datasets: [{
                        label: 'Biểu đồ doanh thu bán hàng của các tháng',
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
@endsection
