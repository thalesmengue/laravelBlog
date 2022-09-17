<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth")->except("index", "show");
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view ("posts.dashboard");
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
        dd($request);
        Post::query()->create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $request->image,
            "category_id" => $request->category
        ]);

        return redirect()->route("dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
