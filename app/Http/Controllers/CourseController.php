<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;
use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::paginate(4);
        //$courses= Course::latest()->paginate(4);
        //$courses=Course::with('teacher')->get();

        return view('course.index',compact('courses'));
    }
    public function getUserCourses()
    {
        //define user who is sign in
        $user=User::find(Auth::user()->id);
        $type=Auth::user()->type;

        $courses=null;
        if ($type==0) {
            $courses=$user->courses;
        }
        else{
            $courses=$user->teacherCourses;
        }

        return view('course.userCourses',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'photo'=>'required'
        ]);
        //create new name for photo and save it in public/uploads folder
        $photo=$request->photo;
        $newPhoto=time().$photo->getClientOriginalName();
        $photo->move('uploads/',$newPhoto);

        $course=Course::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'photo'=>'uploads/'.$newPhoto,
            'teacherId'=>Auth::user()->id,
        ]);
        return redirect()->route('getUserCourses')->with('success','product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course  $course)
    {
        return view('course.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course  $course)
    {
        return view('course.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course  $course)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);
        if ($request->has('photo')) {
            $photo=$request->photo;
            $newPhoto=time().$photo->getClientOriginalName();
            $photo->move('uploads/',$newPhoto);
            $course->photo='uploads/'.$newPhoto;
        }
        $course->title=$request->title;
        $course->content=$request->content;
        $course->teacherId=Auth::user()->id;
        $course->save();
        return redirect()->route('getUserCourses')->with('success','product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course  $course)
    {        
        $course=Course::find($course->id)->delete();
        return redirect()->route('getUserCourses')->with('success','product Deleted successfully');
    
    }

    public function joinCourse(int $id)
    { 
        $user=User::find(Auth::user()->id);
        $course=Course::find($id);
        /////// function to insert record to inertmediate table
        $user->courses()->attach($course);

        return redirect()->route('getUserCourses')->with('success','product Joined successfully');
    
    }
    public function disJoinCourse(int $id)
    {        
        $user=User::find(Auth::user()->id);
        $course=Course::find($id);
        /////// function to remove record from inertmediate table
        $user->courses()->detach($course);
        return redirect()->route('getUserCourses')->with('success','product disJoined successfully');
    
    }
}
