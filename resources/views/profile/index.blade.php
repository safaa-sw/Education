@extends('layouts.app')
@section('content')

<div class="container">
@if ($profile!=null)
<div class="container">
    <h2>My Information</h2>
    <table>
        <tr style="height: 40px;">
            <td style="width: 100px;"><h5>Name</h5></td>
            <td>{{Auth::user()->name}}</td>
        </tr>
        <tr style="height: 40px;">
            <td style="width: 100px;"><h5>Gender</h5></td>
            <td>{{$profile->gender}}</td>
        </tr>
        <tr style="height: 40px;">
            <td style="width: 100px;"><h5>Address</h5></td>
            <td>{{$profile->address}}</td>
        </tr>
        <tr>
            <td style="width: 100px;"><h5>Photo</h5></td>
            <td>
                <img src="{{URL::asset($profile->photo)}}" alt="{{$profile->photo}}" class="img-tumbnail" width="300" height="300">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <a href="{{ route('profiles.edit',$profile->id)}}" class="btn btn-success">Edit</a>
            </td>
            
        </tr>
    </table>
  </div>
@else
<a href="{{ route('profiles.create')}}" class="btn btn-primary">create Profile</a>  
@endif
</div>

@endsection