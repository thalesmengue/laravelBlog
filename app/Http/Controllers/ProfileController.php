<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke($username)
    {
//        $user = User::query()->where("username", $username)->firstOrFail();
//
//        $author = Post::query()->with("user")->get();
        $user = User::where('username', $username)->firstOrFail();
        $posts = Post::where('user_id', $user->id)->get();
        return view('user.profile', [
            "user" => $user,
            "posts" => $posts
        ]);
    }
}
