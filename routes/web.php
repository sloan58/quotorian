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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index' ])->name('home');
    Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
    Route::resource('user', App\Http\Controllers\UserController::class)->except(['show']);
	Route::get('profile', [ App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
	Route::put('profile', [ App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
	Route::put('profile/password', [ App\Http\Controllers\ProfileController::class, 'password'])->name('profile.password');
});

