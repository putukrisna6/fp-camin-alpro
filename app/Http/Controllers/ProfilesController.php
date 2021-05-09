<?php

namespace App\Http\Controllers;

use App\Helpers\CollectionHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function groups() {
        $user_id = Auth::user()->id;
        $temp = User::find($user_id)->groups;

        $pageSize = 8;
        $groups = CollectionHelper::paginate($temp, $pageSize);

        return view('profiles.groups', compact('groups'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profiles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if ($user->id == Auth::user()->id) {
            return view('profiles.index');
        }

        return view('profiles.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if ($user->id != Auth::user()->id) {
            return abort(403);
        }

        return view('profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $data = request()->validate([
            'phone' => 'required',
            'profession' => 'required',
            'location' => 'required',
            'education' => 'required',
            'industry' => 'required',
            'expertise' => '',
            'gender' => '',
            'image' => '',
        ]);

        if (request('image')) {
            request()->validate([
                'image' => 'image',
            ]);

            $imagePath = request('image')->store('uploads/profiles', 'public');
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/display");
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
