<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     *
     */
    public function show($username)
    {
        $user = User::query()->where('username', $username)->firstOrFail();
        $posts = Post::query()->where('user_id', $user->id)->latest("created_at")->get();
        return view('user.profile', [
            "user" => $user,
            "posts" => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return
     */
    public function edit()
    {
        $user = Auth::user();
        return view("user.settings", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     *
     */
    public function update(Request $request, User $user)
    {
        if ($request->hasFile("profile_image")) {
            $upload = $request->profile_image->move(public_path('storage/profile/'), $request->profile_image->hashName());
            $path = basename($upload);
            if (!empty($user->profile_image)) {
                File::delete(public_path('storage/profile/' . $user->profile_image));
            }
            $user->update([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "username" => $request->username,
                "bio" => $request->bio,
                "profile_image" => $path,
            ]);
        } else {
            $user->update($request->all());
        }
        return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
