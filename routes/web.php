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
Route::fallback(function () {
    abort(404);
});

Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('/');
Route::post('/posts/search', [\App\Http\Controllers\Frontend\HomeController::class, 'index']);
Route::get('/posts/{slug}', [\App\Http\Controllers\Frontend\ArticleController::class, 'show']);
//Route::get('/posts', [\App\Http\Controllers\Frontend\ArticleController::class, 'index'])->name('posts');
//Route::post('/posts/search', [\App\Http\Controllers\Frontend\ArticleController::class, 'index']);
Route::get('/category/{slug}',[\App\Http\Controllers\Frontend\CategoryController::class, 'show'] );
Route::post('/category',[\App\Http\Controllers\Frontend\CategoryController::class, 'filterData'] );
Route::get('/category',[\App\Http\Controllers\Frontend\CategoryController::class, 'index'] );
Route::get('/about',[\App\Http\Controllers\Frontend\HomeController::class, 'about'] )->name('about');
Route::post('/posts', [\App\Http\Controllers\Frontend\ArticleController::class, 'filterData']);

Route::middleware('auth')->group(function () {
    Route::get("/zancc-admin/dashboard", [\App\Http\Controllers\Backend\DashboardController::class, 'index']);
    Route::get('/zancc-admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/zancc-admin/articles', \App\Http\Controllers\Backend\ArticleController::class);
    Route::resource("/zancc-admin/categories", \App\Http\Controllers\Backend\CategoryController::class)->only([
        'index', 'store', 'update', 'destroy'
    ])->middleware('UserAccess:1');
    Route::resource('/zancc-admin/users', \App\Http\Controllers\Backend\UserController::class);
    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
