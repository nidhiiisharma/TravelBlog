@extends('layouts.app')
@section('content')
<a href = "/posts" class="btn btn-default"> Go back</a>
<h1>{{$post->title}}</h1>
  <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
  <br><br>
  <div>
      {{$post->moreBody}}
  </div>
  <hr>
  <small>Written on {{$post->created_at}} by {{$post->user['name']}}</small>
<hr>
<div class="row">
  <br>
  <div class="col-md col-md-offser-2">
    <div class="panel panel-default">
      <div class="panel-heading">Comments</div>
      <div class="panel-body comment-container">
        @foreach($post->comments as $comment)
          <div class="well">
            <i><strong>{{ $comment-> name }}: </strong></i>&nbsp;
            <span> {{ $comment-> comment }} </span>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="col-md-6 col-md-offser-2">
    <form method="POST" action="/posts/{{$post->id}}/comments">
      {{ csrf_field() }}
      <div class="form-group">
        {{Form::text('name','',['class' =>'form-control','placeholder'  => 'Name'])}}
      </div>
      <div class="form-group">
        {{Form::textarea('comment','',['class' =>'form-control','placeholder'  => 'Your comment here'])}}
      </div>
      <div class="form-group">
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
      </div>
    </form>
  </div>
</div>
<hr>
@if(!Auth::guest())
@if(Auth::user()->id == $post->user_id)
<a href="/posts/{{$post->id}}/edit" class ="btn btn-default">Edit</a>
{!! Form::open(['action' => ['PostController@destroy',$post->id],'method' => 'POST', 'class' => 'pull-right']) !!}
  {{Form::hidden('_method', 'DELETE')}}
  {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
<br><br><br><br>

 @endif 
@endif
@endsection