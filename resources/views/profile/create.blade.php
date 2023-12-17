@extends('layouts.app')
@section('content')

<div class="container">
    <span><br/></span>
    <h3>Create Profile</h3>
    <span><br/></span>
    <form method="POST" action="{{ route('profiles.store')}}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlSelect2">Gender</label>
        <select class="form-control" id="gender" name="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Address</label>
        <input type="text" class="form-control" id="address" name="address">
      </div>
      <div class="form-group">
          <label for="exampleFormControlInput1">Photo</label>
          <input type="file" class="form-control" id="photo" name="photo">
        </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form> 
  </div>

@endsection