@extends('admin.admin-dashboard')
@section('categ-active')
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
                                <h5 class="title">Manage Categories</h5>
                            </div>
                            <div class="card-body ">
                                   <div class="cold-md-6">
                                       <table  class="table">
                                           <thead>
                                           <tr>
                                            <th>category Name</th>
                                            <th>Description</th>

                                           </tr>
                                           </thead>
                                           <tbody>


                                           @if($categories)

                                               @foreach($categories as $category)

                                           <tr>
                                               <td>{{$category->name}}</td>
                                               <td>{{$category->descrip}}</td>

                                                <td>


                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#{{preg_replace('/\s+/','',$category->name)}}" >
                                                        Edit
                                                    </button>
                                                </td>
                                               <td>
                                                   {!! Form::open(['route' => ['category.destroy', $category->id] , 'method'=>'delete' ])  !!}
                                                       <button type="submit" class="btn btn-primary btn-sm">DELETE</button>
                                                   {!! Form::close() !!}
                                               </td>
                                               <div class="modal fade" id="{{ preg_replace('/\s+/','',$category->name)  }}" tabindex="-1" role="dialog" >
                                                   <div class="modal-dialog" role="document">
                                                       <div class="modal-content card">
                                                           <div class="modal-header text-center">
                                                               <h4 class="card-header w-100 font-weight-bold">Edit Category</h4>
                                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                   <span aria-hidden="true">&times;</span>
                                                               </button>
                                                           </div>
                                                           {!! Form::model($category, ['method'=>'PATCH','route' => ['category.update', $category->id]]) !!}

                                                           <div class="modal-body mx-3">
                                                               <div class="md-form mb-5">
                                                                   <label data-error="wrong" data-success="right" for="defaultForm-email">Category Name</label>

                                                                   <input  value="{{$category->name}}" type="text" id="defaultForm-email" class="form-control validate" name="name">
                                                               </div>

                                                               <div class="md-form mb-4">
                                                                   <label data-error="wrong" data-success="right" for="defaultForm-pass">Description</label>

                                                                   <input value="{{$category->descrip}}" type="text" id="defaultForm-pass" class="form-control validate" name="descrip">
                                                               </div>

                                                           </div>
                                                           <div class="modal-footer d-flex justify-content-center">
                                                               <button class="btn btn-primary ">Edit</button>
                                                               <span></span>
                                                               <button class="btn btn-primary" type="button"  data-dismiss="modal" aria-label="Close">
                                                                   Close
                                                               </button>
                                                           </div>
                                                           {!! Form::close() !!}
                                                       </div>
                                                   </div>
                                               </div>


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
                                    <h1 style="padding-top: 20px; padding-bottom: 20px">Add Category</h1>

                                    {!! Form::open(['method' => 'POST' , 'action'=>'AdminCategoryController@store']) !!}

                                    {!! Form::label('Name_Label','Category Name') !!}
                                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'football,BaskeBall,Boxing Matches']) !!}

                                    {!! Form::label('descrip_Label','Description') !!}
                                    {!! Form::text('descrip',null,['class'=>'form-control big','placeholder'=>'football,BaskeBall,Boxing Matches']) !!}

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
