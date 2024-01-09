<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'zancc-admin'], function(){
    Auth::routes();
});

Route::fallback(function () {
    abort(404);
});

Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('/');
Route::post('/posts/search', [\App\Http\Controllers\Frontend\HomeController::class, 'index']);
Route::get('/posts/{slug}', [\App\Http\Controllers\Frontend\ArticleController::class, 'show']);
Route::get('/category/{slug}',[\App\Http\Controllers\Frontend\CategoryController::class, 'show'] );
Route::post('/category/search',[\App\Http\Controllers\Frontend\CategoryController::class, 'index'] );
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
