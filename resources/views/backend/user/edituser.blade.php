@extends('backend/master/master')
@section('title', 'chỉnh sửa thành viên')
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Chỉnh sửa Thành viên</h1>
            </div>
        </div>
        <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Chỉnh sửa thành viên</div>
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                                <form action="{{route("user-update", $user->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="{{$user->email}}">
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>password</label>
                                        <input type="password" name="password" class="form-control"}}>
                                        @error('password')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Full name</label>
                                        <input type="full" name="fullname" class="form-control" value="{{$user->name}}">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="address" name="address" class="form-control" value="{{$user->profile->address}}">
                                        @error('address')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="phone" name="phone" class="form-control" value="{{$user->profile->phone}}">
                                        @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Date of Birth</label>
                                        <input type="date" name="birthday" class="form-control" value="{{date("m-d-y", strtotime($user->profile->birthday))}}">
                                        @error('birthday')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" id="" class="form-control" value="{{$user->profile->gender}}">
                                            <option value="0" {{$user->profile->gender == 0 ? 'selected' : ""}} >Male</option>
                                            <option value="1" {{$user->profile->gender == 1 ? 'selected' : ""}} >Female</option>
                                            <option value="2" {{$user->profile->gender == 2 ? 'selected' : ""}} >Other</option>
                                        </select>

                                        @error('gender')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">

                                        <button class="btn btn-success"  type="submit">sửa thành viên</button>
                                        <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                    </div>
                                </div>
                                </form>
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


