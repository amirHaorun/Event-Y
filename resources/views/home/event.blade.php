@extends("home.templat")

@section('content')
<section style="padding-top: 220px" class="what-we-offer-area section-padding-100-70">
    <div class="container">
        <div class="row">
            <!-- Heading -->
            <div class="col-12">
                <div class="section-heading-3 text-center wow fadeInUp" data-wow-delay="300ms">
                    <p>{{$event->category->name}}</p>
                    <h4>{{$event->name}}</h4>
                    <h6 class="text-center" style="padding-top:20px">{{$event->descrip}}</h6>
                </div>
            </div>
        </div>
        @foreach (['success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
        <div class="row">
        @foreach($event->shows as $show)
            <!-- Single We Offer Area -->
                <div class="col-12 col-md-6 col-xl-3 centered">
                    <div class="single-we-offer-content text-center wow fadeInUp" data-wow-delay="0.3s">
                        <!-- Icon -->
                        <div class="offer-icon" style="background-image: none;background: none">
                            <img  src="{{   $event->getPhoto()    }}" alt="">
                        </div>
                        <h5>
                            {{\Carbon\Carbon::createFromFormat('Y-m-d',$show->day)->format(' F  d')}}

                        </h5>
                        <div name="show_date" style="padding-top: 10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Start Time</h6>
                                </div>
                                <div class="col-md-6">
                                    <h6>End Time</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>{{$show->starting_time}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$show->ending_time}}</p>
                                </div>
                            </div>
                        </div>
                        <h5>
                            <label>Choose Your Ticket Type</label>
                            {!! Form::open(['method' => 'POST' , 'action'=>'UserCartController@store']) !!}

                            <select name="ticket_id" class="form-control" >
                                <option disabled selected value> -- select Ticket -- </option>
                                @foreach($event->tickets as $ticket)

                                    <option name="test" value="{{$ticket->id}}" class="text-center" >{{$ticket->type}} : {{$ticket->price}} EGP</option>
                                @endforeach

                            </select>
                            <label style="padding-top: 10px">Quantity</label>
                            <select class="form-control" name="quantity" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </h5>
                        <button name="show_id" value="{{$show->id}}" type="submit" class="btn confer-btn mt-50 wow fadeInUp" data-wow-delay="300ms" >Book Now <i class="zmdi zmdi-long-arrow-right"></i> </button>
                        {!! Form::close() !!}
                    </div>
                </div>

            @endforeach

        </div>
    </div>
</section>

@endsection

