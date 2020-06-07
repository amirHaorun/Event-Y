@extends('admin.admin-dashboard')
@section('user-active')
    <li class="active">
    @endsection
@section('content')

    <div class="content">
        <div class="row">

            <div class="col-md-12">
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
                        <h5 class="title">All Users</h5>
                    </div>
                    <div class="card-body">

                        <table id="users_table" class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID </th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Adress</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Updated At</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($users)
                                @foreach($users as $user)
                            <tr>
                                <td class="text-center">{{$user->id}}</td>
                                <td class="text-center">   <a style="color: hotpink" href="./user/{{$user->id}}/edit">{{$user->full_name}}</a>   </td>
                                <td class="text-center">{{$user->phone}}</td>
                                <td class="text-center">{{$user->adress}}</td>
                                <td class="text-center">{{$user->email}}</td>
                                <td class="text-center">{{$user->created_at}}</td>
                                <td class="text-center">{{$user->updated_at}}</td>

                                @endforeach
                              @endif

                                 </tbody>
                        </table>

                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
