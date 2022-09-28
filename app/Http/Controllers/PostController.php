<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth")->except("show");
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $posts = Post::query()->where("user_id", auth()->user()->id)->get();

        return view("posts.dashboard", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view("posts.add-post", [
            "categories" => DB::table("categories")->get()
        ]);
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(PostStoreRequest $request)
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

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     *
     */
    public function show(Post $post)
    {
        return view("posts.post-page", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     *
     */
    public function edit(Post $post)
    {
        return view("posts.edit-post", [
            "categories" => DB::table("categories")->get(),
            "post" => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     *
     */
    public function update(Request $request, Post $post)
    {
        if ($request->hasFile("image")) {
            $upload = $request->image->move(public_path('storage/posts/'), $request->image->hashName());
            if ($upload) {
                $path = basename($upload);
                unlink(public_path('storage/posts/' . $post->image));
                $post->update([
                    "title" => $request->title,
                    "description" => $request->description,
                    "image" => $path,
                    "category_id" => $request->categories
                ]);
            }
        } else {
            $post->update($request->all());
        }
        return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     *
     */
    public function destroy(Post $post)
    {
        if (File::exists(public_path('storage/posts/' . $post->image))) {
            File::delete(public_path('storage/posts/' . $post->image));
        }
        $post->delete();
        return redirect()->route("posts.index");
    }
}
