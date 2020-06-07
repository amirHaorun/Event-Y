@extends('home.templat')
@section('content')
<!-- Breadcrumb Area Start -->
<section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(img/bg-img/27.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2 class="page-title">About Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/main">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->

<!-- What We offer Area Start -->
<section class="what-we-offer-area section-padding-100-70">
    <div class="container">
        <div class="row">
            <!-- Heading -->
            <div class="col-12">
                <div class="section-heading-3 text-center wow fadeInUp" data-wow-delay="300ms">
                    <p>About Us</p>
                    <h4>{{$about->header}}</h4>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Single We Offer Area -->
            <div class="col-12 col-md-12 ">
                <div style="width: auto;background-color: white" class="single-we-offer-content text-center wow fadeInUp" data-wow-delay="0.3s">

                    <p style="color: black">{{$about->content}}</p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- What We offer Area End -->

@endsection

