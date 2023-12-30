<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index']);
Route::post('/articles/search', [\App\Http\Controllers\Frontend\HomeController::class, 'index']);
Route::get('/posts/{slug}', [\App\Http\Controllers\Frontend\ArticleController::class, 'show']);
Route::get('/posts', [\App\Http\Controllers\Frontend\ArticleController::class, 'index']);
Route::post('/posts/search', [\App\Http\Controllers\Frontend\ArticleController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get("/dashboard", [\App\Http\Controllers\Backend\DashboardController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('articles', \App\Http\Controllers\Backend\ArticleController::class);
    Route::resource("categories", \App\Http\Controllers\Backend\CategoryController::class)->only([
        'index', 'store', 'update', 'destroy'
    ])->middleware('UserAccess:1');
    Route::resource('/users', \App\Http\Controllers\Backend\UserController::class);
    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
