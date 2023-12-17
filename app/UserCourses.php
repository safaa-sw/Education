<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/* هذا الموديل غير مهم */
/*------------------------------------------*/
class UserCourses extends Model
{
    protected $table = 'users_courses';
    
    protected $fillable = [
        'courseId', 'studentId'
    ];

    /**
     * Get the user that owns the userCourses
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'studentId');
    }

    /**
     * Get the user that owns the userCourses
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'courseId');
    }
}
