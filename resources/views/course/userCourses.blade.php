@extends('layouts.app')
@section('content')

<div class="container">
  <span><br/></span>
    @if ($message=Session::get('success'))
    <div class="alert alert-info">
      {{$message}}
    </div>
        
    @endif
  <h2>All Courses</h2>
  @if (Auth::user()->type==1)
  <a href="{{ route('courses.create')}}" class="btn btn-primary">Add Course</a>  
  @endif
 
  <span><br/><br/></span>
  <table class="table table-bordered" style="text-align: center;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Photo</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @if ($courses!=null)
      @foreach ($courses as $course)
          <tr>
            <td>{{$course->id}}</td>
            <td>{{$course->title}}</td>
            <td>{{$course->content}}</td>
            <td><img src="{{URL::asset($course->photo)}}" alt="{{$course->photo}}" class="img-tumbnail" width="100" height="100"></td>
            <td>
                @if (Auth::user()->type==0)
                <div class="row">
                    <div class="col-sm">
                      <a href="{{ route('courses.show',$course->id)}}" class="btn btn-info">Show</a>
                    </div>
                    <div class="col-sm">
                      <form method="POST" action="{{ route('disJoinCourse',$course->id)}}">
                        @csrf
                        <button type="submit" class="btn btn-danger">DisJoin</button>
                      </form>
                    </div>
                  </div>
                @else
                <div class="container">
                    <div class="row">
                      <div class="col-sm">
                        <a href="{{ route('courses.show',$course->id)}}" class="btn btn-info">Show</a>
                      </div>
                      <div class="col-sm">
                        <a href="{{ route('courses.edit',$course->id)}}" class="btn btn-success">Edit</a>
                      </div>
                      <div class="col-sm">
                        <form method="POST" action="{{ route('courses.destroy',$course->id)}}">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </div>
                    </div>
                  </div>       
                @endif
            </td>
          </tr>
      @endforeach
      @endif
    </tbody>
  </table>
</div>
@endsection