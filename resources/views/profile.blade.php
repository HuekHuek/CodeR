@extends('layouts.user_header')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="/uploads/avatars/{{ $user->avatar }}" 
            	style="width: 150px; height:150px; float:left; border-radius:50%; margin-right:20px;"
            	alt="{{ $user->name }}'s profile picture">
            <h2>{{ $user->name }}'s profile</h2>
            <form enctype="multipart/form-data" action="{{ url('/profile') }}" method="POST">
            	<label>Update Profile Picture</label>
            	<input type="file" name="avatar">
            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
            	<input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection