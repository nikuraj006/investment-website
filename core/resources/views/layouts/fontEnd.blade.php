<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $site_title }} | {{ $page_title }}</title>
    <!--Favicon add-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <!--bootstrap Css-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--font-awesome Css-->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <!--owl.carousel Css-->
    <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
    <!--Slick Nav Css-->
    <link href="{{ asset('assets/css/slicknav.min.css') }}" rel="stylesheet">
    <!-- rangeslider Css-->
    <link href="{{ asset('assets/css/asRange.css') }}" rel="stylesheet">
    <!--Style Css-->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!--Responsive Css-->
    <link href="{{ asset('assets/css/color.php?color='.$basic->color) }}" rel="stylesheet">
    <!--Responsive Css-->

    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

    @yield('style')

</head>
<body >
<!--Preloader start-->
<div class="preloader">
    <div class="spinner">
        <div class="cube1"></div>
        <div class="cube2"></div>
    </div>
</div>
<!--Preloader end-->
<div class="site"><!--for boxed Layout start-->

    <!--Scroll to top start-->
    <div class="scroll-to-top">
        <a href=""><i class="fa fa-caret-up"></i></a>
    </div><!--Scroll to top end-->
    <!--mobile logo -->
    <div class="mobile-logo">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="Logo"></a>
    </div>

    <!--main menu start-->
    <nav class="main-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="60px"></a>
                    </div>
                </div>
                <div class="col-md-10 text-right">
                    <ul id="menu-bar">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        @foreach($menu as $m)
                            <li><a href="{{ url('menu') }}/{{ $m->id }}/{{ urldecode(strtolower(str_slug($m->name))) }}">{{ $m->name }}</a></li>
                        @endforeach
                        <li><a href="{{ route('faqs') }}">Faq</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        @if(Auth::check())
                            <li><a href="#">Hi. {{ Auth::user()->name }} <i class="fa fa-caret-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('user-dashboard') }}">Dashboard</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="">Log Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li><a href="#">Account <i class="fa fa-caret-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav><!--main menu end-->

    <!--Support Bar Start-->
    <div class="support-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 support-wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="support-info">
                                <a href="{{ route('support-open') }}"><p><i class="fa fa-comment"></i> Get Support</p></a>
                                <p><i class="fa fa-calendar"></i> Days Online: {{ \Carbon\Carbon::parse($basic->start_date)->diffInDays() }} </p>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="support-info">
                                <p><i class="fa fa-phone"></i> {{ $basic->phone }}</p>
                                <a href="#"><p><i class="fa fa-envelope"></i> {{ $basic->email }}</p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--Support Bar End-->


@yield('content')


<!--pament method section start-->
    <section class="section-padding payment-method">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>payment method we accept</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($pay as $key => $p)
                    <div class="col-md-2 {{ $key==0? 'col-md-offset-2' : '' }} col-sm-6">
                        <div class="payment-logo">
                            <img style="width: 190px" src="{{ asset('assets/images') }}/{{ $p->image }}"  alt="Payment Method Logo">
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section><!--pament method section end-->
<!--footer section start-->
    <footer class="footer-section section-padding padding-bottom-0 text-center">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 col-md-offset-2">
                    <div class="footer-logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="Footer Logo"></a>
                    </div>
                    <p class="footer-text">{{ $basic->footer_text }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="footer-social-link">
                        <h3>Follow Us on</h3>
                        <div class="social-link">
                            @foreach($social as $s)
                                <a href="{{ $s->link }}">{!!  $s->code  !!}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <p>{!! $basic->copy_text !!}</p>
        </div>
    </footer><!--footer section end-->
</div><!--for boxed Layout end-->
<!--jquery script load-->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<!--Owl carousel script load-->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!--Bootstrap v3 script load here-->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!--Slick Nav Js File Load-->
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<!-- rangeslider Js File Load-->
<script src="{{ asset('assets/js/jquery-asRange.min.js') }}"></script>
<!--Main js file load-->
<script src="{{ asset('assets/js/main.js') }}"></script>
@yield('script')
</body>
</html>
