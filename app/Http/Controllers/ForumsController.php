<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;
use Illuminate\Support\Facades\Auth;

class ForumsController extends Controller
{

    public function index()
    {
        switch(request('filter'))
        {
            case 'my-discussions':
            {
                $discussions = Discussion::where('user_id', Auth::id())->paginate(3);
                break;
            }
            default:
            {
                $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
            }
        }

        return view('home', ['discussions' => $discussions]);
    }

    public function channel($slug)
    {
        $channel = Channel::where('slug', $slug)->first();

        return view('channel')->with('channel', $channel->title)->with('discussions', $channel->discussions()->paginate(5));
    }
}
