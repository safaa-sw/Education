@extends('layouts.app')
@section('content')

<div class="container">
  <span><br/><br/></span>
  <table class="table table-bordered" style="text-align: center;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Teacher</th>
        <th scope="col">Photo</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @php
           $row=0;
      @endphp
      @if ($courses!=null)
        @foreach ($courses as $course)
          <tr>
            <td>{{++$row}}</td>
            <td>{{$course->title}}</td>
            <td>{{$course->content}}</td>

            {{-- for display teacher name --}}
            @php
                $teacherName = App\User::find($course->teacherId)->name; 
            @endphp
            <td>{{$teacherName}}</td>
            <td><img src="{{URL::asset($course->photo)}}" alt="{{$course->photo}}" class="img-tumbnail" width="100" height="100"></td>
            <td>
              <div class="container">
                <div class="row">
                  <div class="col-sm">
                    <a href="{{ route('courses.show',$course->id)}}" class="btn btn-info">More Details</a>
                  </div>
                  
                </div>
              </div>       
            </td>
          </tr>
      @endforeach
      @endif
    </tbody>
  </table>

  {{-- for pagination --}}
  
  <div class="container">
    {{ $courses->links() }}
  </div>
</div>

@endsection