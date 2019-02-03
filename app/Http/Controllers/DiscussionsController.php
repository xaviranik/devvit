<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Reply;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewReplyAdded;

class DiscussionsController extends Controller
{
    public function create()
    {
        return view('discussions.create');
    }

    public function store()
    {
        $request = request();

        $this->validate($request, [
            'channel_id' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);

        $discussion = Discussion::create([
            'title' => $request->title,
            'content' => $request->content,
            'channel_id' => $request->channel_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id()
        ]);

        Session::flash('success', 'New discussion created!');
        return redirect()->route('discussion', ['slug' => $discussion->slug]);
    }

    public function show($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();
        $best_answer = $discussion->replies()->where('best_answer', 1)->first();

        return view('discussions.show')->with('discussion', $discussion)->with('best_answer', $best_answer);
    }

    public function reply($id)
    {
        $request = request();

        $this->validate($request, [
            'content' => 'required'
        ]);

        $discussion = Discussion::find($id);

        $reply = Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => $request->content
        ]);

        // Notifying other users about the reply
        $watchers =  array();

        foreach($discussion->watchers as $watcher)
        {
            array_push($watchers, User::find($watcher->user_id));
        }

        Notification::send($watchers, new \App\Notifications\NewReplyAdded($discussion));

        Session::flash('success', 'Repiled to discussion!');
        return redirect()->back();
    }
}
