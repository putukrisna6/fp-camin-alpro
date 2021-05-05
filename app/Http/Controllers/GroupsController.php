<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Post;
use App\Models\Reply;
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

    public function addUser(Group $group) {
        $data = $group->users->find(Auth::user()->id);
        if ($data != NULL) {
            return redirect('groups/show/'.$group->id);
        }
        else {
            $group->users()->attach(Auth::user());
        }

        return redirect('profile/groups');
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
            'image' => '',
        ]);

        if (request('image')) {
            request()->validate([
                'image' => 'image',
            ]);

            $imagePath = request('image')->store('uploads/groups', 'public');
            $imageArray = ['image' => $imagePath];
        }

        Group::create(array_merge(
            $data,
            $imageArray ?? []
        ));
        return redirect('groups/index');
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
    public function destroy(Group $group)
    {
        $group_id = $group->id;
        $user_id = Auth::user()->id;
        $check = $group->users->where('id', '=', $user_id);

        if ($check->count() == 0) {
            return abort(403);
        }

        $posts = Post::where('group_id', '=', $group_id)->get();

        foreach($posts as $post) {
            Reply::where('post_id', '=', $post->id)->delete();
            $post->delete();
        }

        $users = User::whereHas('groups', function($q) use($group_id) {
            $q->whereIn('id', [$group_id]);
        })->get();

        foreach($users as $user) {
            $user->groups()->detach($group_id);
        }
        $group->delete();

        return redirect('profile/groups');
    }

    public function leave(Group $group)
    {
        $group_id = $group->id;
        Auth::user()->groups()->detach($group_id);

        if ($group->users->count() == 0) {
            $posts = Post::where('group_id', '=', $group_id)->get();

            foreach($posts as $post) {
                Reply::where('post_id', '=', $post->id)->delete();
                $post->delete();
            }
            $group->delete();
        }

        return redirect('profile/groups');
    }

    public function members(Group $group) {
        $group_name = $group->name;
        $users = $group->users;
        return view('groups.members', compact('users', 'group_name'));
    }
}
