<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, "post");
    }

    public function index(): View
    {
        $posts = Post::query()
            ->where("user_id", auth()->user()->id)
            ->latest("created_at")
            ->get();

        return view("posts.dashboard", ["posts" => $posts]);
    }

    public function create(): View
    {
        return view("posts.add-post", [
            "categories" => Category::all()
        ]);
    }

    public function store(PostStoreRequest $request): RedirectResponse
    {
        $request->image->store("posts", "public");

        Post::query()->create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $request->image->hashName(),
            "category_id" => $request->categories,
            "user_id" => auth()->user()->id
        ]);

        return redirect()->route("posts.index");
    }

    public function show(Post $post): View
    {
        return view("posts.post-page", ["post" => $post]);
    }

    public function edit(Post $post): View
    {
        return view("posts.edit-post", [
            "categories" => Category::all(),
            "post" => $post
        ]);
    }

    public function update(PostUpdateRequest $request, Post $post): RedirectResponse
    {
        $path = null;

        if ($request->hasFile("image")) {
            $upload = $request->image->store("posts", "public");
            $path = basename($upload);

            File::delete(public_path('storage/posts/' . $post->image));
        }

        $post->update([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $path,
            "category_id" => $request->categories
        ]);

        return redirect()->route("posts.index");
    }

    public function destroy(Post $post): RedirectResponse
    {
        if (File::exists(public_path('storage/posts/' . $post->image))) {
            File::delete(public_path('storage/posts/' . $post->image));
        }

        $post->delete();

        return redirect()->route("posts.index");
    }
}
