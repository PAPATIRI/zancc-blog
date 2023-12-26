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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/dashboard", [\App\Http\Controllers\Backend\DashboardController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('articles', \App\Http\Controllers\Backend\ArticleController::class);
Route::resource("categories", \App\Http\Controllers\Backend\CategoryController::class)->only([
    'index', 'store', 'update', 'destroy'
]);
Route::resource('/users', \App\Http\Controllers\Backend\UserController::class);
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['guest']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
