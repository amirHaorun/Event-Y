@extends('admin.admin-dashboard')
@section('user-active')
    <li class="active">

@endsection
@section('content')
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title text-center">
                                    Create User
                                </h4>                            </div>
                            <div class="card-body ">
                                     {!! Form::open(['method' => 'POST' , 'action'=>'AdminUserController@store','files'=>true]) !!}
                                     <div class="row">
                                         <div class="col-md-3 pr-md-1">
                                             <div class="form-group">
                                                 {!! Form::label('Full_Name_label','Full Name') !!}
                                                 {!! Form::text('full_name',null,['class'=>'form-control','placeholder'=>'Enter Full Name']) !!}

                                             </div>
                                         </div>


                                         <div class="col-md-5 pl-md-1">
                                             <div class="form-group">
                                                 {!! Form::label('email_label','Email') !!}
                                                 {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'example@gmail.com']) !!}

                                             </div>
                                         </div>
                                         <div class="col-md-4 pl-md-1">
                                             <div class="form-group">
                                                 <div class="form-group">
                                                     {!! Form::label('gender','Gender') !!}
                                                     <select class="form-control" id="select_1" name="gender" >
                                                         <option style="background-color: #e14eca"  disabled selected value> -- select gender -- </option>
                                                         <option style="background-color: #e14eca" value="male">Male</option>
                                                         <option style="background-color: #e14eca" value="female">Female</option>
                                                     </select>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('phone_label','Phone') !!}
                                            {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'0128239999']) !!}

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('Role','Role') !!}
                                            <select class="form-control" id="select_1" name="role_id" >
                                                <option style="background-color: #e14eca"  disabled selected value> -- select User Role -- </option>
                                                <option style="background-color: #e14eca" value="2">Normal</option>
                                                <option style="background-color: #e14eca" value="1">Adminstrator</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('Home_adress_label','Home Adress') !!}
                                            {!! Form::text('adress',null,['class'=>'form-control','placeholder'=>'build 12, example street, cairo, egypt']) !!}

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('password','Password ') !!}
                                            <input name="password" type="password" class="form-control"  placeholder="Password">

                                        </div>
                                    </div>
                                </div>
                                            <h5 style="color: hotpink;font-family: 'Poppins', sans-serif; font-size: 25px">UPLOAD PROFILE PICTURE</h5>
                                            <input type="file" id="avatar" name="photo">

                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-fill btn-primary">Save</button>
                                </div>
                                @if ($errors->any())
                                    <ul>{!! implode('', $errors->all('<li style="color:hotpink">:message</li>')) !!}</ul>
                                @endif
                                     {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
