<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Event-i</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('/img/core-img/favicon.png')}}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('style.css')}}">

</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- /Preloader -->
<!-- Header Area Start -->
<header class="header-area">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="conferNav">

                <!-- Logo -->
                <a class="nav-brand" href="/main"><h1 style="color :white"><strong style="color:#df42b1">E</strong> V E <strong style="color:#df42b1">N</strong> T - i</h1></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">
                    <!-- Menu Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul id="nav">
                            <li class="active"><a href="/main">Home</a></li>
                            <li><a href="#">CATEGORIES</a>
                                <ul class="dropdown">
                                    @if($categories)
                                        @foreach($categories as $category)
                                            <li><a href="/main/category/{{$category->id}}">{{$category->name}}</a></li>

                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li><a href="/about">About us</a></li>

                        @auth
                            <li><a href="/purchase">Purchases </a> </li>

                                <li class="fa fa-cart">
                                    <a href="/cart">
                                    <i style="color: white;"    class="fas fa-shopping-cart fa-2x   "></i>
                                                <span class="badge badge-light">
                                                    {{\Illuminate\Support\Facades\Auth::user()->cart->ticketsInCart()->count()}}
                                                </span>
                                    </a>
                                </li>

                                <a href="{{route('logout')}}" class="btn confer-btn mt-3 mt-lg-0 ml-3 ml-lg-5" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}<i class="zmdi zmdi-long-arrow-right"></i>
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            @else
                        <a href="{{ route('login') }}" class="btn confer-btn mt-3 mt-lg-0 ml-3 ml-lg-5">Login / Register <i class="zmdi zmdi-long-arrow-right"></i></a>
                       @endif
                        </ul>

                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header><!-- Header Area End -->
@section('content')

@show
@section('footer')
<!-- Footer Area Start -->

<footer class="footer-area bg-img bg-overlay-2 section-padding-100-0">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">
                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-60 wow fadeInUp" data-wow-delay="300ms">
                        <!-- Footer Logo -->
                        <a href="/main" class="footer-logo"><img src="{{asset('./img/core-img/logo.png')}}" alt=""></a>
                        <p>To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain.</p>

                        <!-- Social Info -->
                        <div class="social-info">
                            <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                            <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                            <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                            <a href="#"><i class="zmdi zmdi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-60 wow fadeInUp" data-wow-delay="300ms">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Contact</h5>

                        <!-- Contact Area -->
                        <div class="footer-contact-info">
                            <p><i class="zmdi zmdi-map"></i> 184 Main Collins Street</p>
                            <p><i class="zmdi zmdi-phone"></i> (226) 446 9371</p>
                            <p><i class="zmdi zmdi-email"></i> confer@gmail.com</p>
                            <p><i class="zmdi zmdi-globe"></i> www.confer.com</p>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-60 wow fadeInUp" data-wow-delay="300ms">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Workshops</h5>

                        <!-- Footer Nav -->
                        <ul class="footer-nav">
                            <li><a href="#">OSHA Compliance</a></li>
                            <li><a href="#">Microsoft Excel Basics</a></li>
                            <li><a href="#">Forum Speaker Series</a></li>
                            <li><a href="#">Tedx Moscow Conference</a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Copywrite Area -->
</footer>
<!-- Footer Area End -->

<!-- **** All JS Files ***** -->
<!-- jQuery 2.2.4 -->
<!-- **** All JS Files ***** -->
<!-- jQuery 2.2.4 -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Popper -->
<script src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- All Plugins -->
<script src="{{asset('js/confer.bundle.js')}}"></script>
<!-- Active -->
<script src="{{asset('js/default-assets/active.js')}}"></script>
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items:4,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:false
    });
    $('.play').on('click',function(){
        owl.trigger('play.owl.autoplay',[1000])
    })
    $('.stop').on('click',function(){
        owl.trigger('stop.owl.autoplay')
    })

</script>
@show

</body>

</html>
