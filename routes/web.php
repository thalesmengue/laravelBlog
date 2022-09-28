<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;


Route::resource("posts", PostController::class);

Route::get("/", [HomePageController::class, "index"])->name("index");
Route::get("/user/{username}", ProfileController::class)->name("user.profile");




require __DIR__ . '/auth.php';
