
@extends('admin.admin-dashboard')
@section('event-active')
    <li class="active">
@endsection
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
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
                    <div class="card-header">
                        <h4 class="card-title">All Events</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ps">
                            <table class="table" id="events_table">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        VENUE
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Tickets
                                    </th>
                                    <th>
                                        Show Time
                                    </th>
                                    <th>
                                        Delete
                                    </th>

                                </tr>
                                </thead>
                                <tbody style="background-color: #27293d">
                                @if($events)
                                    @foreach($events as $event)
                                <tr style="background-color: #27293d">
                                    <td>
                                        {{$event->id}}
                                    </td>
                                    <td>
                                        <a href="{{route('events.edit',$event->id)}}"> {{$event->name}}</a>

                                        <span class="small">{{$event->status}}</span>

                                        <!-- Split dropright button -->
                                    </td>
                                    <td>
                                        {{$event->venue}}
                                    </td>

                                    <td>
                                        {{$event->category->name}}

                                    </td>
                                    <td>

                                        <a href="/admin/tickets/{{$event->id}}">Tickets</a>
                                    </td>
                                    <td>
                                        <a href="/admin/shows/{{$event->id}}">Show Times</a>
                                    </td>
                                    <td>
                                        <a href="{{route('events.destroy',$event->id)}}">Delete</a>
                                    </td>

                                </tr>
                                        @endforeach
                                    @endif
                                {{$events->links()}}
                                </tbody>
                            </table>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
