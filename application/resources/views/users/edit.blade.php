@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">
                        <form method="post" action="{{route('users.update', $user)}}">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <div class="form-group">
                            {{Form::label('Name','Name:')}}
                            <input type="text" style="margin-left:12%;" name="name"  value="{{ $user->name }}" />
                        </div>
                        <div class="form-group">
                            {{Form::label('Email','Email:')}}
                            <input type="email" style="margin-left:12%;" name="email"  value="{{ $user->email }}" />
                        </div>
                        <div class="form-group">
                            {{Form::label('Password','Password:')}}
                            <input type="password" style="margin-left:8%;" name="password"/>
                        </div>
                        <div class="form-group">
                            {{Form::label('Confirm Password','Confirm Password:')}}
                            <input type="password" name="password_confirmation" />
                        </div>
                        {{Form::submit('Update',['class'=>'btn btn-success'])}}
                        <a href="/account" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
