@extends('backend/master/master')
@section('title', 'Thêm sản phẩm')
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm bài viết</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Thêm bài viết</div>
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <form action="{{route("blog-store")}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-8">
                                    <div style="display: flex; flex-direction: column" class="form-group">
                                        <label>Tiêu đề</label>
                                        <textarea style="height: 80px;" class="w-100" placeholder="Nhập tiêu đề" name="title"></textarea>
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div style="display: flex; flex-direction: column" class="form-group">
                                        <label>Nội dung</label>
                                        <textarea style="height: 240px;" class="w-100 h-50" placeholder="Nhập nội dung" name="description"></textarea>
                                        @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ảnh bài viết</label>
                                        <input id="img" type="file" name="image" class="form-control hidden" multiple
                                               onchange="changeImg(this)">
                                        <img id="avatar" class="thumbnail" width="100%" height="350px"
                                             src="img/import-img.png">
                                    </div>
                                    @error('image')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-success" type="submit">Thêm bài viết</button>
                                        <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--/.row-->
            </div>
@endsection
