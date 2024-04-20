<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;




Route::get('/', function () {
    return view('welcome');
});

Route::group([
    "middleware" => ["guest"]
], function(){

    Route::match(["get", "post"], "register", [AuthController::class, "register"])->name("register");
    Route::match(["get", "post"], "login", [AuthController::class, "login"])->name("login");
});

Route::group([
    "middleware" => ["auth"]
], function(){

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
    // Profile
    Route::match(["get", "post"], "profile", [AuthController::class, "profile"])->name("profile");

    // Logout
    Route::get("logout", [AuthController::class, "logout"])->name("logout");

    // Post Routes
    Route::prefix('post')->group(function () {
        // Route for displaying all posts
        Route::get('/', [PostController::class, 'index'])->name('post.index');

        // Route for displaying the create post form
        Route::get('/create', [PostController::class, 'create'])->name('post.create');

        // Route for storing a new post
        Route::post('/', [PostController::class, 'store'])->name('post.store');

        // Route for displaying a specific post
        Route::get('/{post}', [PostController::class, 'show'])->name('post.show');

        // Route for displaying the edit post form
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('post.edit');

        // Route for updating a post
        Route::put('/{post}', [PostController::class, 'update'])->name('post.update');

        // Route for deleting a post
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    });
});
