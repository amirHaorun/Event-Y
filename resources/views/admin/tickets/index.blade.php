@extends('admin.admin-dashboard')
@section('ticket-active')
    <li class="active">
        @endsection
        @section('content')
            <div class="content">
                <div class="row">
                    <div class="col-md-8">
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
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Manage Tickets</h5>
                            </div>
                            <div class="card-body ">
                                <div class="cold-md-12">
                                    <table  class="table" id="tickets_table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Event Name</th>
                                            <th class="text-center">Ticket Name</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Available</th>
                                            <th class="text-center">Sold</th>
                                            <th class="text-center"></th>
                                            <th class="text-center"></th>

                                        </tr>
                                        </thead>
                                        <tbody>


                                        @if($tickets)

                                            @foreach($tickets as $ticket)

                                                <tr>
                                                    <td class="text-center">{{$ticket->event->name}}</td>
                                                    <td class="text-center">{{$ticket->type}}</td>
                                                    <td class="text-center">{{$ticket->price}}</td>
                                                    <td class="text-center">{{$ticket->available_tickets}}</td>
                                                    <td class="text-center">{{$ticket->sold_tickets}}</td>

                                                    <td>


                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#{{preg_replace('/\s+/','',$ticket->type)}}" >
                                                            Edit
                                                        </button>
                                                    </td>
                                                    <td>
                                                        {!! Form::open(['route' => ['tickets.destroy', $ticket->id] , 'method'=>'delete' ])  !!}
                                                        <button type="submit" class="btn btn-primary btn-sm">DELETE</button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                    <div class="modal fade" id="{{ preg_replace('/\s+/','',$ticket->type)  }}" tabindex="-1" role="dialog" >
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content card">
                                                                <div class="modal-header text-center">
                                                                    <h4 class="card-header w-100 font-weight-bold">Edit Ticket</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                {!! Form::model($ticket, ['method'=>'PATCH','route' => ['tickets.update', $ticket->id]]) !!}

                                                                <div class="modal-body mx-3">
                                                                    <div class="md-form mb-3">
                                                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Event Name</label>

                                                                        <select class="form-control" id="select_1" name="event_id" >
                                                                            <option style="background-color: #e14eca"  value="{{$ticket->event_id}}">{{$ticket->event->name}} </option>
                                                                            @foreach($events as $event)
                                                                                @if($event->id != $ticket->event_id)
                                                                                <option style="background-color: #e14eca" value="{{$event->id}}">{{$event->name}}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="md-form mb-3">
                                                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Ticket Name</label>

                                                                        <input  value="{{$ticket->type}}" type="text" id="defaultForm-email" class="form-control validate" name="type">
                                                                    </div>
                                                                    <div class="md-form mb-3">
                                                                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Description</label>

                                                                        <input value="{{$ticket->descrip}}" type="text" id="defaultForm-pass" class="form-control validate" name="descrip">
                                                                    </div>
                                                                    <div class="md-form mb-3">
                                                                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Price</label>

                                                                        <input value="{{$ticket->price}}" type="text" id="defaultForm-pass" class="form-control validate" name="price">
                                                                    </div>
                                                                    <div class="md-form mb-3">
                                                                        {!! Form::label('tickets_number','Number of Available Tickets') !!}
                                                                        <input value="{{$ticket->available_tickets}}" placeholder="50" name="available_tickets" class="form-control" type="text">
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <button type="submit" class="btn btn-primary btn-sm ">Edit</button>
                                                                    <span></span>
                                                                    <button class="btn btn-primary btn-sm" type="button"  data-dismiss="modal" aria-label="Close">
                                                                        Close
                                                                    </button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>


                                                </tr>

                                            @endforeach

                                        @endif




                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <p class="card-text">
                                </p><div class="author">
                                    <div class="block block-one"></div>
                                    <div class="block block-two"></div>
                                    <div class="block block-three"></div>
                                    <div class="block block-four"></div>
                                    <h1 style="padding-top: 20px; padding-bottom: 20px">Add Ticket</h1>

                                    {!! Form::open(['method' => 'POST' , 'action'=>'AdminTicketController@store']) !!}

                                    {!! Form::label('name','Event Name') !!}
                                    <select class="form-control" id="select_1" name="event_id" >
                                        <option style="background-color: #e14eca"  disabled selected value> -- Select Event -- </option>
                                        @foreach($events as $event)
                                            <option style="background-color: #e14eca" value="{{$event->id}}">{{$event->name}}</option>
                                        @endforeach
                                    </select>
                                    {!! Form::label('type','Ticket Name') !!}
                                    {!! Form::text('type',null,['class'=>'form-control','placeholder'=>'Platinum,Vip,Golden']) !!}

                                    {!! Form::label('descrip','Description') !!}
                                    {!! Form::text('descrip',null,['class'=>'form-control big','placeholder'=>'This Ticket Includes Frist Seat Row']) !!}

                                    {!! Form::label('Price','Price') !!}
                                    {!! Form::text('price',null,['class'=>'form-control big','placeholder'=>'1500 , 1400']) !!}

                                    {!! Form::label('tickets_number','Number of Available Tickets') !!}
                                    <input placeholder="50" name="available_tickets" class="form-control" type="text">
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-fill btn-primary">Save</button>
                                    </div>
                                    {!! Form::close() !!}

                                </div>

                            </div>
                            @if ($errors->any())
                                <ul>{!! implode('', $errors->all('<li style="color:hotpink">:message</li>')) !!}</ul>
                            @endif
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

@endsection
