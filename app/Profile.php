<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'gender', 'address', 'photo','userId'
    ];

    /**
     * Get the user that owns the Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /* one to one RelationShip*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
