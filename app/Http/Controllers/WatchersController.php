<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Watcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WatchersController extends Controller
{
    public function watch($id)
    {
        $watcher = Watcher::create([
            'discussion_id' => $id,
            'user_id' => Auth::id()
        ]);

        Session::flash('success', 'You are watching this discusssion!');
        return redirect()->back();
    }

    public function unwatch($id)
    {
        $watcher = Watcher::where('discussion_id', $id)->where('user_id', Auth::id());
        $watcher->delete();

        Session::flash('success', 'You are no longer watching this discusssion!');
        return redirect()->back();
    }
    
}
