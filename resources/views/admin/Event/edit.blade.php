@extends('admin.admin-dashboard')
@section('event-active')
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
                                <h5 class="title text-center"> Edit Event</h5>
                                @if ($errors->any())
                                    <ul>{!! implode('', $errors->all('<li style="color:hotpink">:message</li>')) !!}</ul>
                                @endif
                            </div>
                            <div class="card-body">
                                {!! Form::model($event, ['files'=>true,'method'=>'PATCH','route' => ['events.update', $event->id]]) !!}
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            {!! Form::label('Role','Category') !!}
                                            <select class="form-control" id="select_1" name="categ_id" >
                                                <option value="{{$event->category->id}}" style="background-color: #e14eca"> {{$event->category->name}} </option>
                                                @foreach($categs as $categ)
                                                    @if($categ->name != $event->category->name)
                                                    <option style="background-color: #e14eca" value="{{$categ->id}}">{{$categ->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            {!! Form::label('Name_label','Event Name') !!}
                                            {!! Form::text('name',$event->name,['class'=>'form-control','placeholder'=>'Mohammed Ramadan concert']) !!}

                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            {!! Form::label('venue','Venue') !!}
                                            {!! Form::text('venue',$event->venue,['class'=>'form-control','placeholder'=>'Al Manara Theater']) !!}

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('descrip','Event Description') !!}
                                            {!! Form::text('descrip',$event->descrip,['class'=>'form-control','placeholder'=>'The Famous number one is here , Dress code: casual']) !!}

                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            {!! Form::label('Status','Status') !!}
                                            <select class="form-control"  name="status" >
                                                @if($event->status == 'published')
                                                <option value="published" style="background-color: #e14eca" selected value>Published</option>
                                                <option style="background-color: #e14eca" value="draft">Draft</option>
                                                @else
                                                <option value="draft" style="background-color: #e14eca" selected value>Draft</option>
                                                <option style="background-color: #e14eca" value="published">Publish</option>
                                                    @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <img height="100px" width="100px"  src="{{   asset($event->getPhoto())    }}" alt="">

                                <h5 style="color: hotpink;font-family: 'Poppins', sans-serif; font-size: 25px">Upload Event Picture</h5>
                                <input type="file" name="photo">

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-fill btn-primary">Save</button>
                            </div>
                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>





@endsection
