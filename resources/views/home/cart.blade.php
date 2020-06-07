@extends('home.templat')

@section('content')
    <section style="padding-top: 200px" class="what-we-offer-area section-padding-100-70">
        <div class="container">
            <div class="row">
                <!-- Heading -->
                <div class="col-12">
                    <div class="section-heading-3 text-center wow fadeInUp" data-wow-delay="300ms">

                        <h4>Cart</h4>

                    </div>
                    <div class="flash-message">
                        @foreach (['success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                            @if(Session::has('edit-' . $msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get('edit-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>

                            @endif
                            @if(Session::has('delete-' . $msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get('delete-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>

                            @endif
                        @endforeach
                    </div> <!-- end .flash-message -->
                </div>
            </div>

            <div class="row">

                <!-- Single We Offer Area -->
                @foreach($shoppingCart->ticketsInCart as $ticket)
                <div class="col-12 col-md-12 ">

                    <div style="width: auto;background-color: white" class="single-we-offer-content  wow fadeInUp" data-wow-delay="0.3s">

                        <h4 ><a style="color: #df42b1;" href="/main/{{$ticket->event->id}}">{{$ticket->event->name}}</a></h4>
                        <h6 style="color: #27293d">Venue : {{$ticket->event->venue}}</h6>

                        <h6 style="color: #27293d">Ticket Type : {{$ticket->type}}</h6>
                        <h6 style="color: #27293d">Show Date: {{\Carbon\Carbon::createFromFormat('Y-m-d',$ticket->event->shows->where( 'id',$ticket->pivot->show_id)->first()->day    )->format('Y - F - j')}} | From {{$ticket->event->shows->where( 'id',$ticket->pivot->show_id)->first()->starting_time}} To {{$ticket->event->shows->where( 'id',$ticket->pivot->show_id)->first()->ending_time}}</h6>
                        <h6 style="color: #27293d">quantity : {{$ticket->pivot->quantity}}</h6>
                        <h6 style="color: #27293d">Total Price : {{$ticket->price *  $ticket->pivot->quantity  }}</h6>
                        {!! Form::open(['route' => ['cart.destroy', $ticket->pivot->id] , 'method'=>'delete' ])  !!}
                        <button style="margin-left: 15px" type="submit" class="btn btn-danger pull-right">Delete</button>
                        {!! Form::close() !!}

                        {!! Form::open(['method' => 'POST' , 'action'=>'UserCartController@ConfirmPurchase']) !!}

                        <button name="cart_ticket_id" value="{{$ticket->pivot->id}}" type="submit" class="btn btn-success pull-right">Confirm Purchase</button>

                        {!! Form::close() !!}

                    </div>

                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection
