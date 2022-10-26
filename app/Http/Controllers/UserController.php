<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, null, [
            "except" => "show"
        ]);
    }

    /**
     * Display the user profile, with the username as a URL parameter.
     *
     * @param User $username
     * @return View
     */
    public function show(User $user): View
    {
        $posts = $user->posts()->latest()->get();
        return view('user.profile', [
            "user" => $user,
            "posts" => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view("user.settings", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param User $user
     * @return mixed
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        if ($request->hasFile("profile_image")) {
            $request->profile_image->store("profile", "public");
            if (!empty($user->profile_image)) {
                File::delete(public_path('storage/profile/' . $user->profile_image));
            }
            $user->update([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "username" => $request->username,
                "bio" => $request->bio,
                "profile_image" => $request->profile_image->hashName(),
            ]);
        } else {
            $user->update($request->all());
        }
        return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        Auth::logout();

        return redirect()->to("/");
    }
}
