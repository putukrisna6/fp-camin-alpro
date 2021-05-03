<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $greetings = "asd";
        $time = date("H");
        $timezone = date("e");

        if ($time < "12") {
            $greetings = "Good morning";
        }
        else if ($time >= "12" && $time < "18") {
            $greetings = "Good afternoon";
        }
        else if ($time >= "18") {
            $greetings = "Good Evening";
        }

        $right_now = now()->toDateTimeString();

        // dd(now()->toDateTimeString());

        $user_id = Auth::user()->id;

        $groups = Group::whereHas('users', function($q) use($user_id) {
            $q->whereIn('id', [$user_id]);
        })->select('id')->get();

        $group_events_count = Event::whereIn('group_id', $groups)
                                ->where('start', '>', $right_now)
                                ->count();
        $user_events_count = Event::where('user_id', '=', $user_id)
                                ->where('start', '>=', $right_now)
                                ->count();

        $event_count = $group_events_count + $user_events_count;

        return view('home', compact('greetings', 'event_count'));
    }
}
