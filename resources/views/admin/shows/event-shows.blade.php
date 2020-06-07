@extends('admin.admin-dashboard')
@section('show-active')
    <li class="active">
        @endsection
        @section('content')

            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{$event->name}} Event Shows</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ps">
                                    <table class="table" id="tickets_table">
                                        <thead>
                                        <tr>
                                            <th>Event Name</th>
                                            <th>Show Day</th>
                                            <th>Starting Time</th>
                                            <th>Ending Time</th>
                                        </tr>
                                        </thead>
                                        <tbody style="background-color: #27293d">
                                        @if($event->shows->isEmpty())
                                            <tr>
                                                <td>
                                                    <h2  style="font-family: 'Poppins', sans-serif">No Show Times Has Been Set</h2>
                                                </td>
                                                <td>
                                                    <a href="/admin/shows"><h2 style="color: hotpink;font-family: 'Poppins', sans-serif">Add Show Times</h2></a>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach($shows as $show)
                                                <tr style="background-color: #27293d">

                                                    <td>{{$event->name}}</td>
                                                    <td>{{$show->day}}</td>
                                                    <td>{{$show->starting_time}}</td>
                                                    <td>{{$show->ending_time}}</td>

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
