<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- ========== Page Title ========== -->
   <title>Clinicom - Medical & Health Template</title>

<!-- ========== Favicon Icon ========== -->
<link rel="shortcut icon" href="{{asset('landingPageAssets/img/favicon.png')}}" type="image/x-icon">

<!-- ========== Start Stylesheet ========== -->
<link href="{{asset('landingPageAssets/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('landingPageAssets/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{asset('landingPageAssets/css/themify-icons.css')}}" rel="stylesheet">
<link href="{{asset('landingPageAssets/css/flaticon-set.css')}}" rel="stylesheet">
<link href="{{asset('landingPageAssets/css/magnific-popup.css')}}" rel="stylesheet">
<link href="{{asset('landingPageAssets/css/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{asset('landingPageAssets/css/owl.theme.default.min.css')}}" rel="stylesheet">
<link href="{{asset('landingPageAssets/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('landingPageAssets/css/bootsnav.css')}}" rel="stylesheet">
<link href="{{asset('landingPageAssets/style.css') }}" rel="stylesheet"> 
<link href="{{asset('landingPageAssets/css/responsive.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('landingPageAssets/css/custom.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="{{asset('assets/plugins/owlcarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/owlcarousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>


<!-- ========== End Stylesheet ========== -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="assets/js/html5/html5shiv.min.js"></script>
  <script src="assets/js/html5/respond.min.js"></script>
<![endif]-->

<!-- ========== Google Fonts ========== -->
<link href="../css2?family=Inter:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">



    </head>

<body>

@yield('welcome')
@yield('takeAppointment')




    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{ asset('landingPageAssets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/popper.min.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/equal-height.min.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/modernizr.custom.13711.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/wow.min.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/progress-bar.min.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/count-to.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/YTPlayer.min.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/circle-progress.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/bootsnav.js') }}"></script>
    <script src="{{ asset('landingPageAssets/js/main.js') }}"></script>


<script src="{{asset('assets/js/feather.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js02"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

<script src="{{asset('assets/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/plugins/sweetalert/sweetalerts.min.js')}}"></script>

<script src="{{asset('assets/js/script.js')}}"></script>



    

</body>
</html>