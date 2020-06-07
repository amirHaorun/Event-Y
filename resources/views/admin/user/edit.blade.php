@extends('admin.user.create')
@section('user-active')
    <li class="active">
@endsection
@section('content')

            <div class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Edit User</h5>
                            </div>
                            <div class="card-body ">
                                {!! Form::model($user, ['files'=>true,'method'=>'PATCH','route' => ['user.update', $user->id]]) !!}
                                    @csrf
                                <div class="row">
                                    <div class="col-md-5 pr-md-1">
                                        <div class="form-group">
                                            {!! Form::label('Full_Name_label','Full Name') !!}
                                            {!! Form::text('full_name',$user->full_name,['class'=>'form-control']) !!}

                                        </div>
                                    </div>

                                    <div class="col-md-7 pl-md-1">
                                        <div class="form-group">
                                            {!! Form::label('email_label','Email') !!}
                                            {!! Form::text('email',$user->email,['class'=>'form-control','placeholder'=>'example@gmail.com']) !!}

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('phone_label','Phone') !!}
                                            {!! Form::text('phone',$user->phone,['class'=>'form-control','placeholder'=>'0128239999']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            {!! Form::label('Role','Role') !!}
                                            <select class="form-control" id="select_1" name="role_id">
                                                @if($user->role_id == '2')

                                                    <option style="background-color: hotpink" value="2">Normal</option>
                                                    <option style="background-color: hotpink" value="1">Adminstrator</option>

                                                    @else
                                                    <option style="background-color: hotpink" value="1">Adminstrator</option>
                                                    <option style="background-color: hotpink" value="2">Normal</option>

                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('Home_adress_label','Home Adress') !!}
                                            {!! Form::text('adress',$user->adress,['class'=>'form-control','placeholder'=>'build 12, example street, cairo, egypt']) !!}

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('password','Password ') !!}

                                            <input value="{{$user->password}}" name="password" type="password" class="form-control"  placeholder="Password" id="passid">




                                        </div>
                                    </div>
                                </div>
                                <h5 style="color: hotpink;font-family: 'Poppins', sans-serif; font-size: 25px">UPDATE PROFILE PICTURE</h5>
                                    <input  type="file" id="avatar" name="photo">


                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-fill btn-primary">Save</button>
                                </div>
                                @if ($errors->any())
                                    <ul>{!! implode('', $errors->all('<li style="color:hotpink">:message</li>')) !!}</ul>
                                @endif
                                {!! Form::close() !!}
                                {!! Form::open(['route' => ['user.destroy', $user->id] , 'method'=>'delete' ])  !!}
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-fill btn-primary">DELETE</button>
                                </div>
                                {!! Form::close() !!}
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
                                    <a href="javascript:void(0)">

                                            <img height="400" width="400" class="avatar" src="{{$user->getMyAvatar() }} ">


                                        <h5 class="title">{{$user->full_name}}</h5>
                                    </a>
                                    <p class="description">
                                        @if($user->role_id == '1')
                                                ADMIN
                                            @else
                                                USER
                                        @endif
                                    </p>
                                </div>
                                <p></p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>@endsection
