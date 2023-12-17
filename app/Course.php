<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title','content','photo','teacherId'
    ];

    /**
     * The roles that belong to the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    /* relationship Many to Many
     parameter 1= name of Model to Join with
     parameter 2= name of intermediate table
     parameter 3= name of foreign key related to this model
     parameter 4= name of foreign key related to other model
    */
    public function users()
    {
        return $this->belongsToMany(User::class,'users_courses','courseId','studentId');
    }

    
    /**
     * Get the user that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /* relationship 1 to Many
     each course are related  to one teacher
    */
    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
}
