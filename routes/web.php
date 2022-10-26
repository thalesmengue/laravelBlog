<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomePageController;



Route::resource("posts", PostController::class);
Route::resource("user", UserController::class);

Route::get("/", HomePageController::class)->name("index");
Route::get("/about", AboutController::class)->name("about");


require __DIR__ . '/auth.php';
