@extends('layouts.app')
@section('content')

<div class="container">
    <span><br/></span>
    <h3>Edit Profile</h3>
    <span><br/></span>
    <form method="POST" action="{{ route('profiles.update',$profile->id)}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect2">Gender</label>
        <select class="form-control" id="gender" name="gender">
          <option value="male" @if($profile->gender == 'male') selected="selected" @endif>Male</option>
          <option value="female" @if($profile->gender == 'female') selected="selected" @endif>Female</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{$profile->address}}">
      </div>
      <div class="form-group">
          <label for="exampleFormControlInput1">Photo</label>
          <input type="file" class="form-control" id="photo" name="photo">
          <img src="{{URL::asset($profile->photo)}}" alt="{{$profile->photo}}" class="img-tumbnail" width="300" height="300">
        </div>
      <button type="submit" class="btn btn-success">Save</button>
    </form> 
  </div>

@endsection