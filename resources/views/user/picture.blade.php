@extends('layouts.app')
@section('content')
@include('side')
<br>
<div class="text-center bg-primary">
<h1 class="text-white">Edit Your Image</h1>
</div>
<div class="container">
    <br><br>
    
   
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/images/thumbs/thm_{{ $user->picture }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            
            <form enctype="multipart/form-data" action="{{ route('ImageUpdate') }}" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="picture">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection