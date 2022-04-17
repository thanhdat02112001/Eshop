@extends('backend/master/master')
@section('title', 'Danh sách bài viết')
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
                <li class="active">Danh sách liên hệ</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách liên hệ</h1>
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
                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>ID</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Nội Dung</th>
                                        <th width='18%'>Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if ($contacts)
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{$contact->id}}</td>
                                                <td>{{$contact->user_name}}</td>
                                                <td>{{$contact->user_email}}</td>
                                                <td>{{$contact->user_phone}}</td>
                                                <td>{{$contact->contact_content}}</td>
                                                <td>
                                                    <a href="{{route('contact-delete', $contact->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true" onclick="return confirm('bạn có chắc chắn xóa không ?');"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <div align='right'>
                                    <ul class="pagination">
                                        {{ $contacts->links('pagination::bootstrap-4') }}
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





