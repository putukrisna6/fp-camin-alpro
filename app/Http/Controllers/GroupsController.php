<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();

        return view('groups.index', compact('groups'));
    }

    public function users()
    {
        $user_id = Auth::user()->id;
        $groups = User::find($user_id)->groups;

        return view('groups.group_user', compact('groups'));
    }

    public function addUser(Group $group) {
        $group->users()->attach(Auth::user());

        return redirect('groups/list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'industry' => 'required',
            'visibility' => 'required',
        ]);
        Group::create($data);
        return redirect('groups/join');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::user()->id;

        $group = Group::whereHas('users', function($q) use($user_id) {
            $q->whereIn('id', [$user_id]);
        })->where('id', '=', $id)->get()->first();

        if ($group == NULL) {
            return abort(404);
        }

        $posts = Post::where('group_id', '=', $id)->get();
        $posts = $posts->sortByDesc('created_at');

        return view('groups.show', compact('group', 'id', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'industry' => 'required',
            'visibility' => 'required',
        ]);
        Group::find($id)->update($data);
        return redirect("/groups/show/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = Auth::user()->id;

        $group = Group::whereHas('users', function($q) use($user_id) {
            $q->whereIn('id', [$user_id]);
        })->where('id', '=', $id)->get()->first();

        if ($group == NULL) {
            return abort(404);
        }

        $users = User::whereHas('groups', function($q) use($id) {
            $q->whereIn('id', [$id]);
        })->get();

        foreach($users as $user) {
            $user->groups()->detach($id);
        }
        $group->delete();

        return redirect('groups/list');
    }

    public function leave($id)
    {
        Auth::user()->groups()->detach($id);
        return redirect('groups/list');
    }
}
