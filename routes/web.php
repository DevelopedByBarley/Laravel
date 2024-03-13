<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('', [DashboardController::class, 'index'])->name("dashboard");


/*  OLD WAY
    Route::group(['prefix' => 'ideas', 'as' => 'idea.'], function () {
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

   Route::group(['middleware' => ['auth']], function () {
        Route::post('', [IdeaController::class, 'store'])->name('store');
        Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
        Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
        Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');
        Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});
*/

// NEW WAY
Route::resource('idea', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth'); // Ilyenkor a laravel létre akarja hozni a basic route-okat, ha nem használjuk őket, akkor ki kell lőni az exceptel
Route::resource('idea', IdeaController::class)->only(['show']); // Van egy route ami nem auth neki külön egyet létre hozunk
Route::resource('idea.comments', CommentController::class)->only(['store'])->middleware('auth'); // És mivel csak egyet használunk az ideas.commentsből ezért ez is only lesz
Route::resource('users', UserController::class)->only(['show', 'edit', 'update'])->middleware('auth');
Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');



Route::get('/terms', function () {
    return view('terms');
});
