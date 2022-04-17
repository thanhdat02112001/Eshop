@extends('backend.master.master')
@section('title', 'Danh mục')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Danh mục</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Chỉnh sửa danh mục</h1>
		</div>
	</div>
	<!--/.row-->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-5">
                            <form action="{{route("category-update",$category->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="categories[id]" value="{{$category->id}}">
                                <div class="form-group">
                                    <label for="">Tên Danh mục</label>
                                    <input type="text" class="form-control" name="name" id="" placeholder="Tên danh mục mới" value="{{$category->category_name}}">
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Miêu tả</label>
                                    <input type="text" class="form-control" name="description" id="" placeholder="Miêu tả" value="{{$category->category_description}}">
                                    @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="alert bg-danger" role="alert" style="display: <?php echo session("error") ? "": "none" ?>">
                                    <svg class="glyph stroked cancel">
                                        <use xlink:href="#stroked-cancel"></use>
                                    </svg>Đã xảy ra lỗi!<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                                </div>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
						</div>
						<div class="col-md-7">
							<div class="alert bg-success" role="alert" style="display: <?php echo session('success') ? "" : "none" ?>">
								<svg class="glyph stroked checkmark">
									<use xlink:href="#stroked-checkmark"></use>
								</svg> Cập nhật danh mục thành công! <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
							</div>
							<div class="vertical-menu">
								<div class="item-menu active">Danh mục khác</div>
                                @foreach ($categories as $category)
                                    <div class="item-menu"><span>{{$category->category_name}}</span>
                                        <div class="category-fix">
                                            <a class="btn-category btn-primary" href="{{route("category-edit", $category->id)}}"><i class="fa fa-edit"></i></a>
                                            <a class="btn-category btn-danger" href="{{route("category-delete", $category->id)}}"><i class="fas fa-times"></i></i></a>
                                        </div>
                                    </div>
                                @endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.col-->
	</div>
	<!--/.row-->
</div>
@endsection

