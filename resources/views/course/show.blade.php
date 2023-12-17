@extends('layouts.app')
@section('content')

<div class="container">
  <span><br/></span>
  <h3>Course Details</h3>
  <span><br/></span>
  <div class="container">

    <div class="form-group">
      <label for="exampleFormControlInput1">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{$course->title}}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Content</label>
      <textarea class="form-control" id="content" name="content" rows="3">{{$course->content}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Photo</label>
        <br/>
        <img src="{{URL::asset($course->photo)}}" alt="{{$course->photo}}" class="img-tumbnail" width="300" height="300">
    </div>
    <div class="row" style="width: 300px">
      <div class="col-sm">
        <a href="{{ route('courses.index')}}" class="btn btn-info">Back To List</a>
      </div>
      @if (Auth::check()&&(Auth::user()->type==0))
      <div class="col-sm">
        <form method="POST" action="{{ route('joinCourse',$course->id)}}">
          @csrf
          <button type="submit" class="btn btn-success">Join</button>
        </form>
      </div>
      @endif
    </div>
</div>
@endsection