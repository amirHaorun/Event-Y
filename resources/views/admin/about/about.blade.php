@extends('admin.admin-dashboard')
@section('about-active')
    <li class="active">
        @endsection
        @section('content')

            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title text-center"> ABOUT PAGE </h5>

                            </div>
                            <div class="card-body">
                                {!! Form::model($about, ['method'=>'PATCH','route' => ['about.update', $about->id]]) !!}
                                <div class="row">

                                    <div class="col-md-12 pr-md-1">
                                        <div class="form-group">
                                            {!! Form::label('Name_label','About Header') !!}
                                            {!! Form::text('header',$about->header,['class'=>'form-control','placeholder'=>'Mohammed Ramadan concert']) !!}

                                        </div>
                                    </div>
                                    <div class="col-md-12 pr-md-1">
                                        <div class="form-group">
                                            {!! Form::label('Name_label','About Content') !!}
                                            <textarea name="about_content" class="form-control" id="exampleFormControlTextarea1" rows="5">{{$about->content}}</textarea>

                                        </div>
                                    </div>

                                    <div class="card-footer content-center">
                                    <button type="submit" class="btn btn-fill btn-primary">EDIT</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>


                </div>







@endsection
