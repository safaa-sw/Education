@extends('layouts.app')
@section('content')

<div class="container">
  <span><br/></span>
  <h3>Change Course Details</h3>
  <span><br/></span>
  <form method="POST" action="{{ route('courses.update',$course->id)}}" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-group">
      <label for="exampleFormControlInput1">Title</label>
      <input type="text" class="form-control" id="title" name="title"  value="{{$course->title}}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Content</label>
      <textarea class="form-control" id="content" name="content" rows="3">{{$course->content}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo">
        <img src="{{URL::asset($course->photo)}}" alt="{{$course->photo}}" class="img-tumbnail" width="300" height="300">
      </div>
    <button type="submit" class="btn btn-success">Save</button>
  </form> 
</div>
@endsection