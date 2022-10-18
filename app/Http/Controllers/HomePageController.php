<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomePageController extends Controller
{
    /**
     * Display the home page.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $posts = Post::query()
            ->inRandomOrder()
            ->limit(6)
            ->get();

        return view("index", ["posts" => $posts]);
    }
}
