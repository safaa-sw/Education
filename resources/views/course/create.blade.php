@extends('layouts.app')
@section('content')

<div class="container">
  <span><br/></span>
  <h3>Add New Course</h3>
  <span><br/></span>
  <form method="POST" action="{{ route('courses.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Content</label>
      <textarea class="form-control" id="content" name="content" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form> 
</div>
@endsection