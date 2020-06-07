@extends('admin.admin-dashboard')
@section('ticket-active')
    <li class="active">
        @endsection
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
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
                        <h3 class="card-title">{{$event->name}} Event Tickets</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ps">
                            <table class="table" id="tickets_table">
                                <thead>
                                    <tr>
                                        <th>Ticket Name</th>
                                        <th>Ticket Description</th>
                                        <th>Ticket Price</th>
                                        <th>Availble Tickets</th>
                                        <th>Sold Tickets</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: #27293d">
                                    @if($event->tickets->isEmpty())
                                        <tr>
                                            <td>
                                                <h2  style="font-family: 'Poppins', sans-serif">No Tickets Has Been Set</h2>
                                            </td>
                                            <td>
                                                <a href="/admin/tickets"><h2 style="color: hotpink;font-family: 'Poppins', sans-serif">Add Ticket </h2></a>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($event->tickets as $ticket)
                                            <tr style="background-color: #27293d">

                                                <td>{{$ticket->type}}</td>
                                                <td>{{$ticket->descrip}}</td>
                                                <td>{{$ticket->price}}</td>
                                                <td>{{$ticket->available_tickets}}</td>
                                                <td>{{$ticket->sold_tickets}}</td>

                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
