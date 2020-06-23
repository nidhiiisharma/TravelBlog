    @extends('layouts.app')
@section('content')
 <h1>Edit Post</h1>
 {!! Form::open(['action' =>['PostController@update',$post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
 <div class="form-group">
     {{Form::label('title','Title')}}
     {{Form::text('title',$post->title,['class' =>'form-control','placeholder'  => 'Title'])}}
 </div> 
     <div class="form-group">
        {{Form::label('author','Author')}}
        {{Form::text('author',$post->author,['class' =>'form-control','placeholder'  => 'Author'])}}
    </div>
      <div class="form-group">
       {{Form::label('body','Body')}}
       {{Form::text('body',$post->body,['class' =>'form-control','placeholder'  => 'Body Text'])}}
    </div>
          <div class="form-group">
            {{Form::label('moreBody','moreBody')}}
            {{Form::textarea('moreBody',$post->moreBody,['class' =>'form-control','placeholder'  => 'Body Text'])}}
           </div>
           {{Form::hidden('_method','PUT')}}
           <div class="form-group">
            {{Form::file('cover_image')}}
            </div>
    {{Form::submit('Update',['class'=>'btn btn-success'])}}
{!! Form::close() !!}
@endsection