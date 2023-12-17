<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::find(Auth::user()->id);
        $profile=$user->profile;

        return view('profile.index',compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPhoto=null;
        if ($request->has('photo')) {
            $photo=$request->photo;
            $newPhoto=time().$photo->getClientOriginalName();
            $photo->move('profile/',$newPhoto);
        }

        $profile=Profile::create([
            'gender'=>$request->gender,
            'address'=>$request->address,
            'photo'=>'profile/'.$newPhoto,
            'userId'=>Auth::user()->id,
        ]);
        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        
        $user=User::find($profile->userId);
        $user->name=$request->name;
        $profile->gender=$request->gender;
        $profile->address=$request->address;
        if ($request->has('photo')) {
            $photo=$request->photo;
            $newPhoto=time().$photo->getClientOriginalName();
            $photo->move('profile/',$newPhoto);
            $profile->photo='profile/'.$newPhoto;
        }
        $user->save();
        $profile->save();
        return redirect()->route('profiles.index')->with('success','product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
