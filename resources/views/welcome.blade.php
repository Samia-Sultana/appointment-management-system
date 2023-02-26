@extends('master')
@section('welcome')

<!-- Preloader Start -->
<div class="se-pre-con"></div>
<!-- Preloader Ends -->

<!-- Start Header Top 
    ============================================= -->
<div class="top-bar-area">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-3 logo">
                <a href="index.html">
                    <img src="{{asset('landingPageAssets/img/logo-light.png')}}" class="logo" alt="Logo">
                </a>
            </div>
            <div class="col-lg-9 address-info text-right">
                <div class="info box">
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <div class="info">
                                <span>Email</span> Info@gmail.com
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <div class="info">
                                <span>Phone</span> +123 456 7890
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="flaticon-clock-1"></i>
                            </div>
                            <div class="info">
                                <span>Office Hours</span> Sat - Wed : 8:00 - 4:00
                            </div>
                            <div>
                                @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                   
                                    @else
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                    @endif
                                    @endauth
                                </div>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Top -->

<!-- Header 
    ============================================= -->
<header>
    <div class="container box-nav">
        <div class="row">
            <!-- Start Navigation -->
            <nav id="mainNav" class="navbar logo-less top-less navbar-default navbar-fixed white bootsnav on no-full nav-box no-background">

                <div class="container">
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav contact">
                        <ul>
                            <li>
                                <i class="fas fa-stethoscope"></i>
                                <p>
                                    Emergency <span>0189343843</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <!-- End Atribute Navigation -->

                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="#"><img src="{{asset('landingPageAssets/img/logo.png')}}" class="logo" alt="Logo"></a>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                            <li>
                                <a href="#" data-toggle="dropdown">Home</a>
                            </li>
                            <li>
                                <a href="{{route('takeAppointment')}}">Appointment</a>
                            </li>
                            <li>
                                <a href="#">Schedule</a>
                            </li>
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="#">contact</a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
            <!-- End Navigation -->
            <div class="clearfix"></div>

        </div>
    </div>
</header>
<!-- End Header -->

<!-- Start Banner 
    ============================================= -->
<div class="banner-area">
    <div id="bootcarousel" class="carousel responsive-top-pad-110p text-large slide carousel-fade animate_text" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner carousel-zoom">
            <div class="carousel-item active">
                <div class="slider-thumb bg-cover" style="background-image: url({{ asset('landingPageAssets/img/banner/1.jpg') }});"></div>
                <div class="box-table">
                    <div class="box-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="content">
                                        <h2 data-animation="animated slideInDown">Meet the <strong>Best Doctors</strong></h2>
                                        <p data-animation="animated slideInLeft">
                                            Preference entreaties compliment motionless ye literature. Day behaviour explained law remainder. Produce can cousins account you pasture.
                                        </p>
                                        <a data-animation="animated fadeInUp" class="btn btn-md btn-gradient" href="{{route('takeAppointment')}}">Take Appointment</a>
                                        <a data-animation="animated fadeInDown" class="btn btn-md btn-light effect" href="#">Contact Us <i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="slider-thumb bg-cover" style="background-image: url({{ asset('landingPageAssets/img/banner/5.jpg') }});"></div>
                <div class="box-table">
                    <div class="box-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="content">
                                        <h2 data-animation="animated slideInDown">Safe your <strong>Own Health</strong></h2>
                                        <p data-animation="animated slideInLeft">
                                            Preference entreaties compliment motionless ye literature. Day behaviour explained law remainder. Produce can cousins account you pasture.
                                        </p>
                                        <a data-animation="animated fadeInUp" class="btn btn-md btn-gradient" href="#">Discover More</a>
                                        <a data-animation="animated fadeInDown" class="btn btn-md btn-light effect" href="#">Contact Us <i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Wrapper for slides -->

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#bootcarousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#bootcarousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>

    </div>
</div>
<!-- End Banner -->

<!-- Start Our About
    ============================================= -->
<div class="about-area default-padding" style="padding-bottom: 0px !important;">
    <div class="container">
        <div class="about-items">
            <div class="row">
                <div class="col-lg-8 info">
                    <h5>About Dr. Jones</h5>
                    <p class="text-justify">
                        Nam vehicula malesuada lectus, interdum fringilla nibh. Duis aliquam vitae metus a pharetra. Lorem ipsum dolor sit amet, consectetur adipiscing e
                    </p>
                    <p class="mt-3 text-justify">
                        Nam vehicula malesuada lectus, interdum fringilla nibh. Duis aliquam vitae metus a pharetra. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum augue quis augue ornare, eget faucibus felis pharetra. Proin condimentum et leo quis fringilla.
                    </p>
                    <p class="sign mt-5">
                        <img src="{{asset('landingPageAssets/img/sign.png') }}" class="about-section-sign" alt="">
                    </p>
                    <a class="btn circle btn-md btn-gradient mt-1" href="#">Learn More <i class="fas fa-angle-right"></i></a>
                </div>
                <div class="col-lg-4 thumb-box">
                    <img src="{{asset('landingPageAssets/img/about.png') }}" class="about-section-sign" alt="Thumb">
                </div>



            </div>
        </div>
    </div>
</div>
<!-- End Our About -->




<!-- Star Doctors Area
    ============================================= -->
<div class="doctors-area carousel-shadow inc-carousel default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h4>Schedules</h4>

                </div>
            </div>
        </div>
    </div>
    <div class="container-lg">
        <div class="feature-entry-items text-center">
            <div class="col-lg-12">
                <div class="doctors-carousel owl-carousel owl-item">
                    <?php
                    $schedules = App\Models\Schedule::all();
                    $startDate = \Carbon\Carbon::now()->startOfWeek();
                    $endDate = \Carbon\Carbon::now()->endOfWeek();
                    ?>
                    @for($date = $startDate; $date <= $endDate; $date->addDay())
                        <!-- Single Item -->
                        <div class="item">
                            <i class="flaticon-clock"></i>
                            <h4>{{$date->format('l')}}</h4>
                            <ul>
                                @foreach($schedules as $item)
                                @if($item->day == $date->format('l'))
                                <li>
                                    <?php
                                    $chemberInfo = App\Models\Chember::find($item->chember_id);
                                    ?>
                                    <span> {{$chemberInfo->name}} : </span>
                                    <div class="float-right"> {{$item->start_time}} - {{$item->end_time}} </div>
                                </li>
                                @endif
                                @endforeach

                            </ul>
                        </div>
                        <!-- End Single Item -->
                        @endfor


                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Doctors Area -->




<!-- Star Footer
    ============================================= -->
<footer class="bg-dark text-light">
    <div class="container">
        <div class="f-items default-padding">
            <div class="row">
                <div class="single-item col-lg-4 col-md-6 item">
                    <div class="f-item about">
                        <h4 class="widget-title">About Us</h4>
                        <p>
                            Required honoured trifling eat pleasure man relation. Assurance yet bed was improving furniture man. Distrusts delighted
                        </p>
                        <a class="btn btn-md left-icon btn-gradient" href="#"><i class="fas fa-plus"></i> Blood Bank</a>
                        <div class="social">
                            <h5>Get Us:</h5>
                            <ul>
                                <li class="facebook">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="twitter">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="youtube">
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li class="instagram">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="single-item col-lg-2 col-md-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Department</h4>
                        <ul>
                            <li>
                                <a href="#">Medecine and Health</a>
                            </li>
                            <li>
                                <a href="#">Dental Care</a>
                            </li>
                            <li>
                                <a href="#">Eye Treatment</a>
                            </li>
                            <li>
                                <a href="#">Children Chare</a>
                            </li>
                            <li>
                                <a href="#">Traumatology</a>
                            </li>
                            <li>
                                <a href="#">X-ray</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="single-item col-lg-2 col-md-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Usefull Links</h4>
                        <ul>
                            <li>
                                <a href="#">Ambulance</a>
                            </li>
                            <li>
                                <a href="#">Emergency</a>
                            </li>
                            <li>
                                <a href="#">Blog</a>
                            </li>
                            <li>
                                <a href="#">Project</a>
                            </li>
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="single-item col-lg-4 col-md-6 item">
                    <div class="f-item branches">
                        <h4 class="widget-title">Our branches</h4>
                        <div class="branches">
                            <ul>
                                <li>
                                    <strong>ACMH Hospital:</strong>
                                    <span>4992 Bryan Avenue, Prior Lake, Minnesota <br> Phone: 651-379-4698</span>
                                </li>
                                <li>
                                    <strong>Central Hospital:</strong>
                                    <span>2001 Kia Magentis, Prior Lake, Minnesota <br> Phone: 651-379-4698</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer-->