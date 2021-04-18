<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'App\Http\Controllers\ArticleController@index')->name('article.index');
Route::resource('/article', 'App\Http\Controllers\ArticleController')->except(['index', 'create'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/index', 'App\Http\Controllers\UserController@index')->name('index');
    Route::get('/{name}', 'App\Http\Controllers\UserController@show')->name('show')->middleware('auth');
    Route::get('/{name}/edit', 'App\Http\Controllers\UserController@edit')->name('edit')->middleware('auth');
    Route::put('/{name}', 'App\Http\Controllers\UserController@update')->name('update')->middleware('auth');
    Route::middleware('auth')->group(function () {
        Route::put('/{name}/follow', 'App\Http\Controllers\UserController@follow')->name('follow');
        Route::delete('/{name}/follow', 'App\Http\Controllers\UserController@unfollow')->name('unfollow');
    });
});
