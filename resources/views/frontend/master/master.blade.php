<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend/master/layout/head')
</head>

<body>
@include('frontend/master/layout/header')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('success')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{session('error')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@yield('content')
<!--gallery-->
@include('frontend/master/layout/banner_bottom')
@include('frontend/master/layout/footer')
</div>
@include('frontend/master/layout/popup')
<script async defer crossorigin="anonymous" src="{{asset("frontend/plugins/sdk.js")}}"></script>
<script src="{{asset("frontend/plugins/jquery-3.4.1/jquery-3.4.1.min.js")}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset("frontend/plugins/bootstrap/popper.min.js")}}"></script>
<script src="{{asset("frontend/plugins/bootstrap/bootstrap.min.js")}}"></script>
<script src="{{asset("frontend/plugins/owl.carousel/owl.carousel.min.js")}}"></script>
<script src="{{asset("frontend/js/home.js")}}"></script>
<script src="{{asset("frontend/js/script.js")}}"></script>
<script src="{{asset("frontend/plugins/uikit/uikit.min.js")}}"></script>
<script src="{{asset("frontend/plugins/uikit/uikit-icons.min.js")}}"></script>
<script src="{{asset("frontend/js/cart.js")}}"></script>
<script src="{{asset("frontend/js/coupon.js")}}"></script>
<script src="{{asset("frontedn/js/productdetail.js")}}"></script>
<script src="{{asset("frontend/js/search.js")}}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#select_sort').on('change', function () {
            var url = $(this).val();
            if (url) {
                window.location= url;
            }
            return false;
        });
        $('#select_sort').on('change', function () {
            var url = $(this).val();
            if (url) {
                window.location= url;
            }
            return false;
        });

        $('#radio-price-form').on('change', function () {
            var price_radio = $('input[type="radio"][name="price-radio"]:checked').val();
            if (url) {
                window.location= url;
            }
        });
</script>
</html>
