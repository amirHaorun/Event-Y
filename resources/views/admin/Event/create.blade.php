@extends('admin.admin-dashboard')
@section('event-active')
    <li class="active">
@endsection
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title text-center"> Create Event</h5>
                        @if ($errors->any())
                            <ul>{!! implode('', $errors->all('<li style="color:hotpink">:message</li>')) !!}</ul>
                        @endif
                        {!! Form::close() !!}
                    </div>
                    <div class="card-body">
                        {!! Form::open(['method' => 'POST' , 'route'=>'events.store','files'=>true]) !!}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('Role','Category') !!}
                                    <select class="form-control" id="select_1" name="categ_id" >
                                        <option style="background-color: #e14eca"  disabled selected value> -- select Category Role -- </option>
                                        @foreach($categs as $categ)
                                        <option style="background-color: #e14eca" value="{{$categ->id}}">{{$categ->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    {!! Form::label('Name_label','Event Name') !!}
                                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Mohammed Ramadan concert']) !!}

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    {!! Form::label('venue','Venue') !!}
                                    {!! Form::text('venue',null,['class'=>'form-control','placeholder'=>'Al Manara Theater']) !!}

                                </div>
                            </div>
                            </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('descrip','Event Description') !!}
                                    {!! Form::text('descrip',null,['class'=>'form-control','placeholder'=>'The Famous number one is here , Dress code: casual']) !!}

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('Status','Status') !!}
                                    <select class="form-control"  name="status" >
                                        <option style="background-color: #e14eca"  disabled selected value> -- select Event Status -- </option>
                                            <option style="background-color: #e14eca" value="published">Published</option>
                                            <option style="background-color: #e14eca" value="draft">Draft</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <input type="file" name="photo">
                        <p style="font-size: 20px">500 X 542 or More is Preferable For Event Photo</p>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-fill btn-primary">Create</button>
                    </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>







@endsection
