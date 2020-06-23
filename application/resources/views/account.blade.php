@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Welcome to Your Account</div>
                <div class="panel-body">
                    <div class="col-sm-3">
                        <img class="profile-image p-1" src="images/{{$user->avatar}}" style="width:100%;height:100%;margin-left:-20px;border-radius:50%">
                        <form enctype="multipart/form-data" action="/account" method="POST" style="margin-top:20px;margin-left:-10px;">
                            <label>Update Profile Image</label>
                            <input type="file" name="avatar" style="margin-bottom:10px;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{Form::submit('Upload',['class'=>'btn btn-success'])}}
                        </form>
                    </div>
                    <div class="clo-sm-7">
                            <div class="form-group">
                            {{Form::label('name', Auth::user()->name)}}
                            <hr>
                        </div>
                        <div class="form-group">
                            {{Form::label('email', Auth::user()->email)}}
                        </div>    
                             <a href="/users/{{$user->id}}" class ="btn btn-primary">Edit</a>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <br><br><br>    
@endsection