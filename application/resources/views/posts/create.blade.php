@extends('layouts.app')
@section('content')
 <h1>Create Post</h1>
 {!! Form::open(['action' => 'PostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
 <div class="form-group">
     {{Form::label('name','Title')}}
     {{Form::text('title','',['class' =>'form-control','placeholder'  => 'Title'])}}
 </div>
     <div class="form-group">
        {{Form::label('author','Author')}}
        {{Form::text('author','',['class' =>'form-control','placeholder'  => 'Author'])}}
    </div>
      <div class="form-group">
       {{Form::label('body','Body')}}
       {{Form::text('body','',['class' =>'form-control','placeholder'  => 'Body Text'])}}
    </div>
    <div class="form-group">
        {{Form::label('moreBody','moreBody')}}
        {{Form::textarea('moreBody','',['class' =>'form-control','placeholder'  => 'Body Text'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
<div class="form-group">
    <br><br><br><br><br><br><br>
</div>
@endsection
