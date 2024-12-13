@extends('backend/master/master')
@section('title', 'Sửa sản phẩm')
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Sửa sản phẩm</div>
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <form action="{{route("product-update", $product->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select name="category" class="form-control">
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id == $product->category_id ? "selected" : ""}}>{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mã sản phẩm</label>
                                        <input type="text" name="code" class="form-control" value="{{$product->product_code}}">
                                        @error('code')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" name="name" class="form-control" value="{{$product->product_name}}">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input type="number" name="price" class="form-control" value="{{$product->product_price}}">
                                        @error('price')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nhãn hiệu</label>
                                        <input type="text" name="brand" class="form-control" value="{{$product->product_brand}}">
                                        @error('brand')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>số lượng</label>
                                        <input type="text" name="quantity" class="form-control" value="{{$product->quantity}}">
                                        @error('quantity')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="state" class="form-control">
                                            <option value="1" {{$product->product_status == 1 ? "selected" : ""}}>Còn hàng</option>
                                            <option value="0" {{$product->product_status == 0 ? "selected" : ""}}>Hết hàng</option>
                                        </select>
                                        @error('state')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                        <input id="img" type="file" name="image[]" class="form-control hidden" multiple
                                            onchange="changeImg(this)">
                                        <img id="avatar" class="thumbnail" width="100%" height="350px" src="{{Storage::disk('public')->url(@$product->image->image1)}}">
                                    </div>
                                    @error('image[]')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="editor" name="description" style="width: 100%;height: 100px;" >{{$product->product_description}}</textarea>
                                    </div>
                                    <button class="btn btn-success" name="add-product" type="submit">Sửa sản phẩm</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                                @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                            </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
                </div>

            </div>
        </div>

        <!--/.row-->
    </div>


@endsection
