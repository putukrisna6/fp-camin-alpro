<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
    	{
            $user_id = Auth::user()->id;

            $group = Group::select('id')->whereHas('users', function($q) use($user_id) {
                $q->whereIn('id', [$user_id]);
            })->get();

    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->where('user_id', '=', $user_id)
                       ->orWhereIn('group_id', $group)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}

        return view('calendar.full-calendar');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Event::create([
    				'title'		=>  $request->title,
    				'start'		=>	$request->start,
    				'end'		=>  $request->end,
                    'user_id'   =>  Auth::user()->id,
                    'group_id'  =>  0,
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end,
                    'user_id'   =>  Auth::user()->id,
                    'group_id'  =>  0,
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }

    public function create($group_id) {
        return view('calendar.create', compact('group_id'));
    }

    public function store(Request $request) {
        $data = request()->validate([
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'user_id' => 'required',
            'group_id' => 'required',
        ]);

        $group_name = Group::find($data['group_id'])->name;

        $data['title'] = $group_name." : ".$data['title'];

        Event::create($data);
        return redirect('/calendar');
    }
}
