<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Discussion extends Model
{
    protected $fillable = [
        'title', 'content', 'slug', 'user_id', 'channel_id'
    ];

    public function channel()
    {
        return $this->belongsTo('App\Channel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function watchers ()
    {
        return $this->hasMany('App\Watcher');
    }

    public function is_being_watched_by_auth_user()
    {
        $id = Auth::id();

        $watchers = array();

        foreach($this->watchers as $watcher)
        {
            array_push($watchers, $watcher->user_id);
        }

        if(in_array($id, $watchers))
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
}
