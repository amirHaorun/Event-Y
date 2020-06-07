@extends('home.templat')
@section('content')


<section class="welcome-area">
    <div class="welcome-slides owl-carousel">
        <!-- Single Slide -->
        @foreach($events as $event)
        <div class="single-welcome-slide bg-img bg-overlay jarallax" style="background-image: url('{{ $event->getPhoto()}}');">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Welcome Text -->
                    <div class="col-12">
                        <div class="welcome-text text-right">
                            <h2 data-animation="fadeInUp" data-delay="300ms">{{$event->name}} <br></h2>
                            <h6 data-animation="fadeInUp" data-delay="500ms">{{$event->venue}}</h6>
                            <div class="hero-btn-group" data-animation="fadeInUp" data-delay="700ms">
                                <a href="/main/{{$event->id}}" class="btn confer-btn">More Information <i class="zmdi zmdi-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Single Slide -->

    </div>

    <!-- Scroll Icon -->
    <div class="icon-scroll" id="scrollDown"></div>
</section>
<!-- Welcome Area End -->

<!-- Our Speakings Area Start -->
<section class="our-speaker-area section-padding-100-60 " style="background-color:#151853;padding-top:50px">
    <div class="container">
        @foreach($categories as $category)
            @if(!$events->where('categ_id',$category->id)->isEmpty())


            <div class="row">
                <!-- Heading -->
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="300ms">
                        <h4 style="letter-spacing: 5px">{{$category->name}}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="events-carousel" class="owl-carousel text-center ">

                @foreach($events->where('categ_id',$category->id) as $single_event)

                <!-- Single Speaker Area -->
                    <div class="single-speaker-area  wow fadeInUp" data-wow-delay="300ms">
                        <!-- Thumb -->
                        <div class="speaker-single-thumb">
                            <a href="/main/{{$single_event->id}}">
                            <img style="width: 280px;height: 154.8px" src="{{$single_event->getPhoto()}}" alt="">
                            </a>
                        </div>
                        <!-- Social Info -->
                        <div class="social-info">
                            <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                            <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                            <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                            <a href="#"><i class="zmdi zmdi-linkedin"></i></a>
                        </div>
                        <!-- Info -->
                        <div class="row">
                            <div class="col-md-12">
                                <div  style="position: initial" class="speaker-info bg-img bg-gradient-overlay">
                                    <a href="/main/{{$single_event->id}}">
                                        <h5 style="text-align: center;text-transform: uppercase;font-size: 25px;padding-top: 5px">{{$single_event->name}}</h5>

                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>

                @endforeach

                </div>
                <div class="col-12">

                    <div class="more-speaker-btn text-center mt-20 mb-40 wow fadeInUp" data-wow-delay="300ms">
                        <a class="btn confer-btn-white" href="{{route('category.events',$category->id)}}">view all Events <i class="zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                </div>

            </div>
            @else
            @endif
        @endforeach
    </div>
</section>

<!-- Our Speakings Area End -->

@endsection
