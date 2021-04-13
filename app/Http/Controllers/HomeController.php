<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $mytime = now();

        return view('home', compact('greetings', 'mytime'));
    }
}
