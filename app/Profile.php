<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'university', 'profile_description', 'webisite'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
