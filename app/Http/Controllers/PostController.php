<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth")->except("show");
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::query()
            ->where('user_id', auth()->user()->id)
            ->get();

        return view("posts.dashboard", $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(): View
    {
        return view('posts.add-post', [
            'categories' => Category::all()
        ]);
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param PostStoreRequest $request
     * @return RedirectResponse
     */
    public function store(PostStoreRequest $request): RedirectResponse
    {
        $request->image->store('posts', 'public');

        Post::query()->create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $request->image->hashName(),
            'category_id' => $request->categories,
            'user_id'     => auth()->user()->id
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return View
     */
    public function show(Post $post): View
    {
        return view('posts.post-page', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return View
     */
    public function edit(Post $post): View
    {
        return view('posts.edit-post', [
            'categories' => Category::all(),
            'post'       => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateRequest $request
     * @param Post $post
     * @return mixed
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        if ($request->hasFile("image")) {
            File::delete(public_path('storage/posts/' . $post->image));

            $post->update([
                'title'       => $request->title,
                'description' => $request->description,
                'image'       => basename($request->image->store("posts", "public")),
                'category_id' => $request->categories
            ]);

            return redirect()->route("posts.index");
        }

        $post->update($request->all());

        return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        if (File::exists(public_path('storage/posts/' . $post->image))) {
            File::delete(public_path('storage/posts/' . $post->image));
        }

        $post->delete();

        return redirect()->route("posts.index");
    }
}
