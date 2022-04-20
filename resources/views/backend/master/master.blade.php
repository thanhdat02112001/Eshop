<!DOCTYPE html>
<html>

<head>
    @include('backend/master/layout/head')

</head>
<body>
<!-- header -->
@include('backend/master/layout/header')
<!-- header -->
<!-- sidebar left-->
@include('backend/master/layout/sidebar')
<!--/. end sidebar left-->

<!--main-->
@yield('content')
<!--end main-->

<!-- javascript -->
<script src="{{asset('backend/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/js/chart.min.js')}}"></script>
<script src="{{asset('backend/js/chart-data.js')}}"></script>
<script src="{{asset('backend/js/close-popup.js')}}"></script>
<script>
    function changeImg(input){
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if(input.files && input.files[0]){
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function(e){
                //Thay đổi đường dẫn ảnh
                $('#avatar').attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#avatar').click(function(){
            $('#img').click();
        });
    });

</script>
</body>

</html>
