@extends('home.templat')
@section('content')

<!-- What We offer Area Start -->
<section style="padding-top: 220px" class="what-we-offer-area section-padding-100-70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($events->first())
            <h1 class="text-center" style="padding-bottom: 20px">Events in {{$events->first()->category->name}} </h1>
                @else
                    <h1 class="text-center" style="padding-bottom: 20px">No Event in This Category At Current Time</h1>
                @endif
             </div>
            <!-- Heading -->
                @foreach($events as $single_event)

            <div class="col-4">

                <div class="single-speaker-area  wow fadeInUp" data-wow-delay="300ms">
                    <!-- Thumb -->
                    <div class="speaker-single-thumb">
                        <img  src="{{  $single_event->getPhoto()   }}" alt="">
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
                                @foreach($single_event->shows as $show)
                                    <p style="font-size:20px;font-family:Poppins, sans-serif;letter-spacing: 5px ; text-align:center; background-color: black;color: #df42b1;padding-top: 5px;padding-bottom: 5px">
                                        {{\Carbon\Carbon::createFromFormat('Y-m-d',$show->day)->format(' F  d')}}
                                    </p>
                                    <br>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<!-- What We offer Area End -->
@endsection
