<?php

namespace App\Http\Controllers;

use App\Events\DeletedUser;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, null, [
            "except" => "show"
        ]);
    }

    public function show(User $user): View
    {
        $posts = $user->posts()->latest()->get();

        return view('user.profile', [
            "user" => $user,
            "posts" => $posts
        ]);
    }

    public function edit(User $user): View
    {
        return view("user.settings", ["user" => $user]);
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        if ($request->hasFile('profile_image')) {
            $request->profile_image = $request->profile_image->store("profile", "public");

            File::delete(public_path('storage/profile/' . $user->profile_image));
        }

        $user->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "username" => $request->username,
            "bio" => $request->bio,
            "profile_image" => $request->profile_image,
        ]);

        return redirect()->route("index");
    }

    public function destroy(User $user): RedirectResponse
    {
        event(new DeletedUser($user));

        $user->delete();

        Auth::logout();

        return redirect()->to("/");
    }
}
