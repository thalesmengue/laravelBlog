<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;


Route::get("/", HomePageController::class)->name("index");
//Route::get("/user/settings", [UserController::class, "edit"])->name("user.settings");

Route::resource("posts", PostController::class);
Route::resource("user", UserController::class);





require __DIR__ . '/auth.php';
