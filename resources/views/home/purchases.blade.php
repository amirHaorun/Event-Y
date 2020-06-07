@extends('home.templat')

@section('content')
    <section style="padding-top: 200px" class="what-we-offer-area section-padding-100-70">
        <div class="container">
            <div class="row">
                <!-- Heading -->
                <div class="col-12">
                    <div class="section-heading-3 text-center wow fadeInUp" data-wow-delay="300ms">

                        <h4>Purchases</h4>
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

                @foreach($purchases as $purchase)
                    <div class="col-12 col-md-12 ">

                        <div style="width: auto;background-color: white" class="single-we-offer-content  wow fadeInUp" data-wow-delay="0.3s">

                            <h4 >
                                <a style="color: #df42b1;" href="/main/{{$purchase->ticket->event->id}}">{{$purchase->ticket->event->name}}
                                </a>
                                @if($purchase->status == "PENDING")

                                    <span class="badge badge-pill badge-success">PENDING</span>
                                  @elseif($purchase->status == "DELIVERING")
                                    <span class="badge badge-pill badge-success">Delivering</span>

                                @elseif($purchase->status == "DELIVERED")
                                    <span class="badge badge-pill badge-success">Delivered Successfully</span>

                                @elseif($purchase->status == "CANCELED")
                                    <span class="badge badge-pill badge-danger">Canceled</span>
                                @elseif($purchase->status == "cancel request")
                                    <span class="badge badge-pill badge-danger">Cancellation Requested</span>

                                @endif
                            </h4>
                                    <p style="color:black">Purchased date :
                                        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $purchase->created_at)->day}} -

                                        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $purchase->created_at)->monthName}} -

                                        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $purchase->created_at)->year}}

                                    </p>
                            <h6 style="padding-top: 10px;color: #27293d">Venue : {{$purchase->ticket->event->venue}}</h6>

                            <h6 style="color: #27293d">Show Date: {{\Carbon\Carbon::createFromFormat('Y-m-d',$purchase->show->day    )->format('Y - F - j')}} | From {{$purchase->show->starting_time}} To {{$purchase->show->ending_time}}</h6>
                            <h6>Quantity : {{$purchase->quantity}}</h6>
                            <h6>Total Price : {{$purchase->value}}</h6>

                                @if($purchase->status != "DELIVERED" )
                                <button style="margin-left: 15px" type="submit" class="btn btn-danger pull-right">

                                <a style="color:white" href="{{route('order.cancel',$purchase->id)}}">Request Order Cancellation</a>
                                </button>

                                @endif

                        </div>
                    </div>

                        @endforeach
            </div>
        </div>
    </section>
@endsection
