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

        return view('welcome');
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

        Group::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'industry' => $data['industry'],
            'visibility' => $data['visibility'],
        ]);

        return redirect('groups/list');
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
        })->get();

        $group = $group->where('id', '=', $id);

        if ($group->isEmpty()) {
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
        $group = Group::find($id);

        // dd($group);

        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'industry' => 'required',
            'visibility' => 'required',
        ]);

        // dd($data);

        $group->name = $request->name;
        $group->description = $request->description;
        $group->industry = $request->industry;
        $group->visibility = $request->visibility;
        $group->save();

        // dd($group);

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
        //
    }
}
