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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/404', function () {
    return abort(404);
});
Route::group(['middleware' => 'role:web-developer'], function() {
    Route::get('/admin', function() {
        return view('admin.index');
    });
    Route::get('/admin/users', function() {
        return view('admin.users');
    });
    Route::get('/admin/articles', function() {
        return view('admin.articles');
    });
    Route::get('/admin/places', function() {
        return view('admin.places');
    });
    Route::get('/admin/filters', function() {
        return view('admin.filters');
    });
});
