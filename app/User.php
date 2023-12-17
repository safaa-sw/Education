<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

     /* relationship Many to Many
     parameter 1= name of Model to Join with
     parameter 2= name of intermediate table
     parameter 3= name of foreign key related to this model
     parameter 4= name of foreign key related to other model
    */
    public function courses()
    {
        return $this->belongsToMany(Course::class,'users_courses','studentId','courseId');
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /* relationship 1 to Many
     parameter 1= name of Model to Join with
     parameter 2= name of foreign key related in other model
    */
    public function teacherCourses()
    {
        return $this->hasMany(Course::class, 'teacherId');
    }
    
    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */ 
    /* second parameter related to attribute from other model */
    public function profile()
    {
        return $this->hasOne(Profile::class,'userId');
    }
}
