<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php print_r($meta)?>
    <link rel="stylesheet" href="{{asset(('front\assets/css/colors.css'))}}">
    <link rel="stylesheet" href="{{asset(('front\assets/css/plugins.css'))}}">
    <link rel="stylesheet" href="{{asset(('front\assets/css/styles.css'))}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="orange-skin">
<div id="app">
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
        <front-menu></front-menu>
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <router-view name="front-view"></router-view>
        <front-footer></front-footer>


    </div>
</div>
<script>

</script>
<script src="{{asset('front\assets\js\jquery.min.js')}}"></script>
<script src="{{asset('front\assets\js\circleMagic.min.js')}}"></script>
<script src="{{asset('front\assets\js\popper.min.js')}}"></script>
<script src="{{asset('front\assets\js\bootstrap.min.js')}}"></script>
<script src="{{asset('front\assets\js\rangeslider.js')}}"></script>
<script src="{{asset('front\assets\js\select2.min.js')}}"></script>
<script src="{{asset('front\assets\js\aos.js')}}"></script>
<script src="{{asset('front\assets\js\owl.carousel.min.js')}}"></script>
<script src="{{asset('front\assets\js\jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('front\assets\js\slick.js')}}"></script>
<script src="{{asset('front\assets\js\slider-bg.js')}}"></script>
<script src="{{asset('front\assets\js\lightbox.js')}}"></script>
<script src="{{asset('front\assets\js\imagesloaded.js')}}"></script>
<script src="{{asset('front\assets\js\isotope.min.js')}}"></script>
<script src="{{asset('front\assets\js\daterangepicker.js')}}"></script>
<script src="{{asset('front\assets\js\custom.js')}}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- Date Booking Script -->
<script src="{{asset('front\assets\js\moment.min.js')}}"></script>
<script src="{{asset(('js/app.js'))}}"></script>
</body>
</html>





