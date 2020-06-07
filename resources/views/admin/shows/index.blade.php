@extends('admin.admin-dashboard')

@section('shows-active')
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
                    <h5 class="title">Mange Show Times</h5>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <table class="table" id="tickets_table">
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th class="text-center">Day</th>
                                    <th class="text-center">Start Time</th>
                                    <th class="text-center">End Time</th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                    @if($shows)
                                        @foreach($shows as $show)
                                            <tr>
                                            <td>{{$show->event->name}}</td>
                                            <td class="text-center">@if($show->day)
                                                    {{\Carbon\Carbon::createFromFormat('Y-m-d',$show->day)->format('Y/F/l')}}
                                                @endif
                                            </td>
                                            <td class="text-center">{{$show->starting_time}}</td>
                                            <td class="text-center">{{$show->ending_time}}</td>
                                                <td>


                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#show_{{$show->id}}" >
                                                        Edit
                                                    </button>
                                                </td>
                                                <!----------- The Edit Modal Goes Here ------------>
                                                <div class="modal fade" id="show_{{$show->id}}" tabindex="-1" role="dialog" >

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content card">
                                                            <div class="modal-header text-center">
                                                                <h4 class="card-header w-100 font-weight-bold">Edit {{$show->event->name}} Show</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            {!! Form::model($show, ['method'=>'PATCH','route' => ['shows.update', $show->id]]) !!}

                                                            <div class="modal-body mx-3">
                                                                <div class="md-form mb-3">
                                                                    <label data-error="wrong" data-success="right" for="defaultForm-email">Event Name</label>

                                                                    <select class="form-control" id="select_1" name="event_id" >
                                                                        <option style="background-color: #e14eca"  value="{{$show->event->id}}">{{$show->event->name}}</option>
                                                                        @foreach($events as $event)
                                                                            @if($event->id != $show->event->id)
                                                                                <option style="background-color: #e14eca" value="{{$event->id}}">{{$event->name}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="md-form mb-3">
                                                                    <label data-error="wrong" data-success="right" for="defaultForm-email">Show Day </label>

                                                                    <input name="day"  value="{{$show->day}}" type="date" id="defaultForm-email" class="form-control validate" name="type">
                                                                </div>
                                                                <div class="md-form mb-3">
                                                                    <label data-error="wrong" data-success="right" for="defaultForm-email">Show Starting Time </label>

                                                                    <input name="starting_time"  value="{{$show->starting_date}}" type="time" id="defaultForm-email" class="form-control validate" name="type">
                                                                </div>
                                                                <div class="md-form mb-3">
                                                                    <label data-error="wrong" data-success="right" for="defaultForm-email">Show Ending Time</label>

                                                                    <input  name="ending_time" value="{{$show->ending_date}}" type="time" id="defaultForm-email" class="form-control validate" name="type">
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
                                                <td>
                                                    {!! Form::open(['route' => ['shows.destroy', $show->id] , 'method'=>'delete' ])  !!}
                                                    <button type="submit" class="btn btn-primary btn-sm">DELETE</button>
                                                    {!! Form::close() !!}
                                                </td>


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
                            <h1 style="padding-top: 20px; padding-bottom: 20px">Set Show Time</h1>

                            {!! Form::open(['method' => 'POST' , 'action'=>'AdminShowsController@store']) !!}

                            {!! Form::label('name','Event Name') !!}
                            <select class="form-control" id="select_1" name="event_id" >
                                <option style="background-color: #e14eca"  disabled selected value> -- Select Event -- </option>
                                @foreach($events as $event)
                                    <option style="background-color: #e14eca" value="{{$event->id}}">{{$event->name}}</option>
                                @endforeach
                            </select>


                            <div class="form-content">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Show Day date</label>

                                <input  name="day"  type="date" id="defaultForm-email" class="form-control validate" >
                            </div>

                            <div class="form-content">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Show Starting Time</label>

                                <input  name="starting_time"  type="time" id="defaultForm-email" class="form-control validate" >
                            </div>
                            <div class="form-content">
                                    <label data-error="wrong" data-success="right" for="defaultForm-email">Show Ending Time</label>
                                    <input  name="ending_time" type="time" id="defaultForm-email" class="form-control validate" >
                            </div>





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
